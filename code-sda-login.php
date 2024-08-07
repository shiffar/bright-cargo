<?php
session_start();
include_once('connection.php'); // Include dastabase connection

// Check if email and password are set
if(isset($_POST['das_email'], $_POST['das_pass'])) {
    $email = $_POST['das_email'];
    $password = $_POST['das_pass'];
    
    // Validaste the credentials against the dastabase
    $sql = "SELECT sub_delivery_agent_id, das_pass FROM sub_delivery_agent WHERE das_email = '$email'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['das_pass'];

        // Verify password using password_verify()
        if(password_verify($password, $hashed_password)) {
            // Login successful
            $_SESSION['das_loggedin'] = true;
            $_SESSION['sub_delivery_agent_id'] = $row['sub_delivery_agent_id'];
            echo 'success';
        } else {
            // Login failed
            echo 'error';
        }
    } else {
        // Login failed
        echo 'error';
    }
} else {
    // Redirect if email or password is not set
    header('Location: sub-delivery-agent-login.php');
    exit();
}
?>
