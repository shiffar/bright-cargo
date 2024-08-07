<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `agent_id`, `name` FROM `agent`";
$result = mysqli_query($conn, $query);

$agent = [];
while($row = mysqli_fetch_assoc($result)) {
    $agent[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($agent);
?>
