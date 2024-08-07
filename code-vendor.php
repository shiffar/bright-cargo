<?php
session_start();
include('connection.php');

// Insert Employee
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $agency_name = mysqli_real_escape_string($conn, $_POST['agency_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $opening_balance = mysqli_real_escape_string($conn, $_POST['opening_balance']);
    $company_id = $_SESSION['company_id'];

    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO vendor (company_id, agency_name, phone, email, address, city, zip_code, username, opening_balance) 
            VALUES ('$company_id', '$agency_name', '$phone', '$email', '$address', '$city', '$zip_code', '$username', '$opening_balance')";
  
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

// Fetch Employees
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        $company_id = $_SESSION['company_id'];
        $sql = "SELECT * FROM vendor WHERE company_id = $company_id";
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
    // Fetch employees from database
    
}

// Edit Employee
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $vendor_id = $_POST['vendor_id'];

    // Fetch employee from database
    $sql = "SELECT * FROM vendor WHERE vendor_id = '$vendor_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Vendor not found";
    }
}

// Update Employee
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $vendor_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $agency_name = mysqli_real_escape_string($conn, $_POST['eagency_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['ephone']);
    $email = mysqli_real_escape_string($conn, $_POST['eemail']);
    $address = mysqli_real_escape_string($conn, $_POST['eaddress']);
    $city = mysqli_real_escape_string($conn, $_POST['ecity']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['ezip_code']);
    $username = mysqli_real_escape_string($conn, $_POST['eusername']);
    $opening_balance = mysqli_real_escape_string($conn, $_POST['eopening_balance']);
    // Add more fields as needed

    // Update employee in database
    $sql = "UPDATE vendor SET agency_name='$agency_name', phone='$phone', email='$email', address='$address', city='$city', zip_code='$zip_code', username='$username', opening_balance='$opening_balance' WHERE vendor_id='$vendor_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Employee
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $vendor_id = $_POST['vendor_id'];

    // Delete employee from database
    $sql = "DELETE FROM vendor WHERE vendor_id='$vendor_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
