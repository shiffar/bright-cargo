<?php
session_start();
include 'connection.php';

header('Content-Type: application/json'); // Ensure the content type is set to JSON

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['shippedDetailsIds'])) {
    $shippedDetailsIds = explode(',', $_POST['shippedDetailsIds']);
    $company_id = $_SESSION['company_id'];

    $steps = [];

    foreach ($shippedDetailsIds as $id) {
        $query = "SELECT step_2, step_2_dte, step_3, step_3_dte, step_4, step_4_dte, step_5, step_5_dte, step_6, step_6_dte 
                  FROM shipping_steps WHERE container_id = ? AND company_id = ?";
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('ii', $id, $company_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $steps[] = [
                    'steps' => [
                        'container' => $row['step_2'],
                        'ship' => $row['step_3'],
                        'port' => $row['step_4'],
                        'customs' => $row['step_5'],
                        'delivery' => $row['step_6']
                    ],
                    'dates' => [
                        'container' => $row['step_2_dte'],
                        'ship' => $row['step_3_dte'],
                        'port' => $row['step_4_dte'],
                        'customs' => $row['step_5_dte'],
                        'delivery' => $row['step_6_dte']
                    ]
                ];
            } else {
                echo json_encode(['success' => false, 'message' => 'No data found']);
                exit();
            }
            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to prepare statement']);
            exit();
        }
    }

    echo json_encode(['success' => true, 'data' => $steps]);
} 
?>
