<?php
// Start session
session_start();

// Include database connection file
include 'connection.php';

// Fetch form data
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$role = mysqli_real_escape_string($conn, $_POST['role']);

// Validate login credentials based on role
if ($role == 'admin') {
    $query = "SELECT * FROM `register` WHERE `email` = '$email'";
    $password_field = 'password';
} elseif ($role == 'employee') {
    $query = "SELECT e.*, ar.access_right_id, ar.employee, ar.customer, ar.vendor, ar.location, ar.account, ar.agent, ar.hbl, ar.shipped
              FROM `employees` e 
              INNER JOIN `access_rights` ar ON e.employee_id = ar.employee_id_fk
              WHERE e.`email` = '$email'";
    $password_field = 'epassword';
} elseif ($role == 'customer') {
    $query = "SELECT * FROM `customers` WHERE `email` = '$email'";
    $password_field = 'cpassword';
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    // Verify hashed password
    if (password_verify($password, $row[$password_field])) {
        // Password is correct, proceed with session setting logic
        $_SESSION['email'] = $email;
        $_SESSION['loggedin'] = true;

        if ($role == 'employee') {
            $employeeData = array();
            $customerData = array();
            $vendorData = array();
            $locationData = array();
            $accountData = array();
            $agentData = array();
            $hblData = array();
            $shippedData = array();
            // Your existing employee data retrieval and session setting logic
            // Your existing employee data retrieval and session setting logic
            $employeeData = json_decode($row['employee'], true); // Decode JSON string to array
            $employeeString = implode(", ", $employeeData); // Convert array to comma-separated string

            $customerData = json_decode($row['customer'], true); // Decode JSON string to array
            $customerString = implode(", ", $customerData); // Convert array to comma-separated string

            $vendorData = json_decode($row['vendor'], true); // Decode JSON string to array
            $vendorString = implode(", ", $vendorData); // Convert array to comma-separated string

            $locationData = json_decode($row['location'], true); // Decode JSON string to array
            $locationString = implode(", ", $locationData); // Convert array to comma-separated string

            $agentData = json_decode($row['agent'], true); // Decode JSON string to array
            $agentString = implode(", ", $agentData); // Convert array to comma-separated string

            $accountData = json_decode($row['account'], true); // Decode JSON string to array
            $accountString = implode(", ", $accountData); // Convert array to comma-separated string

            $hblData = json_decode($row['hbl'], true); // Decode JSON string to array
            $hblString = implode(", ", $hblData); // Convert array to comma-separated string

            $shippedData = json_decode($row['shipped'], true); // Decode JSON string to array
            $shippedString = implode(", ", $shippedData); // Convert array to comma-separated string

            $_SESSION['is_employee'] = true; // Set session variable indicating the user is an employee
            $_SESSION['employee'] = $employeeString;
            $_SESSION['customer'] = $customerString;
            $_SESSION['vendor'] = $vendorString;
            $_SESSION['location'] = $locationString;
            $_SESSION['account'] = $accountString;
            $_SESSION['agent'] = $agentString;
            $_SESSION['hbl'] = $hblString;
            $_SESSION['shipped'] = $shippedString;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['employee_id'] = $row['employee_id'];

            // Fetch admin_id from employees table using employee_id
            $employee_id = $row['employee_id'];
            $admin_query = "SELECT company_id FROM employees WHERE employee_id = $employee_id";
            $admin_result = mysqli_query($conn, $admin_query);

            if (mysqli_num_rows($admin_result) == 1) {
                $admin_row = mysqli_fetch_assoc($admin_result);
                $company_id = $admin_row['company_id'];

                // Fetch company data from companies table using admin_id
                $company_query = "SELECT `company_id`, `c_name`, `c_address`, `c_phone`, `c_email`, `working_days`, `working_hours`, `avatar`, `trm_condi` FROM `companies` WHERE `company_id` = $company_id";
                $company_result = mysqli_query($conn, $company_query);

                if (mysqli_num_rows($company_result) == 1) {
                    $company_row = mysqli_fetch_assoc($company_result);
                    // Set company details in session
                    $_SESSION['company_id'] = $company_row['company_id'];
                    $_SESSION['c_name'] = $company_row['c_name'];
                    $_SESSION['c_address'] = $company_row['c_address'];
                    $_SESSION['c_phone'] = $company_row['c_phone'];
                    $_SESSION['c_email'] = $company_row['c_email'];
                    $_SESSION['working_days'] = $company_row['working_days'];
                    $_SESSION['working_hours'] = $company_row['working_hours'];
                    $_SESSION['avatar'] = $company_row['avatar'];
                    $_SESSION['trm_condi'] = $company_row['trm_condi'];
                }
            }

            $_SESSION['auth_user'] = [
                'employee' => $employeeString,
                'customer' => $customerString,
                'vendor' => $vendorString,
                'location' => $locationString,
                'account' => $accountString,
                'agent' => $agentString,
                'hbl' => $hblString,
                'shipped' => $shippedString
            ];


            echo 'success';
        } elseif ($role == 'admin') {
            $_SESSION['is_admin'] = true; // Set session variable indicating the user is an admin
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            // Fetch additional details from the companies table based on admin_id
            $admin_id = $row['id'];
            $company_query = "SELECT `company_id`, `admin_id`, `c_name`, `c_address`, `c_phone`, `c_email`, `working_days`, `working_hours`, `avatar`, `trm_condi`, `currency` FROM `companies` WHERE `admin_id` = $admin_id";
            $company_result = mysqli_query($conn, $company_query);

            if (mysqli_num_rows($company_result) == 1) {
                $company_row = mysqli_fetch_assoc($company_result);
                // Set company details in session
                $_SESSION['company_id'] = $company_row['company_id'];
                $_SESSION['c_name'] = $company_row['c_name'];
                $_SESSION['c_address'] = $company_row['c_address'];
                $_SESSION['c_phone'] = $company_row['c_phone'];
                $_SESSION['c_email'] = $company_row['c_email'];
                $_SESSION['working_days'] = $company_row['working_days'];
                $_SESSION['working_hours'] = $company_row['working_hours'];
                $_SESSION['avatar'] = $company_row['avatar'];
                $_SESSION['trm_condi'] = $company_row['trm_condi'];
                $_SESSION['currency'] = $company_row['currency'];
            }
            echo 'success';
        } elseif ($role == 'customer') {
            // Your session setting logic for customer here
            // Additional logic for customer login
            $_SESSION['is_customer'] = true; // Set session variable indicating the user is a customer
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];


            $company_id = $row['company_id'];

            $company_query = "SELECT `company_id`, `admin_id`, `c_name`, `c_address`, `c_phone`, `c_email`, `working_days`, `working_hours`, `avatar`, `currency` FROM `companies` WHERE `company_id` = $company_id";
            $company_result = mysqli_query($conn, $company_query);

            if (mysqli_num_rows($company_result) == 1) {
                $company_row = mysqli_fetch_assoc($company_result);
                // Set company details in session
                $_SESSION['company_id'] = $company_row['company_id'];
                $_SESSION['c_name'] = $company_row['c_name'];
                $_SESSION['c_address'] = $company_row['c_address'];
                $_SESSION['c_phone'] = $company_row['c_phone'];
                $_SESSION['c_email'] = $company_row['c_email'];
                $_SESSION['avatar'] = $company_row['avatar'];
            }
            echo 'success';
        }
    } else {
        echo 'error'; // Send error response to AJAX if password does not match
    }
} else {
    echo 'error'; // Send error response to AJAX if no matching user found
}

// Close database connection
mysqli_close($conn);
