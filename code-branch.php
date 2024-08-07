<?php
include('connection.php');
session_start();
// Insert Location
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $c_branch_name = mysqli_real_escape_string($conn, $_POST['c_branch_name']);
    $c_branch_location = mysqli_real_escape_string($conn, $_POST['c_branch_location']);
    $c_branch_email = mysqli_real_escape_string($conn, $_POST['c_branch_email']);
    $c_branch_contact = mysqli_real_escape_string($conn, $_POST['c_branch_contact']);
    $company_id = $_SESSION['company_id'];
    

    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO company_branch (c_branch_name, c_branch_location, c_branch_email, c_branch_contact, company_id) 
            VALUES ('$c_branch_name', '$c_branch_location', '$c_branch_email', '$c_branch_contact', '$company_id')";
  
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
    $sql = "SELECT * FROM company_branch WHERE company_id = $company_id";
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
    $company_branch_id = $_POST['company_branch_id'];

    // Fetch location from database
    $sql = "SELECT * FROM company_branch WHERE company_branch_id = '$company_branch_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Location not found";
    }
}

// Update Location
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $company_branch_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $c_branch_name = mysqli_real_escape_string($conn, $_POST['ec_branch_name']);
    $c_branch_location = mysqli_real_escape_string($conn, $_POST['ec_branch_location']);
    $c_branch_email = mysqli_real_escape_string($conn, $_POST['ec_branch_email']);
    $c_branch_contact = mysqli_real_escape_string($conn, $_POST['ec_branch_contact']);

    // Update location in database
    $sql = "UPDATE company_branch SET c_branch_name='$c_branch_name', c_branch_location='$c_branch_location', c_branch_email='$c_branch_email', c_branch_contact='$c_branch_contact'  WHERE company_branch_id='$company_branch_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Location
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $company_branch_id = $_POST['company_branch_id'];

    // Delete location from database
    $sql = "DELETE FROM company_branch WHERE company_branch_id='$company_branch_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>