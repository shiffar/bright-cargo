<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `employee_id`, `name`, `mobile` FROM `employees`";
$result = mysqli_query($conn, $query);

$employees = [];
while($row = mysqli_fetch_assoc($result)) {
    $employees[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($employees);
?>
