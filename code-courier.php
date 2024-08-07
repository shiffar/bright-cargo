<?php
session_start();
// Include your database connection file
include('connection.php');

if(isset($_POST['action'])) {
    // Fetch notifications
    
    if ($_POST['action'] == 'courier_fetch') {
        // Get the customer ID from session
        $customer_id_fk = $_SESSION['id'];
    
        // Escape and quote the customer ID for the SQL query
        $customer_id_fk = $conn->real_escape_string($customer_id_fk);
    
        $sql = "SELECT * FROM hbl
        INNER JOIN hbl_status as hs on hbl.hbl_id = hs.hbl_id
        INNER JOIN complete_delivery as cd on hbl.hbl_id =  cd.hbl_id_fk
        WHERE current_status = 'completed' AND Cus_Reference = '$customer_id_fk'";
    
        $result = $conn->query($sql);
    
        $couriers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $couriers[] = $row;
            }
        }
    
        $response = array(
            'couriersCount' => count($couriers),
            'couriers' => $couriers
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
