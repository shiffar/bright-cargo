<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `clearance_id`, `clearance` FROM `clearance`";
$result = mysqli_query($conn, $query);

$clearances = [];
while($row = mysqli_fetch_assoc($result)) {
    $clearances[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($clearances);
?>
