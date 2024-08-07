<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
$query = "SELECT `company_branch_id`, `c_branch_name` FROM `company_branch`";
$result = mysqli_query($conn, $query);

$company_branchs = [];
while($row = mysqli_fetch_assoc($result)) {
    $company_branchs[] = $row;
}

// Send JSON response
header('Content-Type: application/json');
echo json_encode($company_branchs);
?>
