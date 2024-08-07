<?php
include('connection.php');
session_start();
if (isset($_POST['action']) && $_POST['action'] == 'selected_fetch') {
    // Get the selected HBL IDs from the POST data
    $selectedHblIds = isset($_POST['selectedHblIds']) ? json_decode($_POST['selectedHblIds']) : [];

    // Check if any HBL IDs are selected
    if (!empty($selectedHblIds)) {
        // Initialize variables
        $shippingType = ''; // Initialize shippingType variable

        // Sanitize input data
        $selectedHblIds = array_map('intval', $selectedHblIds);
        $hblIdsString = implode(",", $selectedHblIds);
        $hblIdsString = mysqli_real_escape_string($conn, $hblIdsString);

        // Fetch shipping types for selected HBL IDs
        $sqlShipping = "SELECT DISTINCT Shipping FROM hbl WHERE hbl_id IN ($hblIdsString)";
        $resultShipping = mysqli_query($conn, $sqlShipping);

        if ($resultShipping) {
            $shippingTypes = [];
            while ($row = mysqli_fetch_assoc($resultShipping)) {
                $shippingTypes[] = $row['Shipping'];
            }

            // Check if there are mixed shipping types
            if (count(array_unique($shippingTypes)) > 1) {
                $response = ['error' => 'Mixed shipping types (Sea and Air) selected. Please select HBLs with the same shipping type.'];
                echo json_encode($response);
                exit; // Exit execution to prevent further processing
            } else {
                // If only one shipping type, assign it to shippingType
                $shippingType = $shippingTypes[0];
            }
        } else {
            $response = ['error' => 'Error executing shipping types query: ' . mysqli_error($conn)];
            echo json_encode($response);
            exit; // Exit execution if there's an error
        }

        // Fetch total weight for selected HBL IDs from hbl_details table
        $sqlWeight = "SELECT SUM(Weight) AS totalHBLWeight FROM hbl_details WHERE hbl_id_fk IN ($hblIdsString)";
        $resultWeight = mysqli_query($conn, $sqlWeight);

        if ($resultWeight) {
            $totalWeightRow = mysqli_fetch_assoc($resultWeight);
            $totalHBLWeight = $totalWeightRow['totalHBLWeight'];
        } else {
            $response = ['error' => 'Error fetching total weight: ' . mysqli_error($conn)];
            echo json_encode($response);
            exit; // Exit execution if there's an error
        }

        // Fetch data for the table
        $sqlTable = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Clearance, hbl.Sales_rep, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount, hbl.location2, hbl.created_at, employees.name AS emp_name,
        hbl.HBLAmount AS total_amount,
        shippers.Shipper_name,
        consignees.Consignee_name,
        hbl_details.Weight
        FROM hbl
        LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
        LEFT JOIN hbl_paid ON hbl.hbl_id = hbl_paid.hbl_id_fk
        LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
        LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
        LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
        WHERE hbl.hbl_id IN ($hblIdsString)
        GROUP BY hbl.hbl_id";

        $resultTable = mysqli_query($conn, $sqlTable);

        if ($resultTable) {
            // Prepare the data to be sent back
            $data = [
                'shippingType' => $shippingType,
                'totalHBLWeight' => $totalHBLWeight,
                'table' => ''
            ];

            // Generate the table HTML
            $tableHtml = '<div class="table-responsive">';
            $tableHtml .= '<table class="table table-hover table-rounded table-striped border gy-7 gs-7">';
            $tableHtml .= '<thead><tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200"><th>Date</th><th>Bill No</th><th>Code</th><th>Employee Name</th><th>Shipper Name</th><th>Consignee Name</th><th>City</th><th>Total Amount</th><th>Actions</th></tr></thead>';
            $tableHtml .= '<tbody>';

            while ($row = mysqli_fetch_assoc($resultTable)) {
                $tableHtml .= '<tr>';
                $tableHtml .= '<td>' . $row['Date'] . '</td>';
                $tableHtml .= '<td>' . $row['Bill_no'] . '</td>';
                $tableHtml .= '<td>' . $row['code'] . '</td>';
                $tableHtml .= '<td>' . $row['emp_name'] . '</td>';
                $tableHtml .= '<td>' . $row['Shipper_name'] . '</td>';
                $tableHtml .= '<td>' . $row['Consignee_name'] . '</td>';
                $tableHtml .= '<td>' . $row['location2'] . '</td>';
                $tableHtml .= '<td>' . $row['total_amount'] . '</td>';
                $tableHtml .= '<td><a class="btn btn-icon btn-danger remove-row" data-hblid="' . $row['hbl_id'] . '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>'; // Add remove button
                $tableHtml .= '</tr>';
            }

            $tableHtml .= '</tbody>';
            $tableHtml .= '</table>';
            $tableHtml .= '</div>';

            // Add table HTML to the data
            $data['table'] = $tableHtml;

            // Encode the data as JSON and send it back
            echo json_encode($data);
        } else {
            $response = ['error' => 'Error executing query: ' . mysqli_error($conn)];
            echo json_encode($response);
        }
    } else {
        $response = ['error' => 'No selected HBL IDs received.'];
        echo json_encode($response);
    }
}



