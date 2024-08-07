<?php
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    
    $container_id = $_POST['id'];

    

    $query = "SELECT `step_1`, `step_1_dte`, `step_2`, `step_2_dte`, `step_3`, `step_3_dte`, `step_4`, `step_4_dte`, `step_5`, `step_5_dte`, `step_6`, `step_6_dte`, `step_7`, `step_7_dte` FROM `shipping_steps` WHERE `container_id` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $container_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
    $conn->close();

    echo json_encode($data);
}
