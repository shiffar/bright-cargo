<?php
include('connection.php');
session_start();
// Insert Employee
if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    // Assuming you have a database connection established

    // Get form data
    $dateReference = $_POST['date_reference'];
    $reference = $_POST['reference'];
    $employee = $_POST['employee'];
    $description = htmlspecialchars($_POST['description']);
    $company_id = $_SESSION['company_id'];

    $columns = "DateReference, Reference, Description, company_id";
    $values = "'$dateReference', '$reference', '$description', '$company_id'";

    
    if (!empty($_POST['employee'])) {
        $columns .= ", Employee";
        $values .= ", '$employee'";
    }
    
    $query = "INSERT INTO expenses ($columns) VALUES ($values)";

    // Insert into expenses table
    if (mysqli_query($conn, $query)) {
        $expenseId = mysqli_insert_id($conn); // Get the last inserted ID
        
        // Insert details into expense_details table
        if(isset($_POST['type']) && is_array($_POST['type'])) {
            foreach ($_POST['type'] as $key => $value) {
                $type = isset($_POST['type'][$key]) ? $_POST['type'][$key] : '';
                $adescription = isset($_POST['adescription'][$key]) ? $_POST['adescription'][$key] : '';
                $amount = isset($_POST['amount'][$key]) ? $_POST['amount'][$key] : '';
                $vatNo = isset($_POST['vat_no'][$key]) ? $_POST['vat_no'][$key] : '';
                $vatAmount = isset($_POST['vat_amount'][$key]) ? $_POST['vat_amount'][$key] : '';
                
                if(!empty($type) && !empty($adescription) && !empty($amount) && !empty($vatNo) && !empty($vatAmount)) {
                    $query = "INSERT INTO expense_details (expanses_id_fk, Type, Description, Amount, vat_no, vat_amount) VALUES ('$expenseId', '$type', '$adescription', '$amount', '$vatNo', '$vatAmount')";
                    mysqli_query($conn, $query);
                }
            }
        }

        // Insert details into expense_paid table
        if(isset($_POST['account']) && is_array($_POST['account'])) {
            foreach ($_POST['account'] as $key => $value) {
                $account = isset($_POST['account'][$key]) ? $_POST['account'][$key] : '';
                $cqNumber = isset($_POST['cq_number'][$key]) ? $_POST['cq_number'][$key] : '';
                $chequeDate = isset($_POST['cheque_date'][$key]) ? $_POST['cheque_date'][$key] : '';
                $amount2 = isset($_POST['amount2'][$key]) ? $_POST['amount2'][$key] : '';
                
                if(!empty($account) && !empty($cqNumber) && !empty($chequeDate) && !empty($amount2)) {
                    $query = "INSERT INTO expense_paid (expanses_id_fk, account, cq_number, cheque_date, amount) VALUES ('$expenseId', '$account', '$cqNumber', '$chequeDate', '$amount2')";
                    mysqli_query($conn, $query);
                }
            }
        }

        echo "Expense saved successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}


// Fetch Employees
if(isset($_POST['action']) && $_POST['action'] == 'fetch') {
    // Fetch data from joined tables
    $sql = "SELECT expenses.expens_id, expenses.DateReference, expenses.Reference, expenses.Employee, expenses.Description,
    COALESCE(SUM(expense_details.vat_amount), 0) AS total_amount,
    COALESCE(SUM(expense_paid.amount), 0) AS total_paid
        FROM expenses
        LEFT JOIN (
            SELECT expanses_id_fk, SUM(vat_amount) AS vat_amount
            FROM expense_details
            GROUP BY expanses_id_fk
        ) AS expense_details ON expenses.expens_id = expense_details.expanses_id_fk
        LEFT JOIN (
            SELECT expanses_id_fk, SUM(amount) AS amount
            FROM expense_paid
            GROUP BY expanses_id_fk
        ) AS expense_paid ON expenses.expens_id = expense_paid.expanses_id_fk
        GROUP BY expenses.expens_id;
        ";

    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}


// Edit Employee
if(isset($_POST['action']) && $_POST['action'] == 'edit') {
    $expens_id = $_POST['expens_id'];
    // Fetch expense details including related data from joined tables
    $sql = "SELECT expenses.expens_id, expenses.DateReference, expenses.Reference, expenses.Employee, expenses.Description as eDescription,
            detail.id as detail_id, detail.Type, detail.Description, detail.Amount, detail.vat_no, detail.vat_amount,
            paid.id as paid_id, paid.account, paid.cq_number, paid.cheque_date, paid.amount
            FROM expenses
            LEFT JOIN expense_details AS detail ON expenses.expens_id = detail.expanses_id_fk
            LEFT JOIN expense_paid AS paid ON expenses.expens_id = paid.expanses_id_fk
            LEFT JOIN expanses_type AS et ON detail.Type = et.expanses_type_id
            WHERE expenses.expens_id = $expens_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array(
            'expens_id' => $expens_id,
            'expense_details' => array(),
            'expense_paid' => array()
        );
    
        while ($row = $result->fetch_assoc()) {
            $data['DateReference'] = $row['DateReference'];
            $data['Reference'] = $row['Reference'];
            $data['Employee'] = $row['Employee'];
            $data['eDescription'] = $row['eDescription'];
    
            // Add expense details to the data array
            if (!empty($row['detail_id'])) {
                $data['expense_details'][] = array(
                    'id' => $row['detail_id'],
                    'Type' => $row['Type'],
                    'Description' => $row['Description'],
                    'Amount' => $row['Amount'],
                    'vat_no' => $row['vat_no'],
                    'vat_amount' => $row['vat_amount']
                );
            }
    
            // Add expense paid details to the data array
            if (!empty($row['paid_id'])) {
                $data['expense_paid'][] = array(
                    'id' => $row['paid_id'],
                    'account' => $row['account'],
                    'cq_number' => $row['cq_number'],
                    'cheque_date' => $row['cheque_date'],
                    'amount' => $row['amount']
                );
            }
        }
    
        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Expense not found'));
    }
    
}

