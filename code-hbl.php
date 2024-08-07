<?php
include('connection.php');
session_start();

if (isset($_POST['action']) && $_POST['action'] == 'bill_check') {

    if (isset($_POST['bill_no'])) {
        $bill_no = $_POST['bill_no'];
        $sql = "SELECT `hbl_id` FROM `hbl` WHERE `Bill_no` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $bill_no);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Bill No already exists.";
        } else {
            echo "Bill No is available.";
        }

        $stmt->close();
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    // Assuming you have a database connection established

    // Required fields check

    $date = $_POST['date'];
    $billNo = $_POST['bill_no'];
    $shipping = $_POST['shipping'];
    $clearance = $_POST['clearance'];
    $location2 = $_POST['location2'];
    $district = !empty($_POST['district']) ? $_POST['district'] : null;
    $sales_rep = !empty($_POST['sales_rep']) ? $_POST['sales_rep'] : null;
    $cus_reference = !empty($_POST['cus_reference']) ? $_POST['cus_reference'] : null;
    $discount = !empty($_POST['discount']) ? mysqli_real_escape_string($conn, $_POST['discount']) : 0;
    $note = $_POST['note'];
    //$hbl_type = $_POST['hbl_type'];
    $amount = !empty($_POST['mamount']) ? mysqli_real_escape_string($conn, $_POST['mamount']) : 0;
    $balance = !empty($_POST['balance']) ? mysqli_real_escape_string($conn, $_POST['balance']) : 0;
    $agent_branch = !empty($_POST['agent_branch']) ? $_POST['agent_branch'] : null;
    $bbillNo = $_POST['bbill_no'];
    $code = '';
    $company_id = $_SESSION['company_id'];

    $checkBillNoQuery = "SELECT * FROM hbl WHERE Bill_no='$billNo'";
    $result = $conn->query($checkBillNoQuery);

    if ($result->num_rows > 0) {
        echo 'Bill number already exists.' . mysqli_error($conn);;
        exit();
    }

    // Generate code based on shipping and clearance
    $code .= strtoupper(substr($shipping, 0, 1)); // Add the first letter of shipping in uppercase
    $code .= strtoupper(substr($clearance, 0, 1)); // Add the first letter of clearance in uppercase

    // Fetch the last inserted ID to generate the auto-increment number
    $query = "SELECT MAX(hbl_id) AS last_id FROM hbl";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $lastId = $row['last_id'];

    // Increment the last ID to get the new ID
    $newId = $lastId + 1;

    // Format the new ID with leading zeros
    $formattedId = str_pad($newId, 4, '0', STR_PAD_LEFT);

    // Generate the complete HBL code
    $completeCode = 'HBL/' . $code . '/' . $formattedId;

    // Build the query dynamically based on the optional fields
    $columns = "company_id, Date, Bill_no, BBill_no, code, Shipping, Clearance, location2, Discount, Note, HBLAmount, balance";
    $values = "'$company_id', '$date', '$billNo', '$bbillNo', '$completeCode', '$shipping', '$clearance', '$location2', '$discount', '$note', '$amount', '$balance'";

    if (!empty($_POST['district'])) {
        $columns .= ", district";
        $values .= ", '$district'";
    }
    if (!empty($_POST['sales_rep'])) {
        $columns .= ", Sales_rep";
        $values .= ", '$sales_rep'";
    }
    if (!empty($_POST['agent_branch'])) {
        $columns .= ", agent_id";
        $values .= ", '$agent_branch'";
    }
    if (!empty($_POST['cus_reference'])) {
        $columns .= ", Cus_Reference";
        $values .= ", '$cus_reference'";
    }



    $hblQuery = "INSERT INTO hbl ($columns) VALUES ($values)";

    // Insert into HBL table
    if (mysqli_query($conn, $hblQuery)) {
        $hblId = mysqli_insert_id($conn); // Get the last inserted HBL ID

        // Insert into shippers table
        $shipperName = $_POST['shipper_name'];
        $shipperAddress = $_POST['shipper_address'];
        $shipperMobile = $_POST['shipper_mobile'];
        $shipperPPNIC = $_POST['shipper_ppnic'];
        $shipperCity = $_POST['shipper_city'];
        $shipperCountry = $_POST['shipper_country'];
        $shipperEmail = $_POST['shipper_email'];

        // Check if mobile number and company_id combination exists in customers table
        $checkCustomerQuery = "SELECT * FROM customers WHERE mobile='$shipperMobile' AND company_id='$company_id'";
        $result = mysqli_query($conn, $checkCustomerQuery);

        if ($result->num_rows == 0) {
            // Insert into customers table
            $customerQuery = "INSERT INTO customers (company_id, name, mobile, address, city, country, email) VALUES ('$company_id', '$shipperName', '$shipperMobile', '$shipperAddress', '$shipperCity', '$shipperCountry', '$shipperEmail')";
            if (!mysqli_query($conn, $customerQuery)) {
                echo "Error inserting customer: " . mysqli_error($conn);
            }
        }

        // Insert into shippers table
        $shipperQuery = "INSERT INTO shippers (hbl_id_fk, Shipper_name, Shipper_address, Mobile, PP_NIC, City, Country, Email) VALUES ('$hblId', '$shipperName', '$shipperAddress', '$shipperMobile', '$shipperPPNIC', '$shipperCity', '$shipperCountry', '$shipperEmail')";
        if (!mysqli_query($conn, $shipperQuery)) {
            echo "Error inserting shipper: " . mysqli_error($conn);
        }

        // Insert into consignees table
        $consigneeName = $_POST['consignee_name'];
        $consigneeAddress = $_POST['consignee_address'];
        $consigneeMobile = $_POST['consignee_mobile'];
        $consigneePPNIC = $_POST['consignee_ppnic'];
        $consigneeCity = $_POST['consignee_city'];
        $consigneeCountry = $_POST['consignee_country'];
        $consigneeEmail = $_POST['consignee_email'];

        $consigneeQuery = "INSERT INTO consignees (hbl_id_fk, Consignee_name, Consignee_address, Mobile, PP_NIC, City, Country, Email) VALUES ('$hblId', '$consigneeName', '$consigneeAddress', '$consigneeMobile', '$consigneePPNIC', '$consigneeCity', '$consigneeCountry', '$consigneeEmail')";
        mysqli_query($conn, $consigneeQuery);

        // Insert into HBL details table
        if (isset($_POST['description']) && is_array($_POST['description'])) {
            foreach ($_POST['description'] as $key => $value) {
                $descriptionDetails = $_POST['description'][$key];
                $cbm = $_POST['cbm'][$key];
                $weight = $_POST['weight'][$key];
                $qty = $_POST['qty'][$key];
                $amountDetails = $_POST['amount'][$key];
                $commission = $_POST['commission'][$key];

                if (!empty($descriptionDetails)) {
                    $query = "INSERT INTO hbl_details (hbl_id_fk, Description, CBM, Weight, QTY, Amount, Commission) VALUES ('$hblId', '$descriptionDetails', '$cbm', '$weight', '$qty', '$amountDetails', '$commission')";
                    mysqli_query($conn, $query);
                }
            }
        }

        // Insert into HBL paid table
        if (isset($_POST['description2']) && is_array($_POST['description2'])) {
            foreach ($_POST['description2'] as $key => $value) {
                $descriptionPaid = $_POST['description2'][$key];
                $amountPaid = $_POST['amount2'][$key];
                $commissionPaid = $_POST['commission2'][$key];

                if (!empty($descriptionPaid)) {
                    $query = "INSERT INTO hbl_paid (hbl_id_fk, Description, Amount, Commission) VALUES ('$hblId', '$descriptionPaid', '$amountPaid', '$commissionPaid')";
                    mysqli_query($conn, $query);
                }
            }
        }

        // Insert into HBL status table
        $current_status = 'default';
        $hblStatusQuery = "INSERT INTO hbl_status (hbl_id, current_status, request_status) VALUES ('$hblId', '$current_status', 1)";
        mysqli_query($conn, $hblStatusQuery);
        $statusId = mysqli_insert_id($conn);

        // Insert into HBL balance table
        $balanceQuery = empty($balance) ?
            "INSERT INTO hbl_balance (hbl_id, hbl_balance, balance_status) VALUES ('$hblId', '0', '1')" :
            "INSERT INTO hbl_balance (hbl_id, hbl_balance, balance_status) VALUES ('$hblId', '$balance', '0')";

        if (mysqli_query($conn, $balanceQuery)) {
            // Insert into cash_handle table
            $cash_amount = !empty($_POST['mamount']) ? mysqli_real_escape_string($conn, $_POST['mamount']) : 0;
            $get_cash_dte = date('Y-m-d H:i:s');

            // Conditionally build the cash handle query
            if (!empty($sales_rep)) {
                $cashHandleQuery = "INSERT INTO cash_handle (employee_id, hbl_id, cash_amount, get_cash_dte) VALUES ('$sales_rep', '$hblId', '$cash_amount', '$get_cash_dte')";
            } else {
                $cashHandleQuery = "INSERT INTO cash_handle (hbl_id, cash_amount, get_cash_dte) VALUES ('$hblId', '$cash_amount', '$get_cash_dte')";
            }

            if (mysqli_query($conn, $cashHandleQuery)) {
                echo "HBL and all related data saved successfully";
            } else {
                echo "Error inserting cash handle: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting balance: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting HBL: " . mysqli_error($conn);
    }
}

// Fetch Employees
if (isset($_POST['action']) && $_POST['action'] == 'fetch') {
    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
        $company_id = $_SESSION['company_id'];
        $sql = "SELECT 
            hbl.hbl_id, 
            hbl.Date, 
            hbl.Bill_no, 
            hbl.code, 
            hbl.Shipping, 
            hbl.Clearance, 
            hbl.Sales_rep, 
            hbl.Cus_Reference, 
            hbl.Estimated_date, 
            hbl.Delivered_date, 
            hbl.Discount, 
            hbl.Note, 
            hbl.HBL_Type, 
            hbl.HBLAmount, 
            hbl.created_at, 
            hbl.location2,
            employees.name AS emp_name, 
            hbl_status.current_status,
            CONCAT(companies.currency, hbl.HBLAmount) AS total_amount,  -- Concatenating currency and amount
            shippers.Shipper_name,
            consignees.Consignee_name,
            shipping_type.shipping_type
        FROM 
            hbl
        LEFT JOIN 
            hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
        LEFT JOIN 
            hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
        LEFT JOIN 
            shippers ON hbl.hbl_id = shippers.hbl_id_fk
        LEFT JOIN 
            consignees ON hbl.hbl_id = consignees.hbl_id_fk
        LEFT JOIN 
            employees ON hbl.Sales_rep = employees.employee_id
        LEFT JOIN 
            hbl_status ON hbl.hbl_id = hbl_status.hbl_id
        LEFT JOIN 
            shipping_type ON hbl.Shipping = shipping_type.shipping_type_id
        LEFT JOIN 
            companies ON companies.company_id = hbl.company_id
        WHERE 
            hbl.company_id = $company_id 
            AND hbl_status.current_status IN ('default', 'on-hold', 'on-hold-pending', 'tbl', 'tbl-pending', 'loading', 'loading-pending', 'shipped', 'shipped-pending', 'delivered', 'delivered-pending', 'completed')
        GROUP BY 
            hbl.hbl_id DESC";


        $result = $conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        echo json_encode($rows);
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
    // Fetch data from joined tables

} elseif (isset($_POST['action']) && $_POST['action'] == 'filter') {
    // Handle filter action
    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
        $company_id = $_SESSION['company_id'];
        // Construct SQL query based on filter criteria
        $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.location2, hbl.Sales_rep, hbl.company_branch, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount, hbl.created_at, employees.name AS emp_name, hbl_status.current_status,
            COALESCE(SUM(hbl_details.Amount), 0) AS total_amount,
            shippers.Shipper_name,
            consignees.Consignee_name
            FROM hbl
            LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
            LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
            LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
            LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
            LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
            LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
            WHERE hbl.company_id = $company_id";

        // Apply filters
        if (isset($_POST['sshipping']) && $_POST['sshipping'] != '') {
            $shipping = $_POST['sshipping'];
            $sql .= " AND hbl.Shipping = '$shipping'";
        }
        if (isset($_POST['sclearance']) && $_POST['sclearance'] != '') {
            $clearance = $_POST['sclearance'];
            $sql .= " AND hbl.Clearance = '$clearance'";
        }
        if (isset($_POST['sstatus']) && $_POST['sstatus'] != '') {
            $status = $_POST['sstatus'];
            $sql .= " AND hbl_status.current_status = '$status'";
        }
        if (isset($_POST['sdate']) && $_POST['sdate'] != '') {
            $date = $_POST['sdate'];
            $sql .= " AND hbl.Date = '$date'";
        }
        if (isset($_POST['sagent_branch']) && $_POST['sagent_branch'] != '') {
            $agent_id = $_POST['sagent_branch'];
            $sql .= " AND hbl.agent_id = '$agent_id'";
        }

        if (isset($_POST['ssales_rep']) && $_POST['ssales_rep'] != '') {
            $SalesRep = $_POST['ssales_rep'];
            $sql .= " AND hbl.Sales_rep = '$SalesRep'";
        }

        // Add more filters as needed...

        $sql .= " GROUP BY hbl.hbl_id";

        // Execute SQL query and return filtered data
        $result = $conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        echo json_encode($rows);
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}


// Edit Employee
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    // Retrieve POST data
    $hbl_id = $_POST['hbl_id'];

    // Fetch employee from database
    $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.BBill_no, hbl.location2, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, 
    hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount as h_amount, hbl.balance, hbl.agent_id, hbl.district,
    detail.hbl_detail_id as detail_id, detail.Description as dDescription, detail.CBM, detail.Weight, detail.QTY, detail.Amount as detail_amount, 
    detail.Commission as dCommission, paid.hbl_paid_id as paid_id, paid.Description as pDescription, paid.Amount, paid.Commission as pCommission,
    shippers.Shipper_name, shippers.Shipper_address, shippers.Mobile as shipper_mobile, shippers.PP_NIC as shipper_pp_nic, 
    shippers.City as shipper_city, shippers.Country as shipper_country, shippers.Email as shipper_email, 
    consignees.Consignee_name, consignees.Consignee_address, consignees.Mobile as consignee_mobile, consignees.PP_NIC as consignee_pp_nic, 
    consignees.City as consignee_city, consignees.Country as consignee_country, consignees.Email as consignee_email, customers.name as cus_name, employees.name as emp_name
    FROM hbl 
    LEFT JOIN hbl_details AS detail ON hbl.hbl_id = detail.hbl_id_fk 
    LEFT JOIN hbl_paid AS paid ON hbl.hbl_id = paid.hbl_id_fk 
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN customers ON customers.id = hbl.Cus_Reference
    LEFT JOIN employees ON employees.employee_id = hbl.Sales_rep
    WHERE hbl.hbl_id = $hbl_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array(
            'hbl_id' => $hbl_id,
            'hbl_details' => array(),
            'hbl_paid' => array()
        );

        while ($row = $result->fetch_assoc()) {
            // Fetch general HBL data
            $data['Date'] = $row['Date'];
            $data['Bill_no'] = $row['Bill_no'];
            $data['BBill_no'] = $row['BBill_no'];
            $data['location2'] = $row['location2'];
            $data['Shipping'] = $row['Shipping'];
            $data['Clearance'] = $row['Clearance'];
            $data['Sales_rep'] = $row['Sales_rep'];
            $data['Cus_Reference'] = $row['Cus_Reference'];
            $data['Estimated_date'] = $row['Estimated_date'];
            $data['Delivered_date'] = $row['Delivered_date'];
            $data['Discount'] = $row['Discount'];
            $data['Note'] = $row['Note'];
            $data['HBL_Type'] = $row['HBL_Type'];
            $data['mAmount'] = $row['h_amount'];
            $data['balance'] = $row['balance'];
            $data['agent_id'] = $row['agent_id'];
            $data['district'] = $row['district'];
            // Shipper details
            $data['Shipper_name'] = $row['Shipper_name'];
            $data['Shipper_address'] = $row['Shipper_address'];
            $data['Shipper_mobile'] = $row['shipper_mobile'];
            $data['Shipper_pp_nic'] = $row['shipper_pp_nic'];
            $data['Shipper_city'] = $row['shipper_city'];
            $data['Shipper_country'] = $row['shipper_country'];
            $data['Shipper_email'] = $row['shipper_email'];
            // Consignee details
            $data['Consignee_name'] = $row['Consignee_name'];
            $data['Consignee_address'] = $row['Consignee_address'];
            $data['Consignee_mobile'] = $row['consignee_mobile'];
            $data['Consignee_pp_nic'] = $row['consignee_pp_nic'];
            $data['Consignee_city'] = $row['consignee_city'];
            $data['Consignee_country'] = $row['consignee_country'];
            $data['Consignee_email'] = $row['consignee_email'];

            // Add HBL details to the data array
            if (!empty($row['detail_id'])) {
                $data['hbl_details'][] = array(
                    'id' => $row['detail_id'],
                    'dDescription' => $row['dDescription'],
                    'CBM' => $row['CBM'],
                    'Weight' => $row['Weight'],
                    'QTY' => $row['QTY'],
                    'Amount' => $row['detail_amount'],
                    'dCommission' => $row['dCommission']
                );
            }

            // Add HBL paid details to the data array
            if (!empty($row['paid_id'])) {
                $data['hbl_paid'][] = array(
                    'id' => $row['paid_id'],
                    'pDescription' => $row['pDescription'],
                    'Amount' => $row['Amount'],
                    'pCommission' => $row['pCommission']
                );
            }
        }

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'HBL not found'));
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'view') {
    // Retrieve POST data
    $hbl_id = $_POST['hbl_id'];

    // Fetch HBL data from the database
    $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, 
    hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount as hbl_amount, hbl.Balance, hbl.agent_id, hbl.district,
    detail.hbl_detail_id as detail_id, detail.Description as dDescription, detail.CBM, detail.Weight, detail.QTY, detail.Amount as detail_amount, 
    detail.Commission as dCommission, paid.hbl_paid_id as paid_id, paid.Description as pDescription, paid.Amount, paid.Commission as pCommission,
    shippers.Shipper_name, shippers.Shipper_address, shippers.Mobile as shipper_mobile, shippers.PP_NIC as shipper_pp_nic, 
    shippers.City as shipper_city, shippers.Country as shipper_country, shippers.Email as shipper_email, 
    consignees.Consignee_name, consignees.Consignee_address, consignees.Mobile as consignee_mobile, consignees.PP_NIC as consignee_pp_nic, 
    consignees.City as consignee_city, consignees.Country as consignee_country, consignees.Email as consignee_email,
    hbl_status.current_status, hbl_status.time, cb.c_branch_name, cb.c_branch_location, cb.c_branch_email, cb.c_branch_contact, employees.name as emp_name, shipping_type.shipping_type, clearance.clearance, agents_address.*, agents_address.city as abranchcity, companies.currency, hbl_balance.hbl_balance,
    district_location.district as ddistrict
    FROM hbl 
    LEFT JOIN company_branch AS cb ON hbl.company_branch = cb.company_branch_id
    LEFT JOIN hbl_details AS detail ON hbl.hbl_id = detail.hbl_id_fk 
    LEFT JOIN hbl_paid AS paid ON hbl.hbl_id = paid.hbl_id_fk 
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
    LEFT JOIN shipping_type ON hbl.Shipping =  shipping_type.shipping_type_id
    LEFT JOIN clearance ON hbl.Clearance = clearance.clearance_id
    LEFT JOIN agents_address ON hbl.agent_id = agents_address.agent_id_fk AND agents_address.head_of = 'head_office'
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    LEFT JOIN hbl_balance ON hbl_balance.hbl_id = hbl.hbl_id
    LEFT JOIN district_location ON district_location.district_location_id = hbl.district
    WHERE hbl.hbl_id = $hbl_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array(
            'hbl_id' => $hbl_id,
            'hbl_details' => array(),
            'hbl_paid' => array(),
            'company_hbl' => array(),
        );

        while ($row = $result->fetch_assoc()) {
            // Fetch general HBL data
            $data['Date'] = $row['Date'];
            $data['Bill_no'] = $row['Bill_no'];
            $data['code'] = $row['code'];
            $data['Shipping'] = $row['Shipping'];
            $data['Clearance'] = $row['Clearance'];
            $data['Sales_rep'] = $row['Sales_rep'];
            $data['emp_name'] = $row['emp_name'];
            $data['Cus_Reference'] = $row['Cus_Reference'];
            $data['Estimated_date'] = $row['Estimated_date'];
            $data['Delivered_date'] = $row['Delivered_date'];
            $data['Discount'] = $row['Discount'];
            $data['Note'] = $row['Note'];
            $data['HBL_Type'] = $row['HBL_Type'];
            $data['Amount'] = $row['Amount'];
            $data['Balance'] = $row['Balance'];
            $data['Balance'] = $row['Balance'];
            $data['abranchcity'] = $row['abranchcity'];
            $data['c_branch_location'] = $row['c_branch_location'];
            $data['c_branch_email'] = $row['c_branch_email'];
            $data['c_branch_contact'] = $row['c_branch_contact'];
            // Shipper details
            $data['Shipper_name'] = $row['Shipper_name'];
            $data['Shipper_address'] = $row['Shipper_address'];
            $data['Shipper_mobile'] = $row['shipper_mobile'];
            $data['Shipper_pp_nic'] = $row['shipper_pp_nic'];
            $data['Shipper_city'] = $row['shipper_city'];
            $data['Shipper_country'] = $row['shipper_country'];
            $data['Shipper_email'] = $row['shipper_email'];
            // Consignee details
            $data['Consignee_name'] = $row['Consignee_name'];
            $data['Consignee_address'] = $row['Consignee_address'];
            $data['Consignee_mobile'] = $row['consignee_mobile'];
            $data['Consignee_pp_nic'] = $row['consignee_pp_nic'];
            $data['Consignee_city'] = $row['consignee_city'];
            $data['Consignee_country'] = $row['consignee_country'];
            $data['Consignee_email'] = $row['consignee_email'];
            $data['currency'] = $row['currency'];
            $data['hbl_balance'] = $row['hbl_balance'];
            $data['hbl_amount'] = $row['hbl_amount'];
            $data['Discount'] = $row['Discount'];
            $data['ddistrict'] = $row['ddistrict'];
            // Add HBL details to the data array
            if (!empty($row['detail_id'])) {
                $data['hbl_details'][] = array(
                    'id' => $row['detail_id'],
                    'dDescription' => $row['dDescription'],
                    'CBM' => $row['CBM'],
                    'Weight' => $row['Weight'],
                    'QTY' => $row['QTY'],
                    'Amount' => $row['detail_amount'] - $row['dCommission']
                );
            }

            // Add HBL paid details to the data array
            if (!empty($row['paid_id'])) {
                $data['hbl_paid'][] = array(
                    'id' => $row['paid_id'],
                    'pDescription' => $row['pDescription'],
                    'Amount' => $row['Amount'] - $row['pCommission']
                );
            }
        }

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'HBL not found'));
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'check_branch') {
    $hbl_ids = isset($_POST['hbl_ids']) ? json_decode($_POST['hbl_ids']) : [];
    $hbl_ids = array_map('intval', $hbl_ids);
    $hblIdsString = implode(",", $hbl_ids);
    $hblIdsString = mysqli_real_escape_string($conn, $hblIdsString);

    // Check if all selected HBLs have the same agent_id
    $sql = "SELECT agent_id FROM hbl WHERE hbl_id IN ($hblIdsString)";
    $result = $conn->query($sql);

    $agentIds = [];
    while ($row = $result->fetch_assoc()) {
        $agentIds[] = $row['agent_id'];
    }

    if (count(array_unique($agentIds)) === 1) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}


