<?php
include('connection.php');
session_start();
// Insert Agent
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    if(isset($_SESSION['company_id'])) {
        $code = mysqli_real_escape_string($conn, $_POST['code']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $company_id = $_SESSION['company_id'];
    // Insert query
    $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
    $company_result = mysqli_query($conn, $company_query);

    if(mysqli_num_rows($company_result) == 1){
        $sql = "INSERT INTO agent (code, name, status, company_id) 
            VALUES ('$code', '$name', '$status', '$company_id')";
  
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    }else {
        // Company profile doesn't exist, prompt to create one
        echo "Company profile does not exist. Please create a company profile first.";
    }
    
}

// Fetch Agents
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        $company_id = $_SESSION['company_id'];
        // Fetch agents from database
    $sql = "SELECT * FROM agent WHERE company_id = $company_id";
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
    $agent_id = $_POST['agent_id'];

    // Fetch agent from database
    $sql = "SELECT * FROM agent WHERE agent_id = '$agent_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Agent not found";
    }
}

// Update Agent
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $agent_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $code = mysqli_real_escape_string($conn, $_POST['ecode']);
    $name = mysqli_real_escape_string($conn, $_POST['ename']);
    $status = mysqli_real_escape_string($conn, $_POST['estatus']);

    // Update agent in database
    $sql = "UPDATE agent SET code='$code', name='$name', status='$status' WHERE agent_id='$agent_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Agent
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $agent_id = $_POST['agent_id'];

    // Delete agent from database
    $sql = "DELETE FROM agent WHERE agent_id='$agent_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