if (isset($_POST['action']) && $_POST['action'] == 'selected_fetch2') {
    // Include your database connection file


    $selectedHblIds = isset($_POST['selectedHblIds']) ? json_decode($_POST['selectedHblIds']) : [];

    if (!empty($selectedHblIds)) {
        // Fetch shipping types and agent IDs for selected HBL IDs
        $hblIdsString = implode(",", $selectedHblIds);
        $sql = "SELECT DISTINCT Shipping, agent_id FROM hbl WHERE hbl_id IN ($hblIdsString)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $shippingTypes = [];
            $agentIds = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $shippingTypes[] = $row['Shipping'];
                $agentIds[] = $row['agent_id'];
            }

            // Check if there are mixed shipping types or agent IDs
            if (count(array_unique($shippingTypes)) > 1) {
                echo "Mixed shipping types (Sea and Air) selected. Please select HBLs with the same shipping type.";
                exit; // Exit execution to prevent further processing
            }

            if (count(array_unique($agentIds)) > 1) {
                echo "Mixed agents selected. Please select HBLs with the same agent.";
                exit; // Exit execution to prevent further processing
            }
        } else {
            echo "Error executing query: " . mysqli_error($conn);
            exit; // Exit execution if there's an error
        }

        // If there are no mixed shipping types or agent IDs, continue fetching and displaying data
        $sql = "SELECT hbl.hbl_id, hbl.Date, hbl.Bill_no, hbl.code, hbl.Shipping, hbl.Clearance, hbl.Sales_rep, hbl.Cus_Reference, hbl.Estimated_date, hbl.Delivered_date, hbl.Discount, hbl.Note, hbl.HBL_Type, hbl.HBLAmount, hbl.created_at, hbl.location2, employees.name AS emp_name,
                hbl.HBLAmount AS total_amount,
                shippers.Shipper_name,
                consignees.Consignee_name
                FROM hbl
                LEFT JOIN hbl_details ON hbl.hbl_id = hbl_details.hbl_id_fk
                LEFT JOIN shippers ON hbl.hbl_id = shippers.hbl_id_fk
                LEFT JOIN consignees ON hbl.hbl_id = consignees.hbl_id_fk
                LEFT JOIN employees ON hbl.Sales_rep = employees.employee_id
                WHERE hbl.hbl_id IN ($hblIdsString)
                GROUP BY hbl.hbl_id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            $html = '<div class="table-responsive">';
            $html .= '<table class="table table-hover table-rounded table-striped border gy-7 gs-7">';
            $html .= '<thead><tr class="fw-semibold fs-6 text-gray-800 border-bottom-2 border-gray-200"><th>Date</th><th>Bill No</th><th>Code</th><th>Employee Name</th><th>Shipper Name</th><th>Consignee Name</th><th>City</th><th>Total Amount</th><th>Action</th></tr></thead>';
            $html .= '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<tr>';
                $html .= '<td>' . $row['Date'] . '</td>';
                $html .= '<td>' . $row['Bill_no'] . '</td>';
                $html .= '<td>' . $row['code'] . '</td>';
                $html .= '<td>' . $row['emp_name'] . '</td>';
                $html .= '<td>' . $row['Shipper_name'] . '</td>';
                $html .= '<td>' . $row['Consignee_name'] . '</td>';
                $html .= '<td>' . $row['location2'] . '</td>';
                $html .= '<td>' . $row['total_amount'] . '</td>';
                $html .= '<td><a class="btn btn-icon btn-danger remove-row" data-hblid="' . $row['hbl_id'] . '"><i class="ki-duotone ki-trash-square fs-2qx"><span class="path1"></span><span class="path2"></span> <span class="path3"></span><span class="path4"></span></i></a></td>'; // Add remove button
                $html .= '</tr>';
            }

            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';

            echo $html;
        } else {
            echo "Error executing query: " . mysqli_error($conn);
        }
    } else {
        echo "No selected HBL IDs received.";
    }
}

