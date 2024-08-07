<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
// Fetch agent address data based on the selected agent ID
$selectedAgentId = $_GET['delivery_agent_bid'];
$agentAddressData = array();
$sqlAgentAddress = "SELECT `delivery_agent_bid`, `dabaddress`, `dabcity` FROM `delivery_agent_branch` WHERE `delivery_agent_bid` = $selectedAgentId AND dabhead_of = 'head_office' AND dabstatus = '1'";
$resultAgentAddress = $conn->query($sqlAgentAddress);
if ($resultAgentAddress->num_rows > 0) {
    while($row = $resultAgentAddress->fetch_assoc()) {
        $agentAddressData[] = $row;
    }
}

// Close connection
$conn->close();

// Return agent address data as JSON
header('Content-Type: application/json');
echo json_encode($agentAddressData);

?>
