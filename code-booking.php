<?php
include('connection.php');
session_start();
// Insert Location
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $booking_name = mysqli_real_escape_string($conn, $_POST['booking_name']);
    $booking_address = mysqli_real_escape_string($conn, $_POST['booking_address']);
    $booking_contact = mysqli_real_escape_string($conn, $_POST['booking_contact']);
    $company_id = $_SESSION['company_id'];
    $customer_id = $_SESSION['id'];

    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO booking (customer_id, booking_name, booking_address, booking_contact, company_id_fk) 
            VALUES ('$customer_id', '$booking_name', '$booking_address', '$booking_contact', '$company_id')";
  
        if ($conn->query($sql) === TRUE) {
            // Fetch the booking_id of the newly inserted booking
            $booking_id = mysqli_insert_id($conn);
            
            // Insert the pending status for the newly inserted booking
            $status_query = "INSERT INTO booking_status (booking_id, booking_status, su_date, status_view) 
                            VALUES ('$booking_id', 'pending', NOW(), 0)";
            if ($conn->query($status_query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $status_query . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }


    }else {
        // Company profile doesn't exist, prompt to create one
        echo "Company profile does not exist. Please create a company profile first.";
    }
    // Insert query
    
}

// Fetch Locations
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        $company_id = $_SESSION['company_id'];

        // Sanitize the company_id to prevent SQL injection

        // Construct SQL query
        $sql = "SELECT * FROM booking
                INNER JOIN booking_status ON booking_status.booking_id = booking.booking_id 
                WHERE company_id_fk = $company_id";

        // Execute query
        $result = $conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        // Output result as JSON
        echo json_encode($rows);
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}


// Edit Location
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $booking_id = $_POST['booking_id'];

    // Fetch location from database
    $sql = "SELECT * FROM booking WHERE booking_id = '$booking_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Booking not found";
    }
}

// Update Location
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $booking_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $booking_name = mysqli_real_escape_string($conn, $_POST['ebooking_name']);
    $booking_address = mysqli_real_escape_string($conn, $_POST['ebooking_address']);
    $booking_contact = mysqli_real_escape_string($conn, $_POST['ebooking_contact']);

    // Update location in database
    $sql = "UPDATE booking SET booking_name='$booking_name', booking_address='$booking_address', booking_contact='$booking_contact' WHERE booking_id='$booking_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'update_status'){
    // Retrieve POST data
    $booking_status_id = $_POST['booking_status_id'];

    // Update location in database
    $sql = "UPDATE booking_status SET booking_status='accepted', su_date=NOW() WHERE booking_status_id='$booking_status_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}


// Delete Location
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $booking_id = $_POST['booking_id'];

    // Delete location from database
    $sql = "DELETE FROM booking
    INNER JOIN booking_status ON booking_status.booking_id = booking.booking_id 
    WHERE booking_id='$booking_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'view') {
    // Retrieve POST data
    $hbl_id = $_POST['hbl_id'];

    // Fetch HBL data from the database
    $sql = "SELECT hbl.hbl_id, hbl.Date as hbl_date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, hbl.company_branch,
    hbl.Cus_Reference, hbl.district, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount as h_amount, hbl.balance,
    detail.hbl_detail_id as detail_id, detail.Description as dDescription, detail.CBM, detail.Weight, detail.QTY, detail.Amount as detail_amount, 
    detail.Commission as dCommission, paid.hbl_paid_id as paid_id, paid.Description as pDescription, paid.Amount, paid.Commission as pCommission,
    shippers.Shipper_name, shippers.Shipper_address, shippers.Mobile as shipper_mobile, shippers.PP_NIC as shipper_pp_nic, 
    shippers.City as shipper_city, shippers.Country as shipper_country, shippers.Email as shipper_email, 
    consignees.Consignee_name, consignees.Consignee_address, consignees.Mobile as consignee_mobile, consignees.PP_NIC as consignee_pp_nic, 
    consignees.City as consignee_city, consignees.Country as consignee_country, consignees.Email as consignee_email,
    hbl_status.current_status, hbl_status.time, customers.name as cus_name, employees.name as emp_name, district_location.district as hbl_district, agents_address.*, companies.currency, hbl_balance.hbl_balance
    FROM hbl 
    LEFT JOIN hbl_details AS detail ON hbl.hbl_id = detail.hbl_id_fk 
    LEFT JOIN hbl_paid AS paid ON hbl.hbl_id = paid.hbl_id_fk 
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN customers ON hbl.Cus_Reference = customers.id
    LEFT JOIN company_branch ON hbl.company_branch = company_branch.company_branch_id
    LEFT JOIN district_location ON hbl.district = district_location.district_location_id
    LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
    LEFT JOIN agents_address ON hbl.agent_id = agents_address.agent_id_fk AND agents_address.head_of = 'head_office'
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    LEFT JOIN hbl_balance ON hbl_balance.hbl_id = hbl.hbl_id
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
            $data['hbl_date'] = $row['hbl_date'];
            $data['Bill_no'] = $row['Bill_no'];
            $data['code'] = $row['code'];
            $data['Shipping'] = $row['Shipping'];
            $data['Clearance'] = $row['Clearance'];
            $data['Sales_rep'] = $row['emp_name'];
            $data['Cus_Reference'] = $row['cus_name'];
            $data['district'] = $row['hbl_district'];
            $data['HBL_Type'] = $row['HBL_Type'];
            $data['h_amount'] = $row['h_amount'];
            $data['balance'] = $row['hbl_balance'];
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


$conn->close();
?>
