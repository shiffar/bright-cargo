<?php
// Include your database connection file here if it's not already included
include '../connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the action parameter is set and equals "insert"
    if (isset($_POST['action']) && $_POST['action'] == 'insert') {
        // Retrieve form data
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role_as = $_POST['role_as'];
        $status = $_POST['status']; // Assuming 1 for Active and 0 for Inactive

        $sql_check = "SELECT COUNT(*) AS count FROM register WHERE username = '$username' OR email = '$email'";
        $result_check = mysqli_query($conn, $sql_check);
        $row = mysqli_fetch_assoc($result_check);
        if ($row['count'] > 0) {
            $response = "Username or email already exists!";
            echo $response;
        } else {
            // Proceed with insertion
            // Your existing code here...
            if (!empty($username) && !empty($email) && !empty($password) && !empty($role_as)) {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
                // Insert into the register table
                $sql = "INSERT INTO register (username, email, password, role_as, status) 
                        VALUES ('$username', '$email', '$hashed_password', '$role_as', '$status')";
                $result = mysqli_query($conn, $sql); // Execute the query
                
                // Check if the insertion was successful
                if ($result) {
                    // If successful, send back a success message
                    $response = "User registered successfully!";
                    echo $response;
        
                    // Get the ID of the inserted user
                    $last_inserted_id = mysqli_insert_id($conn);
        
                    // Insert the admin_id into the companies table
                    $sql_insert_admin_id = "INSERT INTO companies (admin_id) VALUES ('$last_inserted_id')";
                    $result_insert_admin_id = mysqli_query($conn, $sql_insert_admin_id);
        
                    // Check if the insertion of admin_id into companies table was successful
                    if ($result_insert_admin_id) {
                        // If successful, send back a success message
                        $response_admin_id = "Admin ID inserted into companies table!";
                        echo $response_admin_id;
                    } else {
                        // If there was an error, send back an error message
                        $response_admin_id = "Error inserting admin ID into companies table: " . mysqli_error($conn);
                        echo $response_admin_id;
                    }
                } else {
                    // If there was an error inserting user into register table, send back an error message
                    $response = "Error registering user: " . mysqli_error($conn);
                    echo $response;
                }
            } else {
                // If any required field is empty, send back an error message
                $response = "All fields are required!";
                echo $response;
            }
        }
        
        // Validate form data (You may want to perform more validation here)
        
    }
    

    if (isset($_POST['action']) && $_POST['action'] == 'insert_da') {
        // Retrieve form data
        $da_name = $_POST['da_name'];
        $da_contact = $_POST['da_conatct']; // Correcting the variable name
        $da_email = $_POST['da_email'];
        $da_location = $_POST['da_location'];
        $da_username = $_POST['da_uername']; // Correcting the variable name
        $da_pass = $_POST['da_pass'];
    
        // Validate form data (You may want to perform more validation here)
        if (!empty($da_name) && !empty($da_contact) && !empty($da_email) && !empty($da_location) && !empty($da_username) && !empty($da_pass)) {
            // Check if the username or email already exists
            $sql_check = "SELECT COUNT(*) AS count FROM delivery_agent WHERE da_uername = '$da_username' OR da_email = '$da_email'";
            $result_check = mysqli_query($conn, $sql_check);
            $row = mysqli_fetch_assoc($result_check);
            if ($row['count'] > 0) {
                $response = "Username or email already exists!";
                echo $response;
            } else {
                // Hash the password
                $hashed_password = password_hash($da_pass, PASSWORD_DEFAULT);
    
                // Insert into the database
                $sql = "INSERT INTO delivery_agent (da_name, da_conatct, da_email, da_location, da_uername, da_pass) 
                        VALUES ('$da_name', '$da_contact', '$da_email', '$da_location', '$da_username', '$hashed_password')";
                $result = mysqli_query($conn, $sql); // Execute the query
                
                // Check if the insertion was successful
                if ($result) {
                    // If successful, send back a success message
                    $response = "Delivery agent registered successfully!";
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
    

    if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
        // Fetch locations from database
        $sql = "SELECT * FROM register";
        $result = $conn->query($sql);
    
        $rows = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
    
        echo json_encode($rows);
    }


    if(isset($_POST['action']) && $_POST['action'] == 'da_fetch'){
        // Fetch locations from database
        $sql = "SELECT * FROM delivery_agent";
        $result = $conn->query($sql);
    
        $rows = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
    
        echo json_encode($rows);
    }


    

    if(isset($_POST['action']) && $_POST['action'] == 'edit'){
        // Retrieve POST data
        $register_id = $_POST['register_id'];
    
        // Fetch location from database
        $sql = "SELECT * FROM register WHERE id = '$register_id'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "User not found";
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == 'da_edit'){
        // Retrieve POST data
        $delivery_agent_id = $_POST['delivery_agent_id'];
    
        // Fetch location from database
        $sql = "SELECT * FROM delivery_agent WHERE delivery_agent_id = '$delivery_agent_id'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "User not found";
        }
    }

    // Check if the action parameter is set and equals "update"
    if(isset($_POST['action']) && $_POST['action'] == 'update'){
        // Retrieve POST data
        $register_id = mysqli_real_escape_string($conn, $_POST['eid']);
        $username = mysqli_real_escape_string($conn, $_POST['eusername']);
        $email = mysqli_real_escape_string($conn, $_POST['eemail']);
        $password = mysqli_real_escape_string($conn, $_POST['epassword']);
        $role_as = mysqli_real_escape_string($conn, $_POST['erole_as']);
        $status = mysqli_real_escape_string($conn, $_POST['estatus']);
    
        // Check if the username or email already exists
        $sql_check = "SELECT COUNT(*) AS count FROM register WHERE (username='$username' OR email='$email') AND id<>'$register_id'";
        $result_check = mysqli_query($conn, $sql_check);
        $row = mysqli_fetch_assoc($result_check);
        if ($row['count'] > 0) {
            $response = "Username or email already exists!";
            echo $response;
        } else {
            // Proceed with update
            // Check if the password field is empty
            if (empty($password)) {
                // If the password field is empty, only update the other fields
                $sql = "UPDATE register SET username='$username', email='$email', role_as='$role_as', status='$status' WHERE id='$register_id'";
            } else {
                // If the password field is not empty, hash the password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE register SET username='$username', email='$email', password='$hashed_password', role_as='$role_as', status='$status' WHERE id='$register_id'";
            }
    
            // Execute the update query
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
    

    if(isset($_POST['action']) && $_POST['action'] == 'da_update'){
        // Retrieve POST data
        $delivery_agent_id = mysqli_real_escape_string($conn, $_POST['eid']);
        $da_name = mysqli_real_escape_string($conn, $_POST['eda_name']);
        $da_contact = mysqli_real_escape_string($conn, $_POST['eda_conatct']); // Correcting the variable name
        $da_email = mysqli_real_escape_string($conn, $_POST['eda_email']);
        $da_location = mysqli_real_escape_string($conn, $_POST['eda_location']);
        $da_username = mysqli_real_escape_string($conn, $_POST['eda_uername']); // Correcting the variable name
        $da_pass = mysqli_real_escape_string($conn, $_POST['eda_pass']);
    
        // Validate form data (You may want to perform more validation here)
        if (!empty($da_name) && !empty($da_contact) && !empty($da_email) && !empty($da_location) && !empty($da_username)) {
            // Check if the username or email already exists for other records
            $sql_check = "SELECT COUNT(*) AS count FROM delivery_agent WHERE (da_uername = '$da_username' OR da_email = '$da_email') AND delivery_agent_id = '$delivery_agent_id'";
            $result_check = mysqli_query($conn, $sql_check);
            $row = mysqli_fetch_assoc($result_check);
            if ($row['count'] > 0) {
                $response = "Username or email already exists!";
                echo $response;
            } else {
                // Check if the password field is empty
                if (empty($da_pass)) {
                    // If the password field is empty, only update the other fields
                    $sql = "UPDATE delivery_agent SET da_name='$da_name', da_contact='$da_contact', da_email='$da_email', da_location='$da_location', da_username='$da_username' WHERE delivery_agent_id='$delivery_agent_id'";
                } else {
                    // If the password field is not empty, hash the password
                    $hashed_password = password_hash($da_pass, PASSWORD_DEFAULT);
                    $sql = "UPDATE delivery_agent SET da_name='$da_name', da_contact='$da_contact', da_email='$da_email', da_location='$da_location', da_username='$da_username', da_pass='$hashed_password' WHERE delivery_agent_id='$delivery_agent_id'";
                }
                
                // Execute the update query
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                } else {
                    echo "Error updating record: " . $conn->error;
                }
            }
        } else {
            // If any required field is empty, send back an error message
            $response = "All fields are required!";
            echo $response;
        }
    }
    
    
    // Other actions...
}
?>
