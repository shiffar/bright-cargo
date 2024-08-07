<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `id`, `name`, `mobile` FROM `customers`";
$result = mysqli_query($conn, $query);

$customers = [];
while($row = mysqli_fetch_assoc($result)) {
    $customers[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($customers);
?>
