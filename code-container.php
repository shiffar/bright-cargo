<?php
include('connection.php');

// Insert Shipped Detail
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $shipping_date = mysqli_real_escape_string($conn, $_POST['shipping_date']);
    $agent = !empty($_POST['agent']) ? $_POST['agent'] : null;
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $shipping_by = mysqli_real_escape_string($conn, $_POST['shipping_by']);
    $shipping_type = mysqli_real_escape_string($conn, $_POST['shipping_type']);
    $shipping_no = mysqli_real_escape_string($conn, $_POST['shipping_no']);
    $file_no = mysqli_real_escape_string($conn, $_POST['file_no']);
    $feet_weight = mysqli_real_escape_string($conn, $_POST['feet_weight']);
    $freight_charge = mysqli_real_escape_string($conn, $_POST['freight_charge']);
    $clearance_charge = mysqli_real_escape_string($conn, $_POST['clearance_charge']);
    $booking_charge = mysqli_real_escape_string($conn, $_POST['booking_charge']);
    $loading_charge = mysqli_real_escape_string($conn, $_POST['loading_charge']);
    $seal = mysqli_real_escape_string($conn, $_POST['seal']);
    $estimated_date = mysqli_real_escape_string($conn, $_POST['estimated_date']);
    $delivered_date = mysqli_real_escape_string($conn, $_POST['delivered_date']);
    $shipping_description = mysqli_real_escape_string($conn, $_POST['shipping_description']);
    
    // Insert query
    $columns = "shipping_date, agent, location, shipping_by, shipping_type, shipping_no, file_no, feet_weight, freight_charge, clearance_charge, booking_charge, loading_charge, seal, estimated_date, delivered_date, shipping_description";
    $values = "'$shipping_date', '$agent', '$location', '$shipping_by', '$shipping_type', '$shipping_no', '$file_no', '$feet_weight', '$freight_charge', '$clearance_charge', '$booking_charge', '$loading_charge', '$seal', '$estimated_date', '$delivered_date', '$shipping_description'";

    if (!empty($_POST['agent'])) {
        $columns .= ", agent";
        $values .= ", '$agent'";
    }
$sql = "INSERT INTO shipped_details ($columns) VALUES ($values)";
  
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}






// Fetch Shipped Details
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    // Fetch shipped details from database
    $sql = "SELECT * FROM shipped_details
    LEFT JOIN shipping_type ON shipped_details.shipping_type = shipping_type.shipping_type_id
    LEFT JOIN shipped_details_status as sds ON sds.shipped_details_id = shipped_details.shipped_details_id
    LEFT JOIN employees ON employees.employee_id = shipped_details.shipping_by";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}

