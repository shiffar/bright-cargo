<?php
session_start();
include('connection.php');

if(isset($_POST['action']) && $_POST['action'] == 'fetch') {
    $sql = "SELECT * FROM `hbl_status` WHERE request_status = 0 AND current_status IN ('loading-pending', 'tbl-pending', 'on-hold-pending', 'shipped-pending', 'delivered-pending')";
    $result = $conn->query($sql);

    $requests = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $requests[] = $row;
        }
    }

    $response = array(
        'requestsCount' => count($requests),
        'requests' => $requests
    );

    echo json_encode($response);
}

if(isset($_POST['action']) && $_POST['action'] == 'cnfetch'){
    $company_id = $_SESSION['company_id'];
    $sql = "SELECT * FROM hbl_status
    LEFT JOIN hbl as h ON h.hbl_id = hbl_status.hbl_id
    WHERE request_status = 0 AND current_status IN ('loading-pending', 'tbl-pending', 'on-hold-pending', 'shipped-pending', 'delivered-pending') AND company_id = $company_id";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}

if(isset($_POST['action']) && $_POST['action'] == 'update') {
    // Get the notification ID from the POST data
    $notificationId = $_POST['notificationId'];

    // Update the request status in the database
    $sql = "UPDATE hbl_status SET request_status = 1 WHERE hbl_status_id = '$notificationId'";

    if (mysqli_query($conn, $sql)) {
        // If update is successful, send a JSON response indicating success
        echo json_encode(['success' => true]);
    } else {
        // If update fails, send a JSON response with an error message
        echo json_encode(['success' => false, 'message' => 'Failed to update request status']);
    }
}

// Check if the request is a POST request and if action is set to 'update'
if(isset($_POST['action']) && $_POST['action'] == 'update2') {
    // Get the notification ID from the POST data
    $notificationId = $_POST['notificationId'];

    // Get the current status of the notification
    $sqlSelect = "SELECT current_status FROM hbl_status WHERE hbl_status_id = '$notificationId'";
    $resultSelect = mysqli_query($conn, $sqlSelect);
    if ($resultSelect) {
        $row = mysqli_fetch_assoc($resultSelect);
        $currentStatus = $row['current_status'];

        // Check if the current status matches any of the specified statuses
        if ($currentStatus == 'loading-pending' || $currentStatus == 'tbl-pending' || $currentStatus == 'on-hold-pending' || $currentStatus == 'shipped-pending' || $currentStatus == 'delivered-pending') {
            // Store the old current status in the previous_status field
            //$sqlUpdate = "UPDATE hbl_status SET previous_status = current_status";

            // Update the current status based on the old status
            switch ($currentStatus) {
                case 'loading-pending':
                    $newStatus = 'loading';
                    break;
                case 'tbl-pending':
                    $newStatus = 'tbl';
                    break;
                case 'on-hold-pending':
                    $newStatus = 'on-hold';
                    break;
                case 'shipped-pending':
                    $newStatus = 'shipped';
                    break;
                case 'delivered-pending':
                    $newStatus = 'delivered';
                    break;
            }

            // Update the current status in the database
            $sqlUpdate = "UPDATE hbl_status SET current_status = '$newStatus' WHERE hbl_status_id = '$notificationId'";

            if (mysqli_query($conn, $sqlUpdate)) {
                // If update is successful, send a JSON response indicating success
                echo json_encode(['success' => true]);
            } else {
                // If update fails, send a JSON response with an error message
                echo json_encode(['success' => false, 'message' => 'Failed to update current status']);
            }
        } else {
            // If the current status does not match any of the specified statuses, send a JSON response with an error message
            echo json_encode(['success' => false, 'message' => 'Current status does not match any specified status']);
        }
    } else {
        // If the query fails, send a JSON response with an error message
        echo json_encode(['success' => false, 'message' => 'Failed to fetch current status']);
    }
} 




// Check if the request is a POST request and if action is set
if(isset($_POST['action']) && $_POST['action'] == 'cancel') {
    // Get the notification ID from the POST data
    $notificationId = $_POST['notificationId'];

    // Check if the current status is "shipped-pending"
    $sqlSelect = "SELECT current_status, hbl_id FROM hbl_status WHERE hbl_status_id = '$notificationId'";
    $resultSelect = mysqli_query($conn, $sqlSelect);

    if ($resultSelect) {
        $row = mysqli_fetch_assoc($resultSelect);
        $currentStatus = $row['current_status'];
        $hblId = $row['hbl_id'];

        if ($currentStatus == 'shipped-pending') {
            // If current status is "shipped-pending", get the container_id_fk from hbl table
            $sqlSelectHBL = "SELECT container_id_fk FROM hbl WHERE hbl_id = '$hblId'";
            $resultSelectHBL = mysqli_query($conn, $sqlSelectHBL);

            if ($resultSelectHBL) {
                $rowHBL = mysqli_fetch_assoc($resultSelectHBL);

                // Nullify container_id_fk in hbl table where hbl_id matches
                $sqlUpdateHBL = "UPDATE hbl SET container_id_fk = NULL WHERE hbl_id = '$hblId'";
                mysqli_query($conn, $sqlUpdateHBL);
            } else {
                // If the query fails, log an error
                error_log("Error fetching container_id_fk from hbl: " . mysqli_error($conn));
            }
        }

        
    } 
} 

?>

