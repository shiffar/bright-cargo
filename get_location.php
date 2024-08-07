<?php
// Establish your database connection here
include 'connection.php';
// Execute query to fetch employee data
// Fetch agent address data based on the selected agent ID
$selectedAgentId = $_GET['agent_id'];
$agentAddressData = array();
$sqlAgentAddress = "SELECT `agent_address_id`, `agent_id_fk`, `address`, `city`, `country`, `phone`, `fax`, `email`, `status`, `head_of` FROM `agents_address` WHERE `agent_id_fk` = $selectedAgentId";
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
