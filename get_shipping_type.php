<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `shipping_type_id`, `shipping_type` FROM `shipping_type`";
$result = mysqli_query($conn, $query);

$shipping_types = [];
while($row = mysqli_fetch_assoc($result)) {
    $shipping_types[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($shipping_types);
?>