if(isset($_POST['action']) && $_POST['action'] == 'update') {
    // Get form data
    $expens_id = $_POST['expens_id'];
    $date_reference = $_POST['edate_reference'];
    $reference = $_POST['ereference'];
    $employee = $_POST['eemployee'];
    $edescription = is_array($_POST['edescription']) ? implode("\n", $_POST['edescription']) : $_POST['edescription'];


    // Update expenses table
    $sql = "UPDATE expenses SET DateReference='$date_reference', Reference='$reference', Employee='$employee', Description='$edescription' WHERE expens_id=$expens_id";
    if ($conn->query($sql) === TRUE) {
        $success = true;
    } else {
        $success = false;
        $error = "Error updating expenses table: " . $conn->error;
    }

    // Update or insert expense_details table if details are provided
    if(isset($_POST['edetails_id']) && !empty($_POST['edetails_id'])) {
        foreach ($_POST['edetails_id'] as $key => $detail_id) {
            $type = $_POST['etype'][$key];
            $eedescription = $_POST['eedescription'][$key];
            $amount = $_POST['eamount'][$key];
            $vat_no = $_POST['evat_no'][$key];
            $vat_amount = $_POST['evat_amount'][$key];

            if ($detail_id != '') {
                // Update existing record
                $sql = "UPDATE expense_details SET Type='$type', Description='$eedescription', Amount='$amount', vat_no='$vat_no', vat_amount='$vat_amount' WHERE id=$detail_id";
            } 

            if ($conn->query($sql) !== TRUE) {
                $success = false;
                $error = "Error updating/inserting expense_details table: " . $conn->error;
                break; // Break loop on error
            }
        }
    }

    // Update or insert expense_paid table if details are provided
    if(isset($_POST['epaid_id']) && !empty($_POST['epaid_id'])) {
        foreach ($_POST['epaid_id'] as $key => $paid_id) {
            $account = $_POST['eaccount'][$key];
            $cq_number = $_POST['ecq_number'][$key];
            $cheque_date = $_POST['echeque_date'][$key];
            $amount = $_POST['eamount2'][$key];

            if ($paid_id != '') {
                // Update existing record
                $sql = "UPDATE expense_paid SET account='$account', cq_number='$cq_number', cheque_date='$cheque_date', amount='$amount' WHERE id=$paid_id";
            } else {
                // Insert new record
                $sql = "INSERT INTO expense_paid (expanses_id_fk, account, cq_number, cheque_date, amount) VALUES ($expens_id, '$account', '$cq_number', '$cheque_date', $amount)";
            }

            if ($conn->query($sql) !== TRUE) {
                $success = false;
                $error = "Error updating/inserting expense_paid table: " . $conn->error;
                break; // Break loop on error
            }
        }
    }

    // Handle response
    if ($success) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => $error));
    }
}





// Delete Employee
if(isset($_POST['action']) && $_POST['action'] == 'table_delete'){
        $table = $_POST['table']; // Get the table name from the request
        $id = $_POST['id']; // Get the ID of the row to be deleted

        // Perform the deletion based on the table name
        switch($table) {
            case 'expense_details':
                $sql = "DELETE FROM expense_details WHERE id = $id";
                break;
            case 'expense_paid':
                $sql = "DELETE FROM expense_paid WHERE id = $id";
                break;
            // Add more cases for other tables if needed
            default:
                // Handle invalid table name
                echo json_encode(array('success' => false, 'error' => 'Invalid table name'));
                return;
        }

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'error' => 'Error deleting row'));
        }
}

$conn->close();
?>
