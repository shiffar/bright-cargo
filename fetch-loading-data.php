<?php
// Include your database connection file
include 'connection.php';

if (isset($_POST['hblIds']) && !empty($_POST['hblIds'])) {
    // Assuming you are using MySQLi for database operations
    $selectedHblIds = isset($_POST['hblIds']) ? json_decode($_POST['hblIds']) : [];
    
    // Escape the values to prevent SQL injection
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    // Convert the array of HBL IDs to a comma-separated string
    $hblIdsString = implode(',', $selectedHblIds);

    // Query to fetch data from hbl, hbl_details, and hbl_status tables
    $sql = "SELECT hbl.*, hbl_details.*, ad.*, hbl_status.current_status, s.*, c.*, agent.name AS a_name
            FROM hbl 
            LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
            LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
            LEFT JOIN shippers AS s ON s.hbl_id_fk = hbl.hbl_id
            LEFT JOIN consignees AS c ON c.hbl_id_fk = hbl.hbl_id
            LEFT JOIN agent AS agent ON agent.agent_id = hbl.agent_id 
            LEFT JOIN agents_address AS ad ON ad.agent_id_fk = hbl.agent_id AND ad.head_of = 'head_office'
            WHERE hbl.hbl_id IN ($hblIdsString) AND hbl_status.current_status = '$status'";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $data = array(
            'hbl_ids' => $selectedHblIds,
            'hbl' => array()
        );

        while ($row = $result->fetch_assoc()) {
            $data['a_name'] = $row['a_name'];
            $hbl_data = array(
                'id' => $row['hbl_id'],
                'code' => $row['code'],
                'Bill_no' => $row['Bill_no'],
                'BBill_no' => $row['BBill_no'],
                'Shipping' => $row['Shipping'],
                'Shipper' => array(
                    'sname' => $row['Shipper_name'],
                    'saddress' => $row['Shipper_address']
                ),
                'Consignee' => array(
                    'cname' => $row['Consignee_name'],
                    'caddress' => $row['Consignee_address'],
                    'cmobile' => $row['Mobile']
                ),
                'agent' => array(
                    'a_name' => $row['a_name'],
                ),
                'hbl_details' => array()
            );

            // Fetch and append HBL details to the data array
            $hbl_details_sql = "SELECT * FROM hbl_details WHERE hbl_id_fk = {$row['hbl_id']}";
            $hbl_details_result = $conn->query($hbl_details_sql);
    
            while ($detail_row = $hbl_details_result->fetch_assoc()) {
                $hbl_data['hbl_details'][] = array(
                    'Description' => $detail_row['Description'],
                    'CBM' => $detail_row['CBM'],
                    'Weight' => $detail_row['Weight'],
                    'QTY' => $detail_row['QTY'],
                    'Amount' => $detail_row['Amount']
                );
            }
    
            // Add HBL data to the main data array
            $data['hbl'][] = $hbl_data;
        }
    
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'No HBLs found for the provided IDs and status'));
    }
} else {
    echo json_encode(array('error' => 'No HBL IDs provided'));
}
?>