if (isset($_POST['hblIds']) && isset($_POST['status'])) {
    $hblIds = is_array($_POST['hblIds']) ? $_POST['hblIds'] : array($_POST['hblIds']);
    $status = $_POST['status'];
    $hblIdsString = implode(',', $hblIds);
    $company_id = $_SESSION['company_id'];
    $company_name = $_SESSION['c_name'];

    // Assuming you have a valid database connection stored in $conn

    if ($status === 'shipped' || $status === 'shipped-pending') {
        // Fetch shipping details from the form
        $shipping_date = $_POST['shipping_date'];
        $delivery_agent_branch = $_POST['delivery_agent_branch'];
        $dab_location = $_POST['dab_location'];
        $shipping_by = !empty($_POST['shipping_by']) ? $_POST['shipping_by'] : null;
        $shipping_type = !empty($_POST['shipping_type']) ? $_POST['shipping_type'] : null;
        $shipping_no = $_POST['shipping_no'];
        $file_no = $_POST['file_no'];
        $feet_weight = $_POST['feet_weight'];
        $freight_charge = $_POST['freight_charge'];
        $clearance_charge = $_POST['clearance_charge'];
        $booking_charge = $_POST['booking_charge'];
        $loading_charge = $_POST['loading_charge'];
        $seal = $_POST['seal'];
        $estimated_date = $_POST['estimated_date'];
        $delivered_date = $_POST['delivered_date'];
        $shipping_description = $_POST['shipping_description'];

        // Insert shipping details into the database
        $insertQuery = "INSERT INTO shipped_details (shipping_date, delivery_agent_bid, dab_location, shipping_by, shipping_type, shipping_no, file_no, feet_weight, freight_charge, clearance_charge, booking_charge, loading_charge, seal, estimated_date, delivered_date, shipping_description) 
                            VALUES ('$shipping_date', '$delivery_agent_branch', '$dab_location', '$shipping_by', '$shipping_type', '$shipping_no', '$file_no', '$feet_weight', '$freight_charge', '$clearance_charge', '$booking_charge', '$loading_charge', '$seal', '$estimated_date', '$delivered_date', '$shipping_description')";
        $result = mysqli_query($conn, $insertQuery);
        if ($result) {
            $shipped_details_id = mysqli_insert_id($conn); // Get the inserted ID
            if ($shipped_details_id) {
                // Update the status in the hbl_status table
                $updateQuery = "UPDATE hbl_status SET current_status = '$status' WHERE hbl_id IN ($hblIdsString)";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "Status updated successfully";

                    // Determine scurrent_status based on status
                    $scurrent_status = ($status === 'shipped') ? 'loading' : 'loading-pending';

                    // Insert status into shipped_details_status table
                    $srequest_status = (strpos($status, '-pending') !== false) ? 0 : 1;
                    $insertStatusQuery = "INSERT INTO shipped_details_status (shipped_details_id, scurrent_status, srequest_status, stime) 
                                              VALUES ($shipped_details_id, '$scurrent_status', $srequest_status, NOW())";
                    if (mysqli_query($conn, $insertStatusQuery)) {
                        echo "Status inserted into shipped_details_status successfully";
                    } else {
                        echo "Error inserting status into shipped_details_status: " . mysqli_error($conn);
                    }

                    // Update the container_id_fk in the hbl table
                    $updateQuery2 = "UPDATE hbl SET container_id_fk = $shipped_details_id WHERE hbl_id IN ($hblIdsString)";
                    if (mysqli_query($conn, $updateQuery2)) {
                        echo "Container ID updated successfully";

                        // Insert the container ID into the shipping_steps table
                        $step_1 = "THANK YOU FOR YOUR " . strtoupper($company_name) . " CHOICE, YOUR CARGO WITH US AND ON PROCESS FOR LOADING";
                        $step_2 = "YOUR CARGO LOADED TO CONTAINER BY BRIGHT CARGO";
                        $step_3 = "YOUR SHIPMENT ON BOARD NOW AND SAILED FROM PORT OF LOADING";
                        $step_4 = "YOUR CARGO REACHED IN PORT OF DISCHARGE AND READY FOR CLEARANCE";
                        $step_5 = "YOUR CARGO HAS BEEN CLEARED FROM CUSTOMS AND BEING ARRANGED FOR DELIVERY";
                        $step_6 = "YOUR CARGO OUT FOR DELIVERY AND WILL BE RECEIVED BY YOUR CONSIGNED PERSON AS SOON AS POSSIBLE";
                        $step_7 = "YOUR CARGO DELIVERED. THANK YOU FOR SHIPPING WITH " . strtoupper($company_name);
                        $step_1_dte = date('Y-m-d');
                        $insertStepQuery = "INSERT INTO shipping_steps (container_id, step_1, step_2, step_3, step_4, step_5, step_6, step_7, step_1_dte) 
                                            VALUES ($shipped_details_id, '$step_1', '$step_2', '$step_3', '$step_4', '$step_5', '$step_6', '$step_7', '$step_1_dte')";
                        if (mysqli_query($conn, $insertStepQuery)) {
                            echo "Shipping steps updated successfully";
                        } else {
                            echo "Error inserting into shipping_steps: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Error updating container ID: " . mysqli_error($conn);
                    }
                } else {
                    echo "Error updating status: " . mysqli_error($conn);
                }
            } else {
                echo "Error retrieving last inserted ID";
            }
        } else {
            echo "Error inserting shipping details: " . mysqli_error($conn);
        }
    } else {
        // For statuses other than 'shipped', update status directly in hbl_status
        $updateQuery = "UPDATE hbl_status SET current_status = '$status' WHERE hbl_id IN ($hblIdsString)";
        if (mysqli_query($conn, $updateQuery)) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . mysqli_error($conn);
        }
    }
}