// Edit Shipped Detail
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $shipped_details_id = $_POST['shipped_details_id'];

    // Fetch shipped detail from database
    $sql = "SELECT * FROM shipped_details 
    LEFT JOIN agent ON agent.agent_id = shipped_details.agent
    LEFT JOIN agents_address ON agents_address.agent_address_id = shipped_details.location
    WHERE shipped_details_id = '$shipped_details_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Shipped detail not found";
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'view') {
    // Retrieve POST data
    $shipped_details_id = $_POST['shipped_details_id'];

    // Prepare SQL query with parameterized statement to prevent SQL injection
    $sql = "SELECT *, agents_address.address AS agent_address, agents_address.city AS agent_city, agents_address.email AS agent_email, hbl.code AS hbl_code, dl.district AS hbl_district, shippers.City as s_city, shippers.Country as s_country, consignees.City as co_city, consignees.Country as co_country, st.shipping_type as st_name, district_location.district as ddistrict, shippers.Mobile as s_mobile, shippers.PP_NIC as s_ppnic, consignees.MObile as c_mobile, consignees.PP_NIC as c_ppnic FROM shipped_details 
    LEFT JOIN hbl AS hbl ON hbl.container_id_fk = shipped_details.shipped_details_id 
    LEFT JOIN consignees AS consignees ON consignees.hbl_id_fk = hbl.hbl_id 
    LEFT JOIN shippers AS shippers ON shippers.hbl_id_fk = hbl.hbl_id 
    LEFT JOIN hbl_details AS hbl_details ON hbl_details.hbl_id_fk = hbl.hbl_id 
    LEFT JOIN agent AS a ON a.agent_id = shipped_details.agent
    LEFT JOIN agents_address AS agents_address ON agents_address.agent_address_id = shipped_details.location 
    LEFT JOIN delivery_agent AS da ON da.delivery_agent_id = shipped_details.delivery_agent_bid
    LEFT JOIN delivery_agent_branch AS dab ON dab.delivery_agent_bid = shipped_details.dab_location
    LEFT JOIN district_location AS dl ON hbl.district = dl.district_location_id
    LEFT JOIN shipping_type AS st ON shipped_details.shipping_type = st.shipping_type_id
    LEFT JOIN district_location ON hbl.district = district_location.district_location_id
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    LEFT JOIN hbl_balance ON hbl_balance.hbl_id = hbl.hbl_id
    WHERE shipped_details.shipped_details_id = ?";

    
    // Prepare and bind parameter
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $shipped_details_id);
    
    // Execute query
    $stmt->execute();
    
    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = array(
            'shipped_details_id' => $shipped_details_id,
            'hbl' => array()
        );
    
        while ($row = $result->fetch_assoc()) {
            $data['shipping_date'] = $row['shipping_date'];
            $data['agent'] = $row['agent'];
            $data['location'] = $row['location'];
            $data['hbl_code'] = $row['hbl_code'];
            $data['shipping_by'] = $row['shipping_by'];
            $data['shipping_type'] = $row['st_name'];
            $data['shipping_no'] = $row['shipping_no'];
            $data['file_no'] = $row['file_no'];
            $data['feet_weight'] = $row['feet_weight'];
            $data['freight_charge'] = $row['freight_charge'];
            $data['clearance_charge'] = $row['clearance_charge'];
            $data['booking_charge'] = $row['booking_charge'];
            $data['loading_charge'] = $row['loading_charge'];
            $data['seal'] = $row['seal'];
            $data['estimated_date'] = $row['estimated_date'];
            $data['delivered_date'] = $row['delivered_date'];
            $data['shipping_description'] = $row['shipping_description'];
            $data['da_name'] = $row['da_name'];
            $data['da_conatct'] = $row['da_conatct'];
            $data['agent_address'] = $row['dabaddress'];
            $data['agent_city'] = $row['dabcity'];
            $data['agent_email'] = $row['dabemail'];
            $data['Clearance'] = $row['Clearance'];
            $data['hbl_balance'] = $row['hbl_balance'];
            $data['currency'] = $row['currency'];
            
            // Fetch general HBL data (already present)
            $hbl_data = array(
                'id' => $row['hbl_id'],
                'hbl_code' => $row['hbl_code'],
                'Bill_no' => $row['Bill_no'],
                'BBill_no' => $row['BBill_no'],
                'Clearance' => $row['Clearance'],
                'balance' => $row['hbl_balance'],
                'hbl_district' => $row['hbl_district'],
                'shipping_date' => $row['shipping_date'],
                'Consignee_name' => $row['Consignee_name'],
                'FAmount' => $row['HBLAmount'] - $row['hbl_balance'] - $row['Discount'],
                'shipping_description' => $row['shipping_description'],
                'Shipper' => array(
                    'sname' => $row['Shipper_name'],
                    'saddress' => $row['Shipper_address'],
                    's_city' => $row['s_city'],
                    's_country' => $row['s_country'],
                    's_ppnic' => $row['s_ppnic'],
                    's_mobile' => $row['s_mobile']
                ),
                'Consignee' => array(
                    'cname' => $row['Consignee_name'],
                    'caddress' => $row['Consignee_address'],
                    'co_city' => $row['co_city'],
                    'co_country' => $row['co_country'],
                    'cppnic' => $row['c_ppnic'],
                    'cmobile' => $row['c_mobile']
                ),
                'agents_address' => array(
                    'da_name' => $row['da_name'],
                    'da_conatct' => $row['da_conatct'],
                    'acity' => $row['da_location'],
                    'ddistrict' => $row['ddistrict'],
                    'clearance2' => $row['Clearance'],
                    'co_city' => $row['co_city']
                ),
                'hbl_details' => array() // Initialize hbl_details array
            );

            // Fetch and append HBL details to the data array
            $hbl_details_sql = "SELECT * FROM hbl_details WHERE hbl_id_fk = ?";
            $hbl_details_stmt = $conn->prepare($hbl_details_sql);
            $hbl_details_stmt->bind_param("i", $row['hbl_id']);
            $hbl_details_stmt->execute();
            $hbl_details_result = $hbl_details_stmt->get_result();
    
            while ($detail_row = $hbl_details_result->fetch_assoc()) {
                $hbl_data['hbl_details'][] = array(
                    'Description' => $detail_row['Description'],
                    'CBM' => $detail_row['CBM'],
                    'Weight' => $detail_row['Weight'],
                    'QTY' => $detail_row['QTY'],
                    'Amount' => $detail_row['Amount']
                );
            }
    
            // Add HBL data to the main data array
            $data['hbl'][] = $hbl_data;
        }
    
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'HBL not found'));
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'get_hbl_rows'){
    // Retrieve POST data
    $shipped_details_id = $_POST['shipped_details_id'];

    // Fetch rows from the hbl table where shipped_details_id matches
    $sql = "SELECT * FROM hbl WHERE container_id_fk = '$shipped_details_id'";
    $result = $conn->query($sql);

    $hbl_rows = array(); // Array to store hbl rows

    if ($result->num_rows > 0) {
        // Loop through each row and add it to the hbl_rows array
        while ($row = $result->fetch_assoc()) {
            $hbl_rows[] = $row;
        }
        echo json_encode($hbl_rows);
    } else {
        echo "No matching rows found in hbl table for the given shipped_details_id";
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'remove_container') {
    // Retrieve POST data
    $hbl_id = $_POST['hbl_id'];

    // Include your database connection or configuration file here.
    // Assuming $conn represents your database connection.

    // Update the container_id_fk to NULL in the hbl table for the corresponding hbl_id
    $sql_update_container = "UPDATE hbl SET container_id_fk = NULL WHERE hbl_id = '$hbl_id'";
    if ($conn->query($sql_update_container) === TRUE) {
        // Update the current_status in the hbl_status table to 'loading'
        $sql_update_status = "UPDATE hbl_status SET current_status = 'loading' WHERE hbl_id = '$hbl_id'";
        if ($conn->query($sql_update_status) === TRUE) {
            echo "Container removed and status updated successfully";
        } else {
            echo "Error updating status: " . $conn->error;
        }
    } else {
        echo "Error removing container: " . $conn->error;
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'search_hbl'){
    // Retrieve POST data
    $codeOrBillNumber = $_POST['code_or_bill_number'];

    // Perform the search operation, assuming your database table name is `hbl`
    $sql = "SELECT * FROM hbl WHERE (code = '$codeOrBillNumber' OR Bill_no = '$codeOrBillNumber') AND container_id_fk IS NULL";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array(
            'success' => true,
            'hbl_id' => $row['hbl_id'],
            'Date' => $row['Date'],
            'Bill_no' => $row['Bill_no'],
            'container_id_fk' => $row['container_id_fk'] // Include container_id_fk in the response
        );
        echo json_encode($response);
    } else {
        // Check if the HBL already exists in a container
        $sql_check_existing = "SELECT * FROM hbl WHERE code = '$codeOrBillNumber' OR Bill_no = '$codeOrBillNumber'";
        $result_existing = $conn->query($sql_check_existing);
        if ($result_existing->num_rows > 0) {
            // HBL already exists in a container
            echo json_encode(array('success' => false, 'message' => 'HBL already exists in a container.'));
        } else {
            // No matching record found
            echo json_encode(array('success' => false, 'message' => 'No matching record found.'));
        }
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'update_container_id_fk'){
    // Retrieve POST data
    $hbl_id = $_POST['hbl_id'];
    $shipped_details_id = $_POST['shipped_details_id'];

    // Update the container_id_fk in the hbl table for the corresponding hbl_id
    $sql = "UPDATE hbl SET container_id_fk = '$shipped_details_id' WHERE hbl_id = '$hbl_id'";
    if ($conn->query($sql) === TRUE) {
        // After updating container_id_fk, update the current_status in hbl_status table
        $update_status_sql = "UPDATE hbl_status SET current_status = 'shipped' WHERE hbl_id = '$hbl_id'";
        if ($conn->query($update_status_sql) === TRUE) {
            echo "Container ID and status updated successfully";
        } else {
            echo "Error updating status: " . $conn->error;
        }
    } else {
        echo "Error updating container ID: " . $conn->error;
    }
}





// Update Shipped Detail
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $shipped_details_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $shipping_date = mysqli_real_escape_string($conn, $_POST['eshipping_date']);
    //$eagent = mysqli_real_escape_string($conn, $_POST['eagent']);
    $edelivery_agent_branch = !empty($_POST['edelivery_agent_branch']) ? $_POST['edelivery_agent_branch'] : null;
    //$elocation = mysqli_real_escape_string($conn, $_POST['elocation']);
    $edab_location = !empty($_POST['edab_location']) ? $_POST['edab_location'] : null;
    $shipping_by = !empty($_POST['eshipping_by']) ? $_POST['eshipping_by'] : null;
    $shipping_type = !empty($_POST['eshipping_type']) ? $_POST['eshipping_type'] : null;
    $shipping_no = mysqli_real_escape_string($conn, $_POST['eshipping_no']);
    $file_no = mysqli_real_escape_string($conn, $_POST['efile_no']);
    $feet_weight = mysqli_real_escape_string($conn, $_POST['efeet_weight']);
    $freight_charge = mysqli_real_escape_string($conn, $_POST['efreight_charge']);
    $clearance_charge = mysqli_real_escape_string($conn, $_POST['eclearance_charge']);
    $booking_charge = mysqli_real_escape_string($conn, $_POST['ebooking_charge']);
    $loading_charge = mysqli_real_escape_string($conn, $_POST['eloading_charge']);
    $seal = mysqli_real_escape_string($conn, $_POST['eseal']);
    $estimated_date = mysqli_real_escape_string($conn, $_POST['eestimated_date']);
    $delivered_date = mysqli_real_escape_string($conn, $_POST['edelivered_date']);
    $shipping_description = mysqli_real_escape_string($conn, $_POST['eshipping_description']);
    
    // Update shipped detail in database
    $sql = "UPDATE shipped_details SET 
        shipping_date='$shipping_date',";

    // Check and append Sales_rep if not empty, otherwise set it to NULL
    if (isset($_POST['edelivery_agent_branch']) && !empty($_POST['edelivery_agent_branch'])) {
        $sql .= "delivery_agent_bid='$edelivery_agent_branch', ";
    } else {
        $sql .= "delivery_agent_bid=NULL, ";
    }

    if (isset($_POST['edab_location']) && !empty($_POST['edab_location'])) {
        $sql .= "dab_location='$edab_location', ";
    } else {
        $sql .= "dab_location=NULL, ";
    }

    $sql .= "shipping_by='$shipping_by', 
    shipping_type='$shipping_type', 
    shipping_no='$shipping_no', 
    file_no='$file_no', 
    feet_weight='$feet_weight', 
    freight_charge='$freight_charge', 
    clearance_charge='$clearance_charge', 
    booking_charge='$booking_charge', 
    loading_charge='$loading_charge', 
    seal='$seal', 
    estimated_date='$estimated_date', 
    delivered_date='$delivered_date', 
    shipping_description='$shipping_description'
    WHERE shipped_details_id='$shipped_details_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }


    
}

// Delete Shipped Detail
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $shipped_details_id = $_POST['shipped_details_id'];

    // Delete shipped detail from database
    $sql = "DELETE hbl, hbl_details, hbl_paid, hbl_status, consignees, shippers, shipped_details
    FROM hbl
    LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
    LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN shipped_details ON shipped_details.shipped_details_id = hbl.container_id_fk
    WHERE shipped_details_id='$shipped_details_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
