<?php
session_start();
include_once('connection.php'); // Include database connection

// Check if email and password are set
if(isset($_POST['da_email'], $_POST['da_pass'])) {
    $email = $_POST['da_email'];
    $password = $_POST['da_pass'];
    
    // Validate the credentials against the database
    $sql = "SELECT delivery_agent_id, da_pass FROM delivery_agent WHERE da_email = '$email'";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['da_pass'];

        // Verify password using password_verify()
        if(password_verify($password, $hashed_password)) {
            // Login successful
            $_SESSION['da_loggedin'] = true;
            $_SESSION['delivery_agent_id'] = $row['delivery_agent_id'];
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
    header('Location: delivery-agent-login.php');
    exit();
}
?>
