<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `expanses_type_id`, `expanses_type` FROM `expanses_type`";
$result = mysqli_query($conn, $query);

$expanses_type = [];
while($row = mysqli_fetch_assoc($result)) {
    $expanses_type[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($expanses_type);
?>