<?php
session_start();
include('connection.php');

// Fetch Employees
if(isset($_POST['action']) && $_POST['action'] == 'fetch') {
    // Fetch data from joined tables
    $sql = "SELECT hbl.hbl_id, hbl.company_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount, hbl.created_at, employees.name AS emp_name, hbl_status.current_status,
    hbl.HBLAmount as hAmount,
    shippers.Shipper_name,
    consignees.Consignee_name,
    companies.c_name
    FROM hbl
    LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
    LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    WHERE hbl_status.current_status IN ('delivered-pending', 'delivered')
    GROUP BY hbl.hbl_id";

    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}

if(isset($_POST['action']) && $_POST['action'] == 'sfetch') {
    $sub_delivery_agent_id = $_SESSION['sub_delivery_agent_id'];
    // Fetch data from joined tables
    $sql = "SELECT hbl.hbl_id, hbl.company_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount, hbl.created_at, employees.name AS emp_name, hbl_status.current_status,
    hbl.HBLAmount as hAmount,
    shippers.Shipper_name,
    consignees.Consignee_name,
    companies.c_name
    FROM hbl
    LEFT JOIN sub_delivery_agent ON sub_delivery_agent.sub_delivery_agent_id = hbl.sub_delivery_agent
    LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
    LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
    LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
    LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
    LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
    LEFT JOIN hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    WHERE hbl_status.current_status IN ('delivered-pending', 'delivered') AND hbl.sub_delivery_agent = '$sub_delivery_agent_id'
    GROUP BY hbl.hbl_id";

    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}

$conn->close();
?>
