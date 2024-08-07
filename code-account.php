<?php
include('connection.php');

// Insert Account
if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Retrieve POST data
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $bank_name = mysqli_real_escape_string($conn, $_POST['bank_name']);
    $account_number = mysqli_real_escape_string($conn, $_POST['account_number']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    
    // Insert query
    $sql = "INSERT INTO account (type, bank_name, account_number, status) 
            VALUES ('$type', '$bank_name', '$account_number', '$status')";
  
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch Accounts
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    // Fetch accounts from database
    $sql = "SELECT * FROM account";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}

// Edit Account
if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    // Retrieve POST data
    $account_id = $_POST['account_id'];

    // Fetch account from database
    $sql = "SELECT * FROM account WHERE account_id = '$account_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Account not found";
    }
}

// Update Account
if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $account_id = mysqli_real_escape_string($conn, $_POST['eid']);
    $type = mysqli_real_escape_string($conn, $_POST['etype']);
    $bank_name = mysqli_real_escape_string($conn, $_POST['ebank_name']);
    $account_number = mysqli_real_escape_string($conn, $_POST['eaccount_number']);
    $status = mysqli_real_escape_string($conn, $_POST['estatus']);

    // Update account in database
    $sql = "UPDATE account SET type='$type', bank_name='$bank_name', account_number='$account_number', status='$status' WHERE account_id='$account_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete Account
if(isset($_POST['action']) && $_POST['action'] == 'delete'){
    // Retrieve POST data
    $account_id = $_POST['account_id'];

    // Delete account from database
    $sql = "DELETE FROM account WHERE account_id='$account_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
