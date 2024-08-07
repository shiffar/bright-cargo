<?php
session_start();
include('connection.php');

// Insert Agent
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $expanse_type = mysqli_real_escape_string($conn, $_POST['expanse_type']);
    $company_id = $_SESSION['company_id'];

    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO expanses_type (expanses_type, company_id) 
            VALUES ('$expanse_type', '$company_id')";
  
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else {
            // Company profile doesn't exist, prompt to create one
            echo "Company profile does not exist. Please create a company profile first.";
        }
    }
    // Insert query
   

// Fetch Agents
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    // Fetch agents from database
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        $company_id = $_SESSION['company_id'];
    $sql = "SELECT * FROM expanses_type WHERE company_id = $company_id";
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

// Edit Agent
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $expanses_type_id = $_POST['expanses_type_id'];

    // Fetch agent from database
    $sql = "SELECT * FROM expanses_type WHERE expanses_type_id = '$expanses_type_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Expanse type not found";
    }
}

// Update Agent
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $expanses_type_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $expanse_type = mysqli_real_escape_string($conn, $_POST['eexpanse_type']);

    // Update agent in database
    $sql = "UPDATE expanses_type SET expanses_type='$expanse_type' WHERE expanses_type_id='$expanses_type_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Agent
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $expanses_type_id = $_POST['expanses_type_id'];

    // Delete agent from database
    $sql = "DELETE FROM expanses_type WHERE expanses_type_id='$expanses_type_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
