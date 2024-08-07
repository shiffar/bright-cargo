<?php
// Include database connection parameters
include 'connection.php';

// Check if offer_id is set in the URL
if (isset($_GET['offer_id'])) {
    $offerId = $_GET['offer_id'];

    // SQL query to fetch offer details
    $sql = "SELECT * FROM customers
            LEFT JOIN offer_notification ON offer_notification.offer_notification_id = customers.offer_notification_id
            WHERE customers.offer_notification_id = ?";

    // Prepare statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameter
        mysqli_stmt_bind_param($stmt, "i", $offerId);

        // Execute statement
        mysqli_stmt_execute($stmt);

        // Get result
        $result = mysqli_stmt_get_result($stmt);

        // Fetch data as an associative array
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        // Output the result as JSON
        echo json_encode($data);

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // If statement preparation fails, return an error message
        echo json_encode(['error' => 'Failed to prepare SQL statement']);
    }
} else {
    // If offer_id is not set in the URL, return an error message
    echo json_encode(['error' => 'offer_id is not set in the URL']);
}

// Close connection
mysqli_close($conn);
?>
