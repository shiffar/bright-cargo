<?php
// Assuming you have a database connection established
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rowData"])) {
    // Retrieve the row data
    $rowData = $_POST["rowData"];

    // Escape the data to prevent SQL injection
    $aexpense_id = mysqli_real_escape_string($conn, $rowData['aexpense_id']);
    $type = mysqli_real_escape_string($conn, $rowData['type']);
    $description = mysqli_real_escape_string($conn, $rowData['description']);
    $amount = mysqli_real_escape_string($conn, $rowData['amount']);
    $vat_no = mysqli_real_escape_string($conn, $rowData['vat_no']);
    $vat_amount = mysqli_real_escape_string($conn, $rowData['vat_amount']);

    // Insert into the database
    $sql = "INSERT INTO expense_details (expanses_id_fk, Type, Description, Amount, vat_no, vat_amount) VALUES ('$aexpense_id', '$type', '$description', '$amount', '$vat_no', '$vat_amount')";

    if (mysqli_query($conn, $sql)) {
        echo "Expense details inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
