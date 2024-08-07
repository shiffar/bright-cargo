<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = ['success' => false, 'message' => ''];

include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['shippedDetailsIds']) && isset($_POST['action']) && $_POST['action'] == 'check_steps') {
    $shipped_details_ids = $_POST['shippedDetailsIds'];
    $shipped_details_ids_array = explode(',', $shipped_details_ids);

    // Connect to the database


    // Fetch steps and dates for the first ID to compare with others
    $first_id = $shipped_details_ids_array[0];
    $query = "SELECT `step_1`, `step_1_dte`, `step_2`, `step_2_dte`, `step_3`, `step_3_dte`, `step_4`, `step_4_dte`, `step_5`, `step_5_dte`, `step_6`, `step_6_dte`, `step_7`, `step_7_dte` FROM `shipping_steps` WHERE `container_id` = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        $response['message'] = "Preparation failed: " . $conn->error;
        echo json_encode($response);
        exit;
    }
    $stmt->bind_param('i', $first_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $first_data = $result->fetch_assoc();
    $stmt->close();

    // Check if steps and dates are equal for all selected containers
    $steps_equal = true;
    foreach ($shipped_details_ids_array as $id) {
        $query = "SELECT `step_1`, `step_1_dte`, `step_2`, `step_2_dte`, `step_3`, `step_3_dte`, `step_4`, `step_4_dte`, `step_5`, `step_5_dte`, `step_6`, `step_6_dte`, `step_7`, `step_7_dte` FROM `shipping_steps` WHERE `container_id` = ?";
        $stmt = $conn->prepare($query);
        if (!$stmt) {
            $response['message'] = "Preparation failed: " . $conn->error;
            echo json_encode($response);
            exit;
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();

        if ($first_data != $data) {
            $steps_equal = false;
            break;
        }
    }

    if ($steps_equal) {
        $response['success'] = true;
        $response['data'] = $first_data;
    } else {
        $response['message'] = 'The selected containers have different steps and dates. Please select containers with matching steps and dates or update them individually.';
    }

    $conn->close();
} else {
    $response['message'] = 'Invalid request.';
}

echo json_encode($response);
?>
