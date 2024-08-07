<?php
include('connection.php');
session_start();
// Insert Location
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $shipping_type = mysqli_real_escape_string($conn, $_POST['shipping_type']);
    $company_id = $_SESSION['company_id'];
    

    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO shipping_type (shipping_type, company_id) 
            VALUES ('$shipping_type', '$company_id')";
  
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
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
        // Fetch locations from database
    $sql = "SELECT * FROM shipping_type WHERE company_id = $company_id";
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
    $shipping_type_id = $_POST['shipping_type_id'];

    // Fetch location from database
    $sql = "SELECT * FROM shipping_type WHERE shipping_type_id = '$shipping_type_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Shipping type not found";
    }
}

// Update Location
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $shipping_type_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $shipping_type = mysqli_real_escape_string($conn, $_POST['eshipping_type']);

    // Update location in database
    $sql = "UPDATE shipping_type SET shipping_type='$shipping_type' WHERE shipping_type_id='$shipping_type_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Location
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $shipping_type_id = $_POST['shipping_type_id'];

    // Delete location from database
    $sql = "DELETE FROM shipping_type WHERE shipping_type_id='$shipping_type_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
