<?php
include('connection.php');

// Insert Shipped Detail
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $shipping_date = mysqli_real_escape_string($conn, $_POST['shipping_date']);
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
    $sql = "INSERT INTO shipped_details (shipping_date, shipping_by, shipping_type, shipping_no, file_no, feet_weight, freight_charge, clearance_charge, booking_charge, loading_charge, seal, estimated_date, delivered_date, shipping_description) 
            VALUES ('$shipping_date', '$shipping_by', '$shipping_type', '$shipping_no', '$file_no', '$feet_weight', '$freight_charge', '$clearance_charge', '$booking_charge', '$loading_charge', '$seal', '$estimated_date', '$delivered_date', '$shipping_description')";
  
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// Fetch Employees
if(isset($_POST['action']) && $_POST['action'] == 'fetch') {
    // Fetch data from joined tables
    $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Agent, hbl.Location, hbl.Sales_rep, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.Amount, hbl.created_at, agent.name AS agent_name, location.city AS lcity, employees.name AS emp_name, hbl_status.current_status,
            COALESCE(SUM(hbl_details.Amount), 0) AS total_amount,
            shippers.Shipper_name,
            consignees.Consignee_name
            FROM hbl
            LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
            LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
            LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
            LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
            LEFT JOIN agent ON hbl.Agent = agent.agent_id
            LEFT JOIN location ON hbl.Location = location.location_id
            LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
            LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
            WHERE hbl_status.current_status IN ('shipped')
            GROUP BY hbl.hbl_id";

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
    $sql = "SELECT * FROM shipped_details WHERE shipped_details_id = '$shipped_details_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Shipped detail not found";
    }
}

// Update Shipped Detail
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $shipped_details_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $shipping_date = mysqli_real_escape_string($conn, $_POST['eshipping_date']);
    $shipping_by = mysqli_real_escape_string($conn, $_POST['eshipping_by']);
    $shipping_type = mysqli_real_escape_string($conn, $_POST['eshipping_type']);
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
    $sql = "UPDATE shipped_details SET shipping_date='$shipping_date', shipping_by='$shipping_by', shipping_type='$shipping_type', shipping_no='$shipping_no', file_no='$file_no', feet_weight='$feet_weight', freight_charge='$freight_charge', clearance_charge='$clearance_charge', booking_charge='$booking_charge', loading_charge='$loading_charge', seal='$seal', estimated_date='$estimated_date', delivered_date='$delivered_date', shipping_description='$shipping_description' WHERE shipped_details_id='$shipped_details_id'";
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
    $sql = "DELETE FROM shipped_details WHERE shipped_details_id='$shipped_details_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
