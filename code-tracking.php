<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if session ID is available
    if (!isset($_SESSION['id'])) {
        // If session ID is not available, check if the necessary details are provided
        if (!isset($_POST['search']) || !isset($_POST['customer_details'])) {
            // Display error response
            echo json_encode(array('error' => 'missing_parameters'));
            exit; // Ensure no further output
        }
        // If necessary details are provided, you can handle it here
        // For example, you can extract HBL code and customer details and proceed with the search
        $search = $_POST['search'];
        // Handle customer details (NIC/passport number or mobile number)
        $customerDetails = $_POST['customer_details'];

        // Perform search using HBL code and customer details
        $sql = "SELECT 
        hbl.*, 
        hbl.code AS hbl_code, 
        hbl_status.*, 
        company_branch.*, 
        employees.*, 
        employees.name AS emp_name, 
        shippers.*, 
        shipped_details_status.*,
        shippers.Mobile AS sender_mobile, 
        shippers.PP_NIC AS sender_pp_nic, 
        shipped_details.*, 
        shipped_details.estimated_date AS sestimated_date, 
        shipped_details.delivered_date AS sdelivered_date
    FROM 
        hbl
    LEFT JOIN 
        hbl_status ON hbl.hbl_id = hbl_status.hbl_id
    LEFT JOIN 
        company_branch ON hbl.company_branch = company_branch.company_branch_id
    LEFT JOIN 
        employees ON hbl.Sales_rep = employees.employee_id
    LEFT JOIN
        shipped_details ON hbl.container_id_fk = shipped_details.shipped_details_id
    LEFT JOIN 
        shipped_details_status ON shipped_details_status.shipped_details_id = shipped_details.shipped_details_id
    LEFT JOIN
        shippers ON shippers.hbl_id_fk = hbl.hbl_id
        WHERE  hbl.code = '$search' AND (shippers.Mobile = '$customerDetails' OR shippers.PP_NIC = '$customerDetails')";
    } else {
        if (isset($_POST['action']) && $_POST['action'] == 'tracking') {
            $customerId = $_SESSION['id'];

            // Perform search using session ID and HBL code
            $sql = "SELECT DISTINCT
                hbl.*, 
                hbl.code as hbl_code, 
                hbl_status.*, 
                company_branch.*,
                employees.*, employees.name as emp_name,
                consignees.*, consignees.Mobile as rece_mobile, consignees.PP_NIC as rece_pp_nic, consignees.City as rcity, consignees.Country as rcountry,
                shippers.*, shippers.Mobile as sender_mobile, shippers.PP_NIC as sender_pp_nic, shippers.City as scity, shippers.Country as scountry,
                hbl_details.*, hbl_details.Description as dDescription, hbl_details.CBM as dCBM, hbl_details.Weight as dWeight, hbl_details.QTY as dQTY, hbl_details.Amount as dAmount, hbl_details.Commission as dCommission,
                shipped_details.*, shipped_details.estimated_date as sestimated_date, shipped_details.delivered_date as sdelivered_date,
                shipped_details_status.*, shipping_steps.*
            FROM 
                hbl
            LEFT JOIN 
                hbl_status ON hbl.hbl_id = hbl_status.hbl_id
            LEFT JOIN 
                company_branch ON hbl.company_branch = company_branch.company_branch_id
            LEFT JOIN 
                employees ON hbl.Sales_rep = employees.employee_id
            LEFT JOIN 
                shipped_details ON hbl.container_id_fk = shipped_details.shipped_details_id
            LEFT JOIN
                shipped_details_status ON shipped_details_status.shipped_details_id = shipped_details.shipped_details_id
            LEFT JOIN 
                consignees ON hbl.hbl_id = consignees.hbl_id_fk
            LEFT JOIN 
                shippers ON hbl.hbl_id = shippers.hbl_id_fk
            LEFT JOIN
                hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
            LEFT JOIN 
                shipping_steps ON shipping_steps.container_id = hbl.container_id_fk
            WHERE hbl.Cus_Reference = '$customerId'";
        } else {
            $search = $_POST['search'];
            $customerId = $_SESSION['id'];

            // Perform search using session ID and HBL code
            $sql = "SELECT DISTINCT
            hbl.*, 
            hbl.code as hbl_code, 
            hbl_status.*, 
            company_branch.*,
            employees.*, employees.name as emp_name,
            consignees.*, consignees.Mobile as rece_mobile, consignees.PP_NIC as rece_pp_nic, consignees.City as rcity, consignees.Country as rcountry,
            shippers.*, shippers.Mobile as sender_mobile, shippers.PP_NIC as sender_pp_nic, shippers.City as scity, shippers.Country as scountry,
            hbl_details.*, hbl_details.Description as dDescription, hbl_details.CBM as dCBM, hbl_details.Weight as dWeight, hbl_details.QTY as dQTY, hbl_details.Amount as dAmount, hbl_details.Commission as dCommission,
            shipped_details.*, shipped_details.estimated_date as sestimated_date, shipped_details.delivered_date as sdelivered_date,
            shipping_steps'.*
        FROM 
            hbl
        LEFT JOIN 
            hbl_status ON hbl.hbl_id = hbl_status.hbl_id
        LEFT JOIN 
            company_branch ON hbl.company_branch = company_branch.company_branch_id
        LEFT JOIN 
            employees ON hbl.Sales_rep = employees.employee_id
        LEFT JOIN 
            shipped_details ON hbl.container_id_fk = shipped_details.shipped_details_id
        LEFT JOIN 
            consignees ON hbl.hbl_id = consignees.hbl_id_fk
        LEFT JOIN 
            shippers ON hbl.hbl_id = shippers.hbl_id_fk
        LEFT JOIN
            hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
        LEFT JOIN 
            shipping_steps ON shipping_steps.container_id = hbl.container_id_fk
        WHERE 
            hbl.code = '$search'
            AND hbl.Cus_Reference = '$customerId'";
        }
        // If session ID is available, proceed with the search using session ID

    }

    // Execute the query
    $result = $conn->query($sql);

    // Prepare results array
    $results = [];

    // Check if query was successful and if there are any results
    if ($result && $result->num_rows > 0) {
        // Fetch results and add to array
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }

    // Output results as JSON
    echo json_encode($results);
} else {
    // If request method is not POST
    echo json_encode(array('error' => 'method_not_allowed'));
}

// Close connection
$conn->close();
