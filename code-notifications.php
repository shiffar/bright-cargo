<?php
session_start();
// Include your database connection file
include('connection.php');

if(isset($_POST['action'])) {
    // Fetch notifications
    
if ($_POST['action'] == 'fetch') {
    // Get the customer ID from session
    $customer_id_fk = $_SESSION['id'];

    $sql = "SELECT * FROM notification WHERE notification_status = 0 AND customer_id = $customer_id_fk";
    $result = $conn->query($sql);

    $notifications = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $notifications[] = $row;
        }
    }

    $response = array(
        'notificationCount' => count($notifications),
        'notifications' => $notifications
    );

    echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 'cnfetch'){
    // Fetch agents from database
    $customer_id_fk = $_SESSION['id'];

    $sql = "SELECT * FROM notification WHERE customer_id = $customer_id_fk";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}


    

    // Cancel a single notification
    if($_POST['action'] == 'cancel' && isset($_POST['notificationId'])) {
        $notificationId = $_POST['notificationId'];
        $sql = "UPDATE notification SET notification_status = 1 WHERE notification_id = $notificationId";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => $conn->error));
        }
    }
}
?>
