<?php
// Establish your database connection here
include 'connection.php';

// Check if customer_id is provided
if(isset($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    // Execute query to fetch customer details
    $query = "SELECT `name`, `address`, `mobile`, `city`, `country`, `email` FROM `customers` WHERE `id` = $customer_id";
    $result = mysqli_query($conn, $query);

    // Fetch customer details
    $customer_details = mysqli_fetch_assoc($result);

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($customer_details);
} else {
    // If customer_id is not provided, send error response
    header("HTTP/1.0 400 Bad Request");
    echo "Customer ID is required.";
}
?>
