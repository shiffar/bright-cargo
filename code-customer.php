<?php
session_start();
include('connection.php');

// Insert Employee
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
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
        //$employee = isset($_POST['employee']) ? $_POST['employee'] : null; // Set $employee to null if not set in POST
        $account_num = mysqli_real_escape_string($conn, $_POST['account_num']);
        $type = mysqli_real_escape_string($conn, $_POST['type']);
        //$payment_term = mysqli_real_escape_string($conn, $_POST['payment_term']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        //$opening_balance = mysqli_real_escape_string($conn, $_POST['opening_balance']);
        $cpassword = 12345;
        $hashed_password = password_hash($cpassword, PASSWORD_DEFAULT);

        $company_id = $_SESSION['company_id'];

        // Check if employee field is not null and not empty

        $sql = "INSERT INTO customers (company_id, name, gender, mobile, email, phone, address, city, zipcode, country, account_number, type, username, cpassword) 
                    VALUES ('$company_id', '$name', '$gender', '$mobile', '$email', '$phone', '$address', '$city', '$zip_code', '$country', '$account_num', '$type', '$username', '$hashed_password')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
    }else {
        // Company_id is not set in session
        echo "Company profile does not exist. Please create a company profile first.";
    }
}




// Insert Employee
if(isset($_POST['action']) && $_POST['action'] == 'send_notifi'){
    // Retrieve POST data
    $customer_id = mysqli_real_escape_string($conn, $_POST['eid2']);
    $notification = mysqli_real_escape_string($conn, $_POST['notification']);

    // Insert query
    $sql = "INSERT INTO notification (customer_id, notification) 
            VALUES ('$customer_id', '$notification')";
  
    if ($conn->query($sql) === TRUE) {
        echo "Notification send successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch Employees
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    if(isset($_SESSION['company_id']) && !empty($_SESSION['company_id'])){
        $company_id = $_SESSION['company_id'];
        $sql = "SELECT 
    c.id, 
    c.name AS customer_name, 
    c.gender, 
    c.mobile, 
    c.email, 
    c.phone, 
    c.credit_limit, 
    c.address, 
    c.city, 
    c.zipcode, 
    c.country, 
    c.payment_term, 
    c.type, 
    c.username, 
    c.account_number, 
    c.opening_balance
    FROM customers c
    WHERE c.company_id = $company_id";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
    }else {
        // Session company_id is null or empty, handle as per your requirement
        echo json_encode(array()); // Return an empty array or handle as needed
    }
    // Fetch employees from database
    
}

// Edit Employee
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $id = $_POST['id'];

    // Fetch employee from database
    $sql = "SELECT * FROM customers WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Customer not found";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'edit_pass'){
    // Retrieve POST data
    $customer_id = $_POST['customer_id'];

    // Fetch employee from database
    $sql = "SELECT * FROM customers WHERE id = '$customer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Customer not found";
    }
}

// Update Employee
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $eid = mysqli_real_escape_string($conn, $_POST['eid']);
    $name = mysqli_real_escape_string($conn, $_POST['ename']);
    $gender = mysqli_real_escape_string($conn, $_POST['egender']);
    $mobile = mysqli_real_escape_string($conn, $_POST['emobile']);
    $email = mysqli_real_escape_string($conn, $_POST['eemail']);
    $phone = mysqli_real_escape_string($conn, $_POST['ephone']);
    //$credit_limit = mysqli_real_escape_string($conn, $_POST['ecredit_limit']);
    $address = mysqli_real_escape_string($conn, $_POST['eaddress']);
    $city = mysqli_real_escape_string($conn, $_POST['ecity']);
    $zip_code = mysqli_real_escape_string($conn, $_POST['ezip_code']);
    $country = mysqli_real_escape_string($conn, $_POST['ecountry']);
    //$employee = mysqli_real_escape_string($conn, $_POST['eemployee']);
    $account_num = mysqli_real_escape_string($conn, $_POST['eaccount_num']);
    $type = mysqli_real_escape_string($conn, $_POST['etype']);
    //$payment_term = mysqli_real_escape_string($conn, $_POST['epayment_term']);
    $username = mysqli_real_escape_string($conn, $_POST['eusername']);
    //$opening_balance = mysqli_real_escape_string($conn, $_POST['eopening_balance']);
    
    // Update employee in database
    $sql = "UPDATE customers SET name='$name', gender='$gender', mobile='$mobile', email='$email', phone='$phone', address='$address', city='$city', zipcode='$zip_code', country='$country', account_number='$account_num', type='$type', username='$username' WHERE id='$eid'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'update_pass'){
    // Retrieve POST data
    $customer_id = mysqli_real_escape_string($conn, $_POST['eid2']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    
    // Check if password and confirm password match
    if($password === $confirm_password) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Update customer in database with hashed password
        $sql = "UPDATE customers SET cpassword='$hashed_password'  WHERE id='$customer_id'";
        if ($conn->query($sql) === TRUE) {
            echo "Password updated successfully";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Password and confirm password do not match";
    }
}


// Delete Employee
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $id = $_POST['id'];

    // Delete employee from database
    $sql = "DELETE FROM customers WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'send_offer') {
    $offer_name = $_POST['offer_name'];
    $offer_t = $_POST['offer_t'];
    $offer_s = $_POST['offer_s'];
    $offer_end_date = $_POST['offer_end_date'];
    $selectedIds = json_decode($_POST['selectedIds'], true);

    // Insert offer notification into offer_notification table
    $sql = "INSERT INTO offer_notification (offer_name, offer_t, offer_s, offer_end_date, crte_dte) VALUES ('$offer_name', '$offer_t', '$offer_s', '$offer_end_date', NOW())";

    if ($conn->query($sql) === TRUE) {
        $offer_notification_id = $conn->insert_id;

        // Update customer table with the new offer_notification_id
        foreach ($selectedIds as $id) {
            $updateSql = "UPDATE customers SET offer_notification_id = $offer_notification_id WHERE id = $id";
            $conn->query($updateSql);
        }
        
        echo "success: Offer notification sent successfully.";
    } else {
        echo "error: Failed to send offer notification. " . $conn->error;
    }
}

if (isset($_POST['action']) && $_POST['action'] == 'offer_fetch') {
    // Get the customer ID from session
    if (isset($_SESSION['id'])) {
        $customer_id = $_SESSION['id'];

        // Escape and quote the customer ID for the SQL query
        $customer_id_fk = $conn->real_escape_string($customer_id);

        $sql = "SELECT * FROM customers
                LEFT JOIN offer_notification as ofn ON ofn.offer_notification_id = customers.offer_notification_id
                WHERE customers.id = '$customer_id_fk'";

        $result = $conn->query($sql);

        $offers = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $offers[] = $row;
            }
        }

        $response = array(
            'offers' => $offers
        );

        echo json_encode($response);
    } else {
        echo json_encode(array('error' => 'User not logged in.'));
    }
}


$conn->close();
?>
