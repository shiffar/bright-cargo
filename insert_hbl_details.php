<?php
// Assuming you have a database connection established
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rowData"])) {
    // Retrieve the row data
    $rowData = $_POST["rowData"];

    // Escape the data to prevent SQL injection
    $hbl_id = mysqli_real_escape_string($conn, $rowData['hbl_id']);
    $description = mysqli_real_escape_string($conn, $rowData['ddescription']);
    $cbm = mysqli_real_escape_string($conn, $rowData['cbm']);
    $weight = mysqli_real_escape_string($conn, $rowData['weight']);
    $qty = mysqli_real_escape_string($conn, $rowData['qty']);
    $amount = mysqli_real_escape_string($conn, $rowData['amount']);
    $commission = mysqli_real_escape_string($conn, $rowData['commission']);

    // Insert into the database
    $sql = "INSERT INTO hbl_details (hbl_id_fk, Description, CBM, Weight, QTY, Amount, Commission) 
            VALUES ('$hbl_id', '$description', '$cbm', '$weight', '$qty', '$amount', '$commission')";

    if (mysqli_query($conn, $sql)) {
        echo "HBL details inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
