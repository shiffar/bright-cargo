<?php
// Assuming you have a database connection established
include('connection.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["rowData"])) {
    // Retrieve the row data
    $rowData = $_POST["rowData"];

    // Escape the data to prevent SQL injection
    $hbl_id = mysqli_real_escape_string($conn, $rowData['hbl_id']);
    $description = mysqli_real_escape_string($conn, $rowData['description']);
    $amount = mysqli_real_escape_string($conn, $rowData['amount']);
    $commission = mysqli_real_escape_string($conn, $rowData['commission']);

    // Insert into the database
    $sql = "INSERT INTO hbl_paid (hbl_id_fk, Description, Amount, Commission) 
            VALUES ('$hbl_id', '$description', '$amount', '$commission')";

    if (mysqli_query($conn, $sql)) {
        echo "HBL paid details inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>
