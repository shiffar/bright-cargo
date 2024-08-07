<?php
// Database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "zainco";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
