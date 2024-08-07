<?php
session_start();
// Include your database connection file here if it's not already included
include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the action parameter is set and equals "insert"
    $delivery_agent_id = $_SESSION['delivery_agent_id'];

    if (isset($_POST['action']) && $_POST['action'] == 'insert_das') {
        // Retrieve form data
        $das_name = $_POST['das_name'];
        $das_contact = $_POST['das_conatct']; // Correcting the variable name
        $das_email = $_POST['das_email'];
        $das_location = $_POST['das_location'];
        $das_username = $_POST['das_uername']; // Correcting the variable name
        $das_pass = $_POST['das_pass'];

        // Validate form data (You may want to perform more validation here)
        if (!empty($das_name) && !empty($das_contact) && !empty($das_email) && !empty($das_location) && !empty($das_username) && !empty($das_pass)) {
            // Check if the username or email already exists
            $sql_check = "SELECT COUNT(*) AS count FROM sub_delivery_agent WHERE das_uername = '$das_username' OR das_email = '$das_email'";
            $result_check = mysqli_query($conn, $sql_check);
            $row = mysqli_fetch_assoc($result_check);
            if ($row['count'] > 0) {
                $response = "Sub agent or email already exists!";
                echo $response;
            } else {
                // Hash the password
                $hashed_password = password_hash($das_pass, PASSWORD_DEFAULT);

                // Insert into the database
                $sql = "INSERT INTO sub_delivery_agent (delivery_agent_id_fk, das_name, das_conatct, das_email, das_location, das_uername, das_pass) 
                        VALUES ('$delivery_agent_id', '$das_name', '$das_contact', '$das_email', '$das_location', '$das_username', '$hashed_password')";
                $result = mysqli_query($conn, $sql); // Execute the query

                // Check if the insertion was successful
                if ($result) {
                    // If successful, send back a success message
                    $response = "Sub delivery agent registered successfully!";
                    echo $response;
                } else {
                    // If there was an error, send back an error message
                    $response = "Error: " . mysqli_error($conn);
                    echo $response;
                }
            }
        } else {
            // If any required field is empty, send back an error message
            $response = "All fields are required!";
            echo $response;
        }
    }



    if (isset($_POST['action']) && $_POST['action'] == 'das_fetch') {
        // Fetch locations from database
        $sql = "SELECT * FROM sub_delivery_agent";
        $result = $conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        echo json_encode($rows);
    }




    if (isset($_POST['action']) && $_POST['action'] == 'das_edit') {
        // Retrieve POST data
        $sub_delivery_agent_id = $_POST['sub_delivery_agent_id'];

        // Fetch location from database
        $sql = "SELECT * FROM sub_delivery_agent WHERE sub_delivery_agent_id = '$sub_delivery_agent_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "User not found";
        }
    }

    // Check if the action parameter is set and equals "update"
    if (isset($_POST['action']) && $_POST['action'] == 'das_update') {
        // Retrieve POST data
        $sub_delivery_agent_id = mysqli_real_escape_string($conn, $_POST['eid']);
        $das_name = mysqli_real_escape_string($conn, $_POST['edas_name']);
        $das_contact = mysqli_real_escape_string($conn, $_POST['edas_conatct']); // Correcting the variable name
        $das_email = mysqli_real_escape_string($conn, $_POST['edas_email']);
        $das_location = mysqli_real_escape_string($conn, $_POST['edas_location']);
        $das_username = mysqli_real_escape_string($conn, $_POST['edas_uername']); // Correcting the variable name
        $das_pass = mysqli_real_escape_string($conn, $_POST['edas_pass']);

        // Validate form data (You may want to perform more validation here)
        if (!empty($das_name) && !empty($das_contact) && !empty($das_email) && !empty($das_location) && !empty($das_username)) {
            // Check if the username or email already exists for other records

            // Check if the password field is empty
            if (empty($das_pass)) {
                // If the password field is empty, only update the other fields
                $sql = "UPDATE sub_delivery_agent SET das_name='$da_name', das_conatct='$das_contact', das_email='$das_email', das_location='$das_location', das_uername='$das_username' WHERE sub_delivery_agent_id='$sub_delivery_agent_id'";
            } else {
                // If the password field is not empty, hash the password
                $hashed_password = password_hash($das_pass, PASSWORD_DEFAULT);
                $sql = "UPDATE sub_delivery_agent SET das_name='$das_name', das_conatct='$das_contact', das_email='$das_email', das_location='$das_location', das_uername='$das_username', das_pass='$hashed_password' WHERE sub_delivery_agent_id='$sub_delivery_agent_id'";
            }

            // Execute the update query
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == 'get_hbl_rows') {
        // Retrieve POST data
        $sub_delivery_agent_id = $_POST['sub_delivery_agent_id'];


        // Fetch rows from the hbl table where shipped_details_id matches
        $sql = "SELECT * FROM hbl WHERE sub_delivery_agent = '$sub_delivery_agent_id'";
        $result = $conn->query($sql);

        $hbl_rows = array(); // Array to store hbl rows

        if ($result->num_rows > 0) {
            // Loop through each row and add it to the hbl_rows array
            while ($row = $result->fetch_assoc()) {
                $hbl_rows[] = $row;
            }
            echo json_encode($hbl_rows);
        } else {
            echo "No matching rows found in hbl table for the given shipped_details_id";
        }
    }


    if (isset($_POST['action']) && $_POST['action'] == 'remove_container') {
        // Retrieve POST data
        $hbl_id = $_POST['hbl_id'];

        // Include your database connection or configuration file here.
        // Assuming $conn represents your database connection.

        // Update the sub_delivery_agent_id to NULL in the hbl table for the corresponding hbl_id
        $sql_update_container = "UPDATE hbl SET sub_delivery_agent = NULL WHERE hbl_id = '$hbl_id'";
        if ($conn->query($sql_update_container) === TRUE) {
            // Update the current_status in the hbl_status table to a default value
        } else {
            echo "Error removing container: " . $conn->error;
        }
    }


    if (isset($_POST['action']) && $_POST['action'] == 'search_hbl') {
        // Retrieve POST data
        $codeOrBillNumber = $_POST['code_or_bill_number'];

        // Perform the search operation, assuming your database table name is `hbl`
        $sql = "SELECT * FROM hbl WHERE (code = '$codeOrBillNumber' OR Bill_no = '$codeOrBillNumber') AND sub_delivery_agent IS NULL";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response = array(
                'success' => true,
                'hbl_id' => $row['hbl_id'],
                'Date' => $row['Date'],
                'Bill_no' => $row['Bill_no'],
                'sub_delivery_agent' => $row['sub_delivery_agent'] // Include container_id_fk in the response
            );
            echo json_encode($response);
        } else {
            // Check if the HBL already exists in a container
            $sql_check_existing = "SELECT * FROM hbl WHERE code = '$codeOrBillNumber' OR Bill_no = '$codeOrBillNumber'";
            $result_existing = $conn->query($sql_check_existing);
            if ($result_existing->num_rows > 0) {
                // HBL already exists in a container
                echo json_encode(array('success' => false, 'message' => 'HBL already exists in a container.'));
            } else {
                // No matching record found
                echo json_encode(array('success' => false, 'message' => 'No matching record found.'));
            }
        }
    }


    if (isset($_POST['action']) && $_POST['action'] == 'update_container_id_fk') {
        // Retrieve POST data
        $hbl_id = $_POST['hbl_id'];
        $sub_delivery_agent_id = $_POST['sub_delivery_agent_id'];

        // Update the container_id_fk in the hbl table for the corresponding hbl_id
        $sql = "UPDATE hbl SET sub_delivery_agent = '$sub_delivery_agent_id' WHERE hbl_id = '$hbl_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Container ID updated successfully";
        } else {
            echo "Error updating container ID: " . $conn->error;
        }
    }




    // Other actions...
}