if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['shippedDetailsIds']) && isset($_POST['action']) && $_POST['action'] == 'shipping_status') {
    $shipped_details_ids = $_POST['shippedDetailsIds'];
    $status_message = $_POST['statusMessage'];

    $shipped_details_ids_array = explode(',', $shipped_details_ids);

    // Fetch steps and dates for the first ID to compare with others
    $first_id = $shipped_details_ids_array[0];
    $query = "SELECT `step_1`, `step_1_dte`, `step_2`, `step_2_dte`, `step_3`, `step_3_dte`, `step_4`, `step_4_dte`, `step_5`, `step_5_dte`, `step_6`, `step_6_dte`, `step_7`, `step_7_dte` FROM `shipping_steps` WHERE `container_id` = ?";
    $stmt = $conn->prepare($query);
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
        foreach ($shipped_details_ids_array as $id) {
            // Update steps in the shipping_steps table
            $query = "UPDATE `shipping_steps` SET 
                        `step_1` = ?, `step_1_dte` = ?, `step_2` = ?, `step_2_dte` = ?, `step_3` = ?, `step_3_dte` = ?, `step_4` = ?, `step_4_dte` = ?, 
                        `step_5` = ?, `step_5_dte` = ?, `step_6` = ?, `step_6_dte` = ?, `step_7` = ?, `step_7_dte` = ? 
                      WHERE `container_id` = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param(
                'ssssssssssssssi',
                $_POST['step_1'],
                $_POST['step_1_dte'],
                $_POST['step_2'],
                $_POST['step_2_dte'],
                $_POST['step_3'],
                $_POST['step_3_dte'],
                $_POST['step_4'],
                $_POST['step_4_dte'],
                $_POST['step_5'],
                $_POST['step_5_dte'],
                $_POST['step_6'],
                $_POST['step_6_dte'],
                $_POST['step_7'],
                $_POST['step_7_dte'],
                $id
            );
            $stmt->execute();
            $stmt->close();

            // Update status in the shipped_details_status table
            $query = "UPDATE `shipped_details_status`
                      SET `scurrent_status` = ?, `srequest_status` = ?, `stime` = NOW()
                      WHERE `shipped_details_id` = ?";
            $stmt = $conn->prepare($query);
            $srequest_status = (strpos($status_message, '-pending') !== false) ? 0 : 1;
            $stmt->bind_param('sii', $status_message, $srequest_status, $id);
            $stmt->execute();
            $stmt->close();

            // Check if status is 'delivery-pending' or 'delivery' and update HBL statuses
            if ($status_message == 'vehicle-pending' || $status_message == 'vehicle') {
                // Fetch HBL IDs based on container_id_fk
                $query_hbl_ids = "SELECT `hbl_id` FROM `hbl` WHERE `container_id_fk` = ?";
                $stmt_hbl_ids = $conn->prepare($query_hbl_ids);
                $stmt_hbl_ids->bind_param('i', $id);
                $stmt_hbl_ids->execute();
                $result_hbl_ids = $stmt_hbl_ids->get_result();

                // Update HBL statuses in hbl_status table
                while ($row_hbl_ids = $result_hbl_ids->fetch_assoc()) {
                    $hbl_id = $row_hbl_ids['hbl_id'];
                    $update_query_hbl_status = "UPDATE `hbl_status` SET `current_status` = ? WHERE `hbl_id` = ?";
                    $stmt_update_hbl_status = $conn->prepare($update_query_hbl_status);
                    $delivered_status = ($status_message == 'vehicle-pending') ? 'delivered-pending' : 'delivered';
                    $stmt_update_hbl_status->bind_param('si', $delivered_status, $hbl_id);
                    $stmt_update_hbl_status->execute();
                    $stmt_update_hbl_status->close();
                }

                $stmt_hbl_ids->close();
            }
        }

        echo json_encode(['success' => true]);
    }
}


