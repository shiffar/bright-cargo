<?php
session_start();
// Establish database connection and perform the query
include 'connection.php';
// Query to get the count of current status
$sql = "SELECT COUNT(hbl_status.current_status) AS status_count
        FROM register
        INNER JOIN employees ON employees.company_id = register.id
        INNER JOIN hbl_status ON hbl_status.employee_id = employees.employee_id
        WHERE register.id = ?";

// Assuming 'get session id' is the session id value stored in a variable
$sessionId = $_SESSION['id']; // Adjust this according to your actual session variable

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $sessionId);

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Fetch the result
$row = $result->fetch_assoc();
$statusCount = $row['status_count'];

// Close statement and connection
$stmt->close();
$conn->close();

// Output the result in the desired HTML format
echo '<div class="card card-flush h-xl-100">';
echo '<div class="card-body">';
echo '<h5 class="card-title">Current Status Count</h5>';
echo '<p class="card-text">' . $statusCount . '</p>';
echo '</div>';
echo '</div>';
?>
