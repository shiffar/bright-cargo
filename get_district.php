<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `district_location_id`, `district`, `country` FROM `district_location`";
$result = mysqli_query($conn, $query);

$district_locations = [];
while($row = mysqli_fetch_assoc($result)) {
    $district_locations[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($district_locations);
?>
