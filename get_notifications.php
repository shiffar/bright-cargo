<?php
// Establish database connection
include 'connection.php';

// Fetch notifications from the database
$query = "SELECT `notification_id`, `customer_id`, `notification`, `time` FROM `notification` ORDER BY `time` DESC";
$result = mysqli_query($db_connection, $query);

// Store notifications in an array
$notifications = array();

// Check if there are any notifications
if(mysqli_num_rows($result) > 0) {
    // Loop through each notification
    while($row = mysqli_fetch_assoc($result)) {
        // Add notification to the array
        $notifications[] = $row;
    }
}

// Return notifications as JSON
echo json_encode($notifications);
?>
