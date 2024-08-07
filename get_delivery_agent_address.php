<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT * FROM `delivery_agent_branch` 
LEFT JOIN delivery_agent ON delivery_agent.delivery_agent_id = delivery_agent_branch.delivery_agent_id
WHERE dabhead_of = 'head_office' AND dabstatus = '1'";
$result = mysqli_query($conn, $query);

$delivery_agent_branch = [];
while($row = mysqli_fetch_assoc($result)) {
    $delivery_agent_branch[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($delivery_agent_branch);
?>