if (isset($_POST['action']) && $_POST['action'] == 'branch_bill_view') {
    // Retrieve POST data
    //$hbl_id = $_POST['hbl_id'];

    $hbl_ids = isset($_POST['hbl_ids']) ? json_decode($_POST['hbl_ids']) : [];

    $hbl_ids = array_map('intval', $hbl_ids);
    $hblIdsString = implode(",", $hbl_ids);
    $hblIdsString = mysqli_real_escape_string($conn, $hblIdsString);

    // Fetch HBL data from the database
    $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, 
    hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount, 
    detail.hbl_detail_id as detail_id, detail.Description as dDescription, detail.CBM, detail.Weight, detail.QTY, detail.Amount as detail_amount, 
    detail.Commission as dCommission, paid.hbl_paid_id as paid_id, paid.Description as pDescription, paid.Amount, paid.Commission as pCommission,
    shippers.Shipper_name, shippers.Shipper_address, shippers.Mobile as shipper_mobile, shippers.PP_NIC as shipper_pp_nic, 
    shippers.City as shipper_city, shippers.Country as shipper_country, shippers.Email as shipper_email, 
    consignees.Consignee_name, consignees.Consignee_address, consignees.Mobile as consignee_mobile, consignees.PP_NIC as consignee_pp_nic, 
    consignees.City as consignee_city, consignees.Country as consignee_country, consignees.Email as consignee_email,
    hbl_status.current_status, hbl_status.time, agent.name as a_name, agents_address.address as a_address, agents_address.city as a_city, agents_address.country as a_country, agents_address.phone as a_phone, agents_address.email as a_email, agents_address.head_of, companies.currency
    FROM hbl 
    LEFT JOIN hbl_details AS detail ON hbl.hbl_id = detail.hbl_id_fk 
    LEFT JOIN hbl_paid AS paid ON hbl.hbl_id = paid.hbl_id_fk 
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN agent ON hbl.agent_id = agent.agent_id
    LEFT JOIN agents_address ON hbl.agent_id = agents_address.agent_id_fk AND agents_address.head_of = 'head_office'
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    WHERE hbl.hbl_id IN ($hblIdsString)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array(
            'hbl_id' => $hblIdsString,
            'hbl_details' => array(),
            'hbl_paid' => array()
        );

        while ($row = $result->fetch_assoc()) {
            // Fetch general HBL data
            $data['Date'] = $row['Date'];
            $data['Bill_no'] = $row['Bill_no'];
            $data['code'] = $row['code'];
            $data['Shipping'] = $row['Shipping'];
            $data['Clearance'] = $row['Clearance'];
            $data['Sales_rep'] = $row['Sales_rep'];
            $data['Cus_Reference'] = $row['Cus_Reference'];
            $data['Discount'] = $row['Discount'];
            $data['Note'] = $row['Note'];
            $data['HBL_Type'] = $row['HBL_Type'];
            $data['Amount'] = $row['Amount'];
            // Shipper details
            $data['Shipper_name'] = $row['Shipper_name'];
            $data['Shipper_address'] = $row['Shipper_address'];
            $data['Shipper_mobile'] = $row['shipper_mobile'];
            $data['Shipper_pp_nic'] = $row['shipper_pp_nic'];
            $data['Shipper_city'] = $row['shipper_city'];
            $data['Shipper_country'] = $row['shipper_country'];
            $data['Shipper_email'] = $row['shipper_email'];
            // Consignee details
            $data['Consignee_name'] = $row['Consignee_name'];
            $data['Consignee_address'] = $row['Consignee_address'];
            $data['Consignee_mobile'] = $row['consignee_mobile'];
            $data['Consignee_pp_nic'] = $row['consignee_pp_nic'];
            $data['Consignee_city'] = $row['consignee_city'];
            $data['Consignee_country'] = $row['consignee_country'];
            $data['Consignee_email'] = $row['consignee_email'];

            $data['c_branch_name'] = $row['a_name'];
            $data['c_branch_location'] = $row['a_address'] . ', ' . $row['a_city'] . ', ' . $row['a_country'];
            $data['c_branch_email'] = $row['a_email'];
            $data['c_branch_contact'] = $row['a_phone'];

            $data['currency'] = $row['currency'];

            // Add HBL details to the data array
            if (!empty($row['detail_id'])) {
                $data['hbl_details'][] = array(
                    'id' => $row['detail_id'],
                    'dDescription' => $row['dDescription'],
                    'CBM' => $row['CBM'],
                    'Weight' => $row['Weight'],
                    'QTY' => $row['QTY'],
                    'Amount' => $row['detail_amount'] - $row['dCommission']
                );
            }

            // Add HBL paid details to the data array
            if (!empty($row['paid_id'])) {
                $data['hbl_paid'][] = array(
                    'id' => $row['paid_id'],
                    'pDescription' => $row['pDescription'],
                    'Amount' => $row['Amount'] - $row['pCommission']
                );
            }
        }

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'HBL not found'));
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'show_expense') {
    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
        if (isset($_POST['start_date'], $_POST['end_date'])) {
            $company_id = $_SESSION['company_id'];
            // Sanitize user input to prevent SQL injection
            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

            // Query to fetch data from hbl table
            $query = "SELECT * FROM hbl WHERE company_id = '$company_id' AND Date BETWEEN '$start_date' AND '$end_date'";

            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if query executed successfully
            if ($result) {
                // Fetch hbl data
                $hbl_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Fetch hbl_details data
                $hbl_details_query = "SELECT * FROM hbl_details WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl WHERE Date BETWEEN '$start_date' AND '$end_date')";
                $hbl_details_result = mysqli_query($conn, $hbl_details_query);
                $hbl_details_data = mysqli_fetch_all($hbl_details_result, MYSQLI_ASSOC);

                // Fetch hbl_paid data
                $hbl_paid_query = "SELECT * FROM hbl_paid WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl WHERE Date BETWEEN '$start_date' AND '$end_date')";
                $hbl_paid_result = mysqli_query($conn, $hbl_paid_query);
                $hbl_paid_data = mysqli_fetch_all($hbl_paid_result, MYSQLI_ASSOC);

                // Fetch expenses data
                $expenses_query = "SELECT * FROM expenses WHERE company_id = '$company_id' AND DateReference BETWEEN '$start_date' AND '$end_date'";
                $expenses_result = mysqli_query($conn, $expenses_query);
                $expenses_data = mysqli_fetch_all($expenses_result, MYSQLI_ASSOC);

                // Fetch expense_details data
                $expense_details_query = "SELECT * FROM expense_details WHERE expanses_id_fk IN (SELECT expens_id FROM expenses WHERE DateReference BETWEEN '$start_date' AND '$end_date')";
                $expense_details_result = mysqli_query($conn, $expense_details_query);
                $expense_details_data = mysqli_fetch_all($expense_details_result, MYSQLI_ASSOC);

                // Fetch expense_paid data
                $expense_paid_query = "SELECT * FROM expense_paid WHERE expanses_id_fk IN (SELECT expens_id FROM expenses WHERE DateReference BETWEEN '$start_date' AND '$end_date')";
                $expense_paid_result = mysqli_query($conn, $expense_paid_query);
                $expense_paid_data = mysqli_fetch_all($expense_paid_result, MYSQLI_ASSOC);

                // Combine data into one array
                $combined_data = array();
                foreach ($hbl_data as $hbl) {
                    $hbl_id = $hbl['hbl_id'];
                    $combined_data[$hbl_id]['hbl'] = $hbl;
                    $combined_data[$hbl_id]['hbl_details'] = array();
                    $combined_data[$hbl_id]['hbl_paid'] = array();
                }

                foreach ($hbl_details_data as $detail) {
                    $hbl_id_fk = $detail['hbl_id_fk'];
                    $combined_data[$hbl_id_fk]['hbl_details'][] = $detail;
                }

                foreach ($hbl_paid_data as $paid) {
                    $hbl_id_fk = $paid['hbl_id_fk'];
                    $combined_data[$hbl_id_fk]['hbl_paid'][] = $paid;
                }

                foreach ($expenses_data as $expense) {
                    $expens_id = $expense['expens_id'];
                    $combined_data[$expens_id]['expenses'] = $expense;
                    $combined_data[$expens_id]['expense_details'] = array();
                    $combined_data[$expens_id]['expense_paid'] = array();
                }

                foreach ($expense_details_data as $detail) {
                    $expanses_id_fk = $detail['expanses_id_fk'];
                    $combined_data[$expanses_id_fk]['expense_details'][] = $detail;
                }

                foreach ($expense_paid_data as $paid) {
                    $expanses_id_fk = $paid['expanses_id_fk'];
                    $combined_data[$expanses_id_fk]['expense_paid'][] = $paid;
                }

                // Return combined data as JSON
                echo json_encode(array_values($combined_data));
            } else {
                // Return error message if query fails
                echo json_encode(array('error' => 'Failed to fetch data'));
            }
        }
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'show_filtered') {
    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
        if (isset($_POST['start_date'], $_POST['end_date'], $_POST['sales_rep'], $_POST['shipping_type'], $_POST['hbl_type'])) {
            $company_id = $_SESSION['company_id'];
            // Prepare and bind parameters to prevent SQL injection
            $query = "SELECT * FROM hbl WHERE company_id = ? AND Date BETWEEN ? AND ? OR Sales_rep = ? OR Shipping = ? OR HBL_Type = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssss", $company_id, $_POST['start_date'], $_POST['end_date'], $_POST['sales_rep'], $_POST['shipping_type'], $_POST['hbl_type']);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if query executed successfully
            if ($result) {
                // Fetch hbl data
                $hbl_data = $result->fetch_all(MYSQLI_ASSOC);

                // Fetch hbl_details data
                $hbl_details_query = "SELECT * FROM hbl_details WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl WHERE Date BETWEEN ? AND ? OR Sales_rep = ? OR Shipping = ? OR HBL_Type = ?)";
                $stmt = $conn->prepare($hbl_details_query);
                $stmt->bind_param("sssss", $_POST['start_date'], $_POST['end_date'], $_POST['sales_rep'], $_POST['shipping_type'], $_POST['hbl_type']);
                $stmt->execute();
                $hbl_details_result = $stmt->get_result();
                $hbl_details_data = $hbl_details_result->fetch_all(MYSQLI_ASSOC);

                // Fetch hbl_paid data
                $hbl_paid_query = "SELECT * FROM hbl_paid WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl WHERE Date BETWEEN ? AND ? OR Sales_rep = ? OR Shipping = ? OR HBL_Type = ?)";
                $stmt = $conn->prepare($hbl_paid_query);
                $stmt->bind_param("sssss", $_POST['start_date'], $_POST['end_date'], $_POST['sales_rep'], $_POST['shipping_type'], $_POST['hbl_type']);
                $stmt->execute();
                $hbl_paid_result = $stmt->get_result();
                $hbl_paid_data = $hbl_paid_result->fetch_all(MYSQLI_ASSOC);

                // Combine data into one array
                $combined_data = array();
                foreach ($hbl_data as $hbl) {
                    $hbl_id = $hbl['hbl_id'];
                    $combined_data[$hbl_id]['hbl'] = $hbl;
                    $combined_data[$hbl_id]['hbl_details'] = array();
                    $combined_data[$hbl_id]['hbl_paid'] = array();
                }

                foreach ($hbl_details_data as $detail) {
                    $hbl_id_fk = $detail['hbl_id_fk'];
                    $combined_data[$hbl_id_fk]['hbl_details'][] = $detail;
                }

                foreach ($hbl_paid_data as $paid) {
                    $hbl_id_fk = $paid['hbl_id_fk'];
                    $combined_data[$hbl_id_fk]['hbl_paid'][] = $paid;
                }

                // Return combined data as JSON
                echo json_encode(array_values($combined_data));
            } else {
                // Return an empty array if no data is found
                echo json_encode(array());
            }
        }
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'show_expense2') {
    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
        $company_id = $_SESSION['company_id'];
        // Sanitize user input to prevent SQL injection

        // Query to fetch data from hbl table
        $query = "SELECT * FROM hbl WHERE company_id = '$company_id'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if query executed successfully
        if ($result) {
            // Fetch hbl data
            $hbl_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Fetch hbl_details data
            $hbl_details_query = "SELECT * FROM hbl_details WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl)";
            $hbl_details_result = mysqli_query($conn, $hbl_details_query);
            $hbl_details_data = mysqli_fetch_all($hbl_details_result, MYSQLI_ASSOC);

            // Fetch hbl_paid data
            $hbl_paid_query = "SELECT * FROM hbl_paid WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl)";
            $hbl_paid_result = mysqli_query($conn, $hbl_paid_query);
            $hbl_paid_data = mysqli_fetch_all($hbl_paid_result, MYSQLI_ASSOC);

            // Combine data into one array
            $combined_data = array();
            foreach ($hbl_data as $hbl) {
                $hbl_id = $hbl['hbl_id'];
                $combined_data[$hbl_id]['hbl'] = $hbl;
                $combined_data[$hbl_id]['hbl_details'] = array();
                $combined_data[$hbl_id]['hbl_paid'] = array();
            }

            foreach ($hbl_details_data as $detail) {
                $hbl_id_fk = $detail['hbl_id_fk'];
                $combined_data[$hbl_id_fk]['hbl_details'][] = $detail;
            }

            foreach ($hbl_paid_data as $paid) {
                $hbl_id_fk = $paid['hbl_id_fk'];
                $combined_data[$hbl_id_fk]['hbl_paid'][] = $paid;
            }

            // Return combined data as JSON
            echo json_encode(array_values($combined_data));
        } else {
            // Return error message if query fails
            echo json_encode(array('error' => 'Failed to fetch data'));
        }
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'show_income') {
    if (isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])) {
        if (isset($_POST['start_date'], $_POST['end_date'])) {
            $company_id = $_SESSION['company_id'];
            // Sanitize user input to prevent SQL injection
            $start_date = mysqli_real_escape_string($conn, $_POST['start_date']);
            $end_date = mysqli_real_escape_string($conn, $_POST['end_date']);

            // Query to fetch data from hbl table
            $query = "SELECT * FROM hbl WHERE company_id = '$company_id' AND Date BETWEEN '$start_date' AND '$end_date'";

            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if query executed successfully
            if ($result) {
                // Fetch hbl data
                $hbl_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Fetch hbl_details data
                $hbl_details_query = "SELECT * FROM hbl_details WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl WHERE Date BETWEEN '$start_date' AND '$end_date')";
                $hbl_details_result = mysqli_query($conn, $hbl_details_query);
                $hbl_details_data = mysqli_fetch_all($hbl_details_result, MYSQLI_ASSOC);

                // Fetch hbl_paid data
                $hbl_paid_query = "SELECT * FROM hbl_paid WHERE hbl_id_fk IN (SELECT hbl_id FROM hbl WHERE Date BETWEEN '$start_date' AND '$end_date')";
                $hbl_paid_result = mysqli_query($conn, $hbl_paid_query);
                $hbl_paid_data = mysqli_fetch_all($hbl_paid_result, MYSQLI_ASSOC);

                // Combine data into one array
                $combined_data = array();
                foreach ($hbl_data as $hbl) {
                    $hbl_id = $hbl['hbl_id'];
                    $combined_data[$hbl_id]['hbl'] = $hbl;
                    $combined_data[$hbl_id]['hbl_details'] = array();
                    $combined_data[$hbl_id]['hbl_paid'] = array();
                }

                foreach ($hbl_details_data as $detail) {
                    $hbl_id_fk = $detail['hbl_id_fk'];
                    $combined_data[$hbl_id_fk]['hbl_details'][] = $detail;
                }

                foreach ($hbl_paid_data as $paid) {
                    $hbl_id_fk = $paid['hbl_id_fk'];
                    $combined_data[$hbl_id_fk]['hbl_paid'][] = $paid;
                }

                // Return combined data as JSON
                echo json_encode(array_values($combined_data));
            } else {
                // Return error message if query fails
                echo json_encode(array('error' => 'Failed to fetch data'));
            }
        }
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'update') {
    $hbl_id = $_POST['hbl_id'];
    // Retrieve data for hbl table
    $date = $_POST['edate'];
    $bill_no = $_POST['ebill_no'];
    $bbill_no = $_POST['ebbill_no'];
    $shipping = $_POST['eshipping'];
    $clearance = $_POST['eclearance'];
    $sales_rep = $_POST['esales_rep'];
    $agent_id = $_POST['eagent_branch'];
    $district = $_POST['edistrict'];
    $cus_reference = isset($_POST['ecus_reference']) ? $_POST['ecus_reference'] : ''; // Check if cus_reference is set
    $discount = $_POST['ediscount'];
    $note = $_POST['enote'];

    $emamount = isset($_POST['emamount']) && $_POST['emamount'] !== '' ? mysqli_real_escape_string($conn, $_POST['emamount']) : 0;
    $ebalance = isset($_POST['ebalance']) && $_POST['ebalance'] !== '' ? mysqli_real_escape_string($conn, $_POST['ebalance']) : 0;

    // Build the SQL query
    $sql = "UPDATE hbl SET 
        Date='$date', 
        Bill_no='$bill_no',
        BBill_no='$bbill_no',
        Shipping='$shipping', 
        Clearance='$clearance',";

    // Check and append Sales_rep if not empty, otherwise set it to NULL
    if (isset($_POST['esales_rep']) && !empty($_POST['esales_rep'])) {
        $sql .= "Sales_rep='$sales_rep', ";
    } else {
        $sql .= "Sales_rep=NULL, ";
    }

    // Check and append company_branch if not empty, otherwise set it to NULL
    if (isset($_POST['eagent_branch']) && !empty($_POST['eagent_branch'])) {
        $sql .= "agent_id='$agent_id', ";
    } else {
        $sql .= "agent_id=NULL, ";
    }

    // Check and append Cus_Reference if not empty, otherwise set it to NULL
    if (isset($_POST['ecus_reference']) && !empty($_POST['ecus_reference'])) {
        $sql .= "Cus_Reference='$cus_reference', ";
    } else {
        $sql .= "Cus_Reference=NULL, ";
    }

    if (isset($_POST['edistrict']) && !empty($_POST['edistrict'])) {
        $sql .= "district='$district', ";
    } else {
        $sql .= "district=NULL, ";
    }

    $sql .= "Discount='$discount',
        Note='$note', 
        HBLAmount='$emamount',
        balance='$ebalance'
        WHERE hbl_id=$hbl_id";


    // Update hbl table
    if ($conn->query($sql) === TRUE) {
        $success = true;
    } else {
        $success = false;
        $error = "Error updating hbl table: " . $conn->error;
    }

    // Update balance in hbl_balance table
    $balanceQuery = "";
    if (empty($ebalance)) {
        // If balance is empty, update with balance 0 and status 1
        $balanceQuery = "UPDATE hbl_balance SET hbl_balance='0', balance_status='1' WHERE hbl_id=$hbl_id";
    } else {
        // If balance is not empty, update with the provided balance and status 0
        $balanceQuery = "UPDATE hbl_balance SET hbl_balance='$ebalance', balance_status='0' WHERE hbl_id=$hbl_id";
    }

    if (mysqli_query($conn, $balanceQuery)) {
        $success = true;
    } else {
        $success = false;
        $error = "Error updating balance: " . mysqli_error($conn);
    }

    // Update or insert record in shippers table
    $shipper_name = $_POST['eshipper_name'];
    $shipper_address = $_POST['eshipper_address'];
    $shipper_mobile = $_POST['eshipper_mobile'];
    $shipper_ppnic = $_POST['eshipper_ppnic'];
    $shipper_city = $_POST['eshipper_city'];
    $shipper_country = $_POST['eshipper_country'];
    $shipper_email = $_POST['eshipper_email'];

    // Check if record exists in shippers table
    $sql_check_shipper = "SELECT * FROM shippers WHERE hbl_id_fk=$hbl_id";
    $result_check_shipper = $conn->query($sql_check_shipper);

    if ($result_check_shipper->num_rows > 0) {
        // Update existing record in shippers table
        $sql2 = "UPDATE shippers SET 
            Shipper_name='$shipper_name', 
            Shipper_address='$shipper_address',
            Mobile='$shipper_mobile', 
            PP_NIC='$shipper_ppnic', 
            City='$shipper_city', 
            Country='$shipper_country', 
            Email='$shipper_email'
            WHERE hbl_id_fk=$hbl_id";
    } else {
        // Insert new record in shippers table
        $sql2 = "INSERT INTO shippers (Shipper_name, Shipper_address, Mobile, PP_NIC, City, Country, Email, hbl_id_fk) VALUES ('$shipper_name', '$shipper_address', '$shipper_mobile', '$shipper_ppnic', '$shipper_city', '$shipper_country', '$shipper_email', $hbl_id)";
    }

    if ($conn->query($sql2) === TRUE) {
        $success = true;
    } else {
        $success = false;
        $error = "Error updating/inserting shippers table: " . $conn->error;
    }

    // Update or insert record in consignees table (similar to shippers table)
    $consignee_name = $_POST['econsignee_name'];
    $consignee_address = $_POST['econsignee_address'];
    $consignee_mobile = $_POST['econsignee_mobile'];
    $consignee_ppnic = $_POST['econsignee_ppnic'];
    $consignee_city = $_POST['econsignee_city'];
    $consignee_country = $_POST['econsignee_country'];
    $consignee_email = $_POST['econsignee_email'];

    // Check if record exists in consignees table
    $sql_check_consignee = "SELECT * FROM consignees WHERE hbl_id_fk=$hbl_id";
    $result_check_consignee = $conn->query($sql_check_consignee);

    if ($result_check_consignee->num_rows > 0) {
        // Update existing record in consignees table
        $sql3 = "UPDATE consignees SET 
            Consignee_name='$consignee_name', 
            Consignee_address='$consignee_address',
            Mobile='$consignee_mobile', 
            PP_NIC='$consignee_ppnic', 
            City='$consignee_city', 
            Country='$consignee_country', 
            Email='$consignee_email'
            WHERE hbl_id_fk=$hbl_id";
    } else {
        // Insert new record in consignees table
        $sql3 = "INSERT INTO consignees (Consignee_name, Consignee_address, Mobile, PP_NIC, City, Country, Email, hbl_id_fk) VALUES ('$consignee_name', '$consignee_address', '$consignee_mobile', '$consignee_ppnic', '$consignee_city', '$consignee_country', '$consignee_email', $hbl_id)";
    }

    if ($conn->query($sql3) === TRUE) {
        $success = true;
    } else {
        $success = false;
        $error = "Error updating/inserting consignees table: " . $conn->error;
    }

    // Update balance in hbl_balance table
    $balanceQuery = "";
    if (empty($ebalance)) {
        // If balance is empty, update with balance 0 and status 1
        $balanceQuery = "UPDATE hbl_balance SET hbl_balance='0', balance_status='1' WHERE hbl_id=$hbl_id";
    } else {
        // If balance is not empty, update with the provided balance and status 0
        $balanceQuery = "UPDATE hbl_balance SET hbl_balance='$ebalance', balance_status='0' WHERE hbl_id=$hbl_id";
    }

    if (mysqli_query($conn, $balanceQuery)) {
        $success = true;
    } else {
        $success = false;
        $error = "Error updating balance: " . mysqli_error($conn);
    }



    // Update or insert hbl_details table if details are provided
    if (isset($_POST['edetails_id']) && !empty($_POST['edetails_id'])) {
        foreach ($_POST['edetails_id'] as $key => $detail_id) {
            $description1 = $_POST['edescription'][$key];
            $cbm = $_POST['ecbm'][$key];
            $weight = $_POST['eweight'][$key];
            $qty = $_POST['eqty'][$key];
            $amount1 = $_POST['eamount1'][$key];
            $commission = $_POST['ecommission'][$key];

            if ($detail_id != '') {
                // Update existing record
                $sql = "UPDATE hbl_details SET Description='$description1', CBM='$cbm', Weight='$weight', QTY='$qty', Amount='$amount1', Commission='$commission' WHERE hbl_detail_id=$detail_id";
            }

            if ($conn->query($sql) !== TRUE) {
                $success = false;
                $error = "Error updating/inserting hbl_details table: " . $conn->error;
                break; // Break loop on error
            }
        }
    }

    // Update or insert expense_paid table if details are provided
    if (isset($_POST['epaid_id']) && !empty($_POST['epaid_id'])) {
        foreach ($_POST['epaid_id'] as $key => $paid_id) {
            $description2 = $_POST['edescription2'][$key];
            $amount2 = $_POST['eamount2'][$key];
            $commission2 = $_POST['ecommission2'][$key];

            if ($paid_id != '') {
                // Update existing record
                $sql = "UPDATE hbl_paid SET Description='$description2', Amount='$amount2', Commission='$commission2' WHERE hbl_paid_id=$paid_id";
            }

            if ($conn->query($sql) !== TRUE) {
                $success = false;
                $error = "Error updating/inserting hbl_paid table: " . $conn->error;
                break; // Break loop on error
            }
        }
    }

    // Handle response


    // Conditionally build the cash handle query
    if (!empty($_POST['esales_rep'])) {
        $sales_rep2 = $_POST['esales_rep'];
        $cash_amount = isset($_POST['emamount']) && $_POST['emamount'] !== '' ? mysqli_real_escape_string($conn, $_POST['emamount']) : 0;
        $cashHandleQuery = "UPDATE cash_handle SET employee_id='$sales_rep2', cash_amount='$cash_amount', updte=NOW() WHERE hbl_id=$hbl_id";
    } else {
        $cash_amount = isset($_POST['emamount']) && $_POST['emamount'] !== '' ? mysqli_real_escape_string($conn, $_POST['emamount']) : 0;
        $cashHandleQuery = "UPDATE cash_handle SET employee_id=NULL, cash_amount='$cash_amount', updte=NOW() WHERE hbl_id=$hbl_id";
    }

    // Execute the query
    if (mysqli_query($conn, $cashHandleQuery)) {
        echo "Cash handle record updated successfully";
    } else {
        echo "Error updating cash handle record: " . mysqli_error($conn);
    }
}


// Delete Employee
if (isset($_POST['action']) && $_POST['action'] == 'table_delete') {
    $table = $_POST['table']; // Get the table name from the request
    $id = $_POST['id']; // Get the ID of the row to be deleted

    // Perform the deletion based on the table name
    switch ($table) {
        case 'hbl_details':
            $sql = "DELETE FROM hbl_details WHERE hbl_detail_id = $id";
            break;
        case 'hbl_paid':
            $sql = "DELETE FROM hbl_paid WHERE hbl_paid_id = $id";
            break;
            // Add more cases for other tables if needed
        default:
            // Handle invalid table name
            echo json_encode(array('success' => false, 'error' => 'Invalid table name'));
            return;
    }

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => 'Error deleting row'));
    }
}


if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    // Retrieve POST data
    $widgt_id = $_POST['widgt_id'];

    // Delete location from database
    $sql = "DELETE hbl, hbl_details, hbl_paid, hbl_status, consignees, shippers
    FROM hbl
    LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
    LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    WHERE hbl.hbl_id='$widgt_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
