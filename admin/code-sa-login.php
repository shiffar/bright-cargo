<?php
session_start();
include_once('../connection.php'); // Include database connection

// Check if email and password are set
if(isset($_POST['sa_email'], $_POST['sa_pass'])) {
    $email = $_POST['sa_email'];
    $password = $_POST['sa_pass'];
    
    // Validate the credentials against the database
    $sql = "SELECT * FROM super_admin WHERE sa_email = '$email' AND sa_pass = '$password'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        // Login successful
        $_SESSION['admin_loggedin'] = true;
        echo 'success';
    } else {
        // Login failed
        echo 'error';
    }
} else {
    // Redirect if email or password is not set
    header('Location: admin-login.php');
    exit();
}
?>
