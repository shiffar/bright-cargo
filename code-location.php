<?php
include('connection.php');
session_start();
// Insert Location
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $company_id = $_SESSION['company_id'];
    

    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO location (name, address, city, zip_code, country, phone, status, company_id) 
            VALUES ('$name', '$address', '$city', '$zip_code', '$country', '$phone', '$status', '$company_id')";
  
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
    $sql = "SELECT * FROM location WHERE company_id = $company_id";
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
    $location_id = $_POST['location_id'];

    // Fetch location from database
    $sql = "SELECT * FROM location WHERE location_id = '$location_id'";
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
    $location_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $name = mysqli_real_escape_string($conn, $_POST['ename']);
    $address = mysqli_real_escape_string($conn, $_POST['eaddress']);
    $city = mysqli_real_escape_string($conn, $_POST['ecity']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['ezip_code']);
    $country = mysqli_real_escape_string($conn, $_POST['ecountry']);
    $phone = mysqli_real_escape_string($conn, $_POST['ephone']);
    $status = mysqli_real_escape_string($conn, $_POST['estatus']);

    // Update location in database
    $sql = "UPDATE location SET name='$name', address='$address', city='$city', zip_code='$zip_code', 
            country='$country', phone='$phone', status='$status' WHERE location_id='$location_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Location
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $location_id = $_POST['location_id'];

    // Delete location from database
    $sql = "DELETE FROM location WHERE location_id='$location_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
