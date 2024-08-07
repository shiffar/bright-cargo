<?php
include('connection.php');
session_start();
// Insert Location


// Fetch Locations
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        $company_id = $_SESSION['company_id'];
        // Fetch locations from database
        $sql = "SELECT hbl.code, e.name as emp_name, ch.cash_handle_id, ch.cash_amount, ch.handle_amount, ch.collected, ch.get_cash_dte, ch.updte FROM hbl 
        LEFT JOIN employees AS e ON e.employee_id = hbl.Sales_rep
        LEFT JOIN cash_handle AS ch ON ch.hbl_id = hbl.hbl_id
        WHERE hbl.company_id = $company_id";
        $result = $conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        echo json_encode($rows);
    }else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
    
}

// Edit Location

if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $cash_handle_id = $_POST['cash_handle_id'];

    // Fetch location from database
    $sql = "SELECT * FROM cash_handle
    LEFT JOIN employees ON employees.employee_id = cash_handle.employee_id WHERE cash_handle_id = '$cash_handle_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Location not found";
    }
}


if (isset($_POST['action']) && $_POST['action'] === 'update') {
    $eid = $_POST['eid'];
    $cashAmount = $_POST['ecash_amount'];
    $collectedAmount = $_POST['ecollected_amount'];

    // Calculate status
    $status = ($cashAmount == $collectedAmount) ? 1 : 0;

    // Update the database
    $sql = "UPDATE cash_handle SET handle_amount = '$collectedAmount', collected = '$status', updte = NOW() WHERE cash_handle_id = '$eid'";

    if ($conn->query($sql) === TRUE) {
        echo "Cash handle updated successfully.";
    } else {
        echo "Failed to update cash handle: " . $conn->error;
    }
}



$conn->close();
?>
