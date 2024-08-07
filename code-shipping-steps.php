<?php
session_start();
include 'connection.php';


if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        $company_id = $_SESSION['id'];
        $step_1 = $_POST["step_1"];
        $step_2 = $_POST["step_2"];
        $step_3 = $_POST["step_3"];
        $step_4= $_POST["step_4"];
        $step_5 = $_POST["step_5"];
        $step_6 = $_POST["step_6"];
        $step_7 = $_POST["step_7"];
        

        
        // Check if the company already exists for this admin ID
        $checkExistingQuery = "SELECT * FROM shipping_steps WHERE company_id='$company_id'";
        $existingResult = $conn->query($checkExistingQuery);
        
        if ($existingResult->num_rows > 0) {
            // If company exists, perform update
            $sql = "UPDATE shipping_steps SET step_1='$step_1', step_2='$step_2', step_3='$step_3', step_4='$step_4', step_5='$step_5', step_6='$step_6', step_7='$step_7', step_1='$step_1' WHERE company_id='$company_id'";
            $actionMessage = "Shipping steps updated successfully!";
        } else {
            // If company does not exist, perform insert
            $sql = "INSERT INTO shipping_steps (company_id, step_1, step_2, step_3, step_4, step_5, step_6, step_7) VALUES ('$company_id', '$step_1', '$step_2', '$step_3', '$step_4', '$step_5', '$step_6', '$step_7')";
            $actionMessage = "Shipping steps saved successfully!";
        }
        
        // Execute SQL query
        if ($conn->query($sql) === TRUE) {
            echo $actionMessage;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}



if(isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $company_id = $_SESSION['id'];
    // Fetch data from the database and return as JSON
    $sql = "SELECT * FROM shipping_steps WHERE company_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $company_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Output the fetched data as JSON
            echo json_encode($row);
        } else {
            echo "No company data found!";
        }
    } else {
        echo "Error executing query: " . $conn->error;
    }
}







?>