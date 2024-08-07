<?php
// Assuming you have a database connection established
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rowData"])) {
    // Retrieve the row data
    $rowData = $_POST["rowData"];


    // Escape the data to prevent SQL injection
    $aexpense_id = mysqli_real_escape_string($conn, $rowData['aexpense_id']);
    $account = mysqli_real_escape_string($conn, $rowData['account']);
    $cq_number = mysqli_real_escape_string($conn, $rowData['cq_number']);
    $cheque_date = mysqli_real_escape_string($conn, $rowData['cheque_date']);
    $amount = mysqli_real_escape_string($conn, $rowData['amount']);

    // Insert into the database
    $sql = "INSERT INTO expense_paid (expanses_id_fk, account, cq_number, cheque_date, amount) VALUES ('$aexpense_id', '$account', '$cq_number', '$cheque_date', '$amount')";

    if (mysqli_query($conn, $sql)) {
        echo "Expense paid details inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
