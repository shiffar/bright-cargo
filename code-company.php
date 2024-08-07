<?php
session_start();
include 'connection.php';


if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        $company_id = $_SESSION['id'];
        $name = $_POST["name"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $working_days = $_POST["wrk_days"];
        $working_hours = $_POST["wrk_hours"];
        $currency = $_POST["currency"];
        $trm_condi = $_POST["trm_condi"];
        
        // Check if an avatar file is uploaded
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] !== UPLOAD_ERR_NO_FILE) {
            $targetDir = "company_logos/";
            $fileName = basename($_FILES["avatar"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            
            // Generate a unique file name to prevent overwriting
            $imageName = uniqid() . '.' . $fileType;
            $targetFilePath = $targetDir . $imageName;
            
            // Check if the uploaded file is an image
            $allowedTypes = array('jpg', 'jpeg', 'png');
            if (in_array($fileType, $allowedTypes)) {
                // Upload file to server
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFilePath)) {
                    $avatar = $imageName;
                } else {
                    echo "Error uploading avatar.";
                    exit(); // Exit if file upload fails
                }
            } else {
                echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
                exit(); // Exit if invalid file format
            }
        } else {
            // If no avatar file is uploaded, set avatar field to NULL
            $avatar = NULL;
        }
        
        // Check if the company already exists for this admin ID
        $checkExistingQuery = "SELECT * FROM companies WHERE admin_id='$company_id'";
        $existingResult = $conn->query($checkExistingQuery);
        
        if ($existingResult->num_rows > 0) {
            // If company exists, perform update
            $sql = "UPDATE companies SET c_name='$name', c_address='$address', c_phone='$phone', c_email='$email', working_days='$working_days', working_hours='$working_hours', trm_condi='$trm_condi', currency='$currency'";
            if (isset($avatar)) {
                $sql .= ", avatar='$avatar'";
            }
            $sql .= " WHERE admin_id='$company_id'";
            $actionMessage = "Company updated successfully!";
        } else {
            // If company does not exist, perform insert
            $sql = "INSERT INTO companies (admin_id, c_name, c_address, c_phone, c_email, working_days, working_hours, avatar, trm_condi, currency) VALUES ('$company_id', '$name', '$address', '$phone', '$email', '$working_days', '$working_hours', '$avatar', '$trm_condi', '$currency')";
            $actionMessage = "Company saved successfully!";
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
    $sql = "SELECT * FROM companies WHERE admin_id = ?";
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