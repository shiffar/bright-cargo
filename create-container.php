<?php
// Check if containerName is set and not empty
if (isset($_POST['containerName']) && !empty($_POST['containerName'])) {
    // Include your database connection file
    include 'connection.php';

    // Escape containerName to prevent SQL injection
    $containerName = mysqli_real_escape_string($conn, $_POST['containerName']);

    // Insert container record into the database
    $sql = "INSERT INTO container (container_name, created_time) VALUES ('$containerName', NOW())";
    if (mysqli_query($conn, $sql)) {
        // Retrieve the container_id of the inserted record
        $containerId = mysqli_insert_id($conn);

        // Return the container_id as JSON response
        echo json_encode(array('container_id' => $containerId));
    } else {
        // Return error message if insertion fails
        echo json_encode(array('error' => 'Error: ' . mysqli_error($conn)));
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Return error message if containerName is not set or empty
    echo json_encode(array('error' => 'Container name is required.'));
}
?>
