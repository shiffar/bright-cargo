<?php
// Database connection parameters
include 'connection.php';

// Check if complete_delivery_id is set in the URL
if (isset($_GET['courier_id'])) {
    $completeDeliveryId = $_GET['courier_id'];

    // Your SQL query
    $sql = "SELECT 
    hbl.*, 
    hbl.code AS hbl_code, 
    hbl_status.*, 
    agent.*, 
    agent.name AS agent_name,
    employees.*, 
    employees.name AS emp_name,
    consignees.*, 
    consignees.Mobile AS rece_mobile, 
    consignees.PP_NIC AS rece_pp_nic, 
    shipped_details.*, 
    shipped_details.estimated_date AS sestimated_date, 
    shipped_details.delivered_date AS sdelivered_date,
    complete_delivery.*,
    shippers.*,
    hbl_details.*, hbl_details.Description AS dDescription, hbl_details.CBM AS dCBM, hbl_details.Weight AS dWeight, hbl_details.QTY AS dQTY, hbl_details.Amount AS dAmount, hbl_details.Commission AS dCommission
FROM 
    hbl
LEFT JOIN 
    hbl_status ON hbl.hbl_id = hbl_status.hbl_id
LEFT JOIN 
    agent ON hbl.Agent = agent.agent_id
LEFT JOIN 
    employees ON hbl.Sales_rep = employees.employee_id
LEFT JOIN
    shipped_details ON hbl.container_id_fk = shipped_details.shipped_details_id
LEFT JOIN
    consignees ON consignees.hbl_id_fk = hbl.hbl_id
LEFT JOIN 
    complete_delivery AS complete_delivery ON complete_delivery.hbl_id_fk = hbl.hbl_id
LEFT JOIN 
    shippers AS shippers ON shippers.hbl_id_fk = hbl.hbl_id
LEFT JOIN 
    hbl_details AS hbl_details ON hbl_details.hbl_id_fk = hbl.hbl_id
WHERE 
    complete_delivery.complete_delivery_id = ?";

    // Prepare statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $completeDeliveryId);

    // Execute statement
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Fetch data as an associative array
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Output the result as JSON
    echo json_encode($data);

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    // If complete_delivery_id is not set in the URL, return an error message
    echo json_encode(['error' => 'complete_delivery_id is not set in the URL']);
}

// Close connection
mysqli_close($conn);
?>
