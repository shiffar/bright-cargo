<?php
// Assuming the database connection is already established
include 'connection.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Parse form data
    $sshipping = $_POST['sshipping'];
    $sclearance = $_POST['sclearance'];
    $sstatus = $_POST['sstatus'];
    $date_range = $_POST['date_range'];

    $company_id = $_SESSION['company_id'];
    // Construct SQL query based on form inputs
    $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Agent, hbl.Location, hbl.Sales_rep, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.Amount, hbl.created_at, agent.name AS agent_name, location.city AS lcity, employees.name AS emp_name, hbl_status.current_status,
    COALESCE(SUM(hbl_details.Amount), 0) AS total_amount,
    shippers.Shipper_name,
    consignees.Consignee_name
    FROM hbl
    LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
    LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN agent ON hbl.Agent = agent.agent_id
    LEFT JOIN location ON hbl.Location = location.location_id
    LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    WHERE hbl.company_id = $company_id
    GROUP BY hbl.hbl_id";

    if (!empty($sshipping)) {
        $sql .= " AND Shipping = '$sshipping'";
    }

    if (!empty($sclearance)) {
        $sql .= " AND Clearance = '$sclearance'";
    }

    if (!empty($sstatus)) {
        $sql .= " AND current_status = '$sstatus'";
    }

    if (!empty($date_range)) {
        // Adjust this part based on your date column name and format
        $dates = explode(' - ', $date_range);
        $start_date = date('Y-m-d', strtotime($dates[0]));
        $end_date = date('Y-m-d', strtotime($dates[1]));
        $sql .= " AND Date BETWEEN '$start_date' AND '$end_date'";
    }

    // Execute SQL query
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}
?>
