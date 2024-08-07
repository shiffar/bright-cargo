<?php
session_start();
include('connection.php');

// Insert Employee
if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    // Retrieve POST data
    if(isset($_SESSION['company_id'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        //$credit_limit = mysqli_real_escape_string($conn, $_POST['credit_limit']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $zip_code = mysqli_real_escape_string($conn, $_POST['zip_code']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $employee_type = mysqli_real_escape_string($conn, $_POST['employee_type']);
        $account_num = mysqli_real_escape_string($conn, $_POST['account_num']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $basic_salary = isset($_POST['basic_salary']) && $_POST['basic_salary'] !== '' ? mysqli_real_escape_string($conn, $_POST['basic_salary']) : 0;
        //$monthly_target = mysqli_real_escape_string($conn, $_POST['monthly_target']);
        //$percentage = mysqli_real_escape_string($conn, $_POST['percentage']);
        //$opening_balance = mysqli_real_escape_string($conn, $_POST['opening_balance']);
        $epassword = 12345;
        $hashed_password = password_hash($epassword, PASSWORD_DEFAULT);
        $status = 0;

        // Retrieve admin_id from session
        $company_id = $_SESSION['company_id'];

        // Fetch company_id using admin_id
        $company_query = "SELECT `company_id` FROM `companies` WHERE `company_id` = $company_id";
        $company_result = mysqli_query($conn, $company_query);

        if(mysqli_num_rows($company_result) == 1) {

            // Check if username or email already exists
            $checkQuery = "SELECT * FROM employees WHERE username='$username' OR email='$email'";
            $checkResult = $conn->query($checkQuery);
            
            if ($checkResult->num_rows > 0) {
                // Username or email already exists, notify the user
                echo "Username or email already exists. Please try a different username or email.";
            } else {
                // Insert query
                $sql = "INSERT INTO employees (company_id, name, gender, mobile, email, phone, address, city, zip_code, country, employee_type, account_num, username, epassword, role, location, basic_salary, status) 
                    VALUES ('$company_id', '$name', '$gender', '$mobile', '$email', '$phone', '$address', '$city', '$zip_code', '$country', '$employee_type', '$account_num', '$username', '$hashed_password', '$role', '$location', '$basic_salary', '$status')";
            
                if ($conn->query($sql) === TRUE) {
                    // Employee successfully created, now get the inserted employee_id
                    $employee_id = $conn->insert_id;
                    $e = '["emp_access_denied"]';
                    $c = '["emp_access_denied"]';
                    $v = '["emp_access_denied"]';
                    $l = '["emp_access_denied"]';
                    $a = '["emp_access_denied"]';
                    $ag = '["emp_access_denied"]';
                    $h = '["emp_access_denied"]';
                    $s = '["emp_access_denied"]';


                    // Insert additional data into access_rights table
                    $access_sql = "INSERT INTO access_rights (employee_id_fk, employee, customer, vendor, location, account, agent, hbl, shipped) 
                                    VALUES ('$employee_id', '$e', '$e', '$e', '$e', '$e', '$e', '$e', '$e')";
                    
                    if ($conn->query($access_sql) === TRUE) {
                        echo "New employee record and access rights created successfully";
                    } else {
                        echo "Error: " . $access_sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        } else {
            // Company profile doesn't exist, prompt to create one
            echo "Company profile does not exist. Please create a company profile first.";
        }
    } else {
        // Company_id is not set in session
        echo "Company profile does not exist. Please create a company profile first.";
    }
}

// Fetch Employees
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        // Fetch employees from database
        $company_id = $_SESSION['company_id'];
        $sql = "SELECT * FROM employees WHERE company_id = $company_id";
        $result = $conn->query($sql);

        $rows = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        echo json_encode($rows);
    } else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
}


// Edit Employee
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $employee_id = $_POST['employee_id'];

    // Fetch employee from database
    $sql = "SELECT * FROM employees WHERE employee_id = '$employee_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Employee not found";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'edit_pass'){
    // Retrieve POST data
    $employee_id = $_POST['employee_id'];

    // Fetch employee from database
    $sql = "SELECT * FROM employees WHERE employee_id = '$employee_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Employee not found";
    }
}

// Update Employee
if(isset($_POST['action']) && $_POST['action'] == 'update') {
    // Retrieve POST data
    $employee_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $name = mysqli_real_escape_string($conn, $_POST['ename']);
    $gender = mysqli_real_escape_string($conn, $_POST['egender']);
    $mobile = mysqli_real_escape_string($conn, $_POST['emobile']);
    $email = mysqli_real_escape_string($conn, $_POST['eemail']);
    $phone = mysqli_real_escape_string($conn, $_POST['ephone']);
    $address = mysqli_real_escape_string($conn, $_POST['eaddress']);
    $city = mysqli_real_escape_string($conn, $_POST['ecity']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['ezip_code']);
    $country = mysqli_real_escape_string($conn, $_POST['ecountry']);
    $employee_type = mysqli_real_escape_string($conn, $_POST['eemployee_type']);
    $account_num = mysqli_real_escape_string($conn, $_POST['eaccount_num']);
    $username = mysqli_real_escape_string($conn, $_POST['eusername']);
    $role = mysqli_real_escape_string($conn, $_POST['erole']);
    $location = mysqli_real_escape_string($conn, $_POST['elocation']);
    $basic_salary = mysqli_real_escape_string($conn, $_POST['ebasic_salary']);
    // Add more fields as needed

    // Check if username or email already exists
    $checkQuery = "SELECT * FROM employees WHERE (username='$username' OR email='$email') AND employee_id<>'$employee_id'";
    $checkResult = $conn->query($checkQuery);
    
    if ($checkResult->num_rows > 0) {
        // Username or email already exists, notify the user
        echo "Username or email already exists. Please try a different username or email.";
    } else {
        // Update employee in database
        $sql = "UPDATE employees SET name='$name', gender='$gender', mobile='$mobile', email='$email', phone='$phone', address='$address', city='$city', zip_code='$zip_code', country='$country', employee_type='$employee_type', account_num='$account_num', username='$username', role='$role', location='$location', basic_salary='$basic_salary' WHERE employee_id='$employee_id'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}


if(isset($_POST['action']) && $_POST['action'] == 'update_pass'){
    // Retrieve POST data
    $employee_id = mysqli_real_escape_string($conn, $_POST['eid2']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    // Check if password and confirm password match
    if($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Update employee in database with hashed password
        $sql = "UPDATE employees SET epassword='$hashed_password' WHERE employee_id='$employee_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Password updated successfully";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Password and confirm password do not match";
    }
}



if(isset($_POST['action']) && $_POST['action'] == 'edit_userAccess'){
    // Retrieve POST data
    $employee_id = $_POST['employee_id'];

    // Fetch employee from database
    $sql = "SELECT * FROM employees e
            LEFT JOIN access_rights ar ON ar.employee_id_fk = e.employee_id
            WHERE e.employee_id = '$employee_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
        
    } else {
        echo json_encode(array()); // Return empty JSON object if no data found
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'insert_update') {
    $eid = $_POST['eid3'];
    $employee = json_encode($_POST['uaemployee']);
    $customer = json_encode($_POST['uacustomer']);
    $vendor = json_encode($_POST['uavendor']);
    $location = json_encode($_POST['ualocation']);
    $account = json_encode($_POST['uaaccount']);
    $agent = json_encode($_POST['uaagent']);
    $hbl = json_encode($_POST['uahbl']);
    $shipped = json_encode($_POST['uashipped']);

    // Check if eid exists
    $sql_check = "SELECT COUNT(*) FROM `access_rights` WHERE `employee_id_fk` = '$eid'";
    $result_check = $conn->query($sql_check);
    $count = $result_check->fetch_row()[0];

    if ($count > 0) {
        // Update data if eid exists
        $sql_update = "UPDATE `access_rights` SET `employee` = '$employee', `customer` = '$customer', `vendor` = '$vendor', `location` = '$location', `account` = '$account', `agent` = '$agent', `hbl` = '$hbl', `shipped` = '$shipped' WHERE `employee_id_fk` = '$eid'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Employee access updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Insert data if eid doesn't exist
        $sql_insert = "INSERT INTO `access_rights` (`employee_id_fk`, `employee`, `customer`, `vendor`, `location`, `account`, `agent`, `hbl`, `shipped`) VALUES ('$eid', '$employee', '$customer', '$vendor', '$location', '$account', '$agent', '$hbl', '$shipped')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Employee access created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        // Handle success insert
    }

}

// Delete Employee
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $employee_id = $_POST['employee_id'];

    // Delete employee from database
    $sql = "DELETE FROM employees WHERE employee_id='$employee_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
