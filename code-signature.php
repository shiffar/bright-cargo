<?php
// Start the session
session_start();

// Include database connection file
include 'connection.php';
if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    $eid = $_POST['eid'];
    $name = $_POST['hname'];
    $dcimage = $_FILES['dcimage']['name'];
    $signature = $_POST['signatureDataURL'];
    
    // Sanitize and validate form data
    $getCompanyQuery = "SELECT company_id FROM hbl WHERE hbl_id = '$eid'";
        $companyResult = mysqli_query($conn, $getCompanyQuery);
        $row = mysqli_fetch_assoc($companyResult);
        $hbl_company_id = $row['company_id'];
        
        // Check if the retrieved company_id matches the session company_id
        if ($hbl_company_id) {
            // Move uploaded file to desired directory
            $uploadDirectory = 'uploads/'; // Change this to your desired directory
            $uploadedFile = $uploadDirectory . basename($_FILES['dcimage']['name']);
            move_uploaded_file($_FILES['dcimage']['tmp_name'], $uploadedFile);
            
            // Insert into complete_delivery table
            $insertQuery = "INSERT INTO complete_delivery (company_id, hbl_id_fk, name, image, signature, d_date) 
                            VALUES ('$hbl_company_id', '$eid', '$name', '$dcimage', '$signature', NOW())";
            
            // Execute insert query
            if (mysqli_query($conn, $insertQuery)) {
                // Update hbl_status table
                $updateQuery = "UPDATE hbl_status SET current_status = 'completed' WHERE hbl_id = '$eid'";
                mysqli_query($conn, $updateQuery);
    
                // Check if balance status is paid
                $balance_status = $_POST['balance_status'];
                if ($balance_status == 1) {
                    // Update hbl_balance table
                    $updateBalanceQuery = "UPDATE hbl_balance SET hbl_balance = 0, balance_status = 1 WHERE hbl_id = '$eid'";
                    mysqli_query($conn, $updateBalanceQuery);
                    
                    // Add balance to hbl amount
                    $updateHBLAmountQuery = "UPDATE hbl SET Amount = Amount + (SELECT hbl_balance FROM hbl_balance WHERE hbl_id = '$eid') WHERE hbl_id = '$eid'";
                    mysqli_query($conn, $updateHBLAmountQuery);
                }
                
                echo "Form submitted successfully!";
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }
    
    // Check if company_id is set
    
}

// Retrieve form data

if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    
        // Fetch locations from database
    $sql = "SELECT * FROM complete_delivery";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
    
    
}

if(isset($_POST['action']) && $_POST['action'] == 'sfetch'){
$sub_delivery_agent_id = $_SESSION['sub_delivery_agent_id'];
    // Fetch locations from database
$sql = "SELECT * FROM complete_delivery
LEFT JOIN hbl ON hbl.hbl_id = complete_delivery.hbl_id_fk
LEFT JOIN sub_delivery_agent ON sub_delivery_agent.sub_delivery_agent_id = hbl.sub_delivery_agent WHERE hbl.sub_delivery_agent = '$sub_delivery_agent_id'";
$result = $conn->query($sql);

$rows = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}

echo json_encode($rows);


}

if(isset($_POST['action']) && $_POST['action'] == 'edit'){
    $complete_delivery_id = $_POST['complete_delivery_id'];

    // Fetch delivery data from database
    $sql = "SELECT * FROM complete_delivery 
    LEFT JOIN hbl ON hbl.hbl_id = complete_delivery.hbl_id_fk
    LEFT JOIN companies on companies.company_id = hbl.company_id
    WHERE complete_delivery_id = '$complete_delivery_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Fetch signature image data
        $signatureDataURL = $row['signature'];
        
        // Create an associative array to hold data
        $data = array(
            'name' => $row['name'],
            'dcimage' => $row['image'],
            'signatureDataURL' => $signatureDataURL
            // Add other fields as needed
        );
    
        // Debug output
        echo json_encode($data);
    } else {
        echo "Delivery not found";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'view_bal'){
    // Retrieve POST data
    $hbl_id = $_POST['hbl_id'];

    // Fetch location from database
    $sql = "SELECT * FROM hbl
    LEFT JOIN hbl_balance ON hbl_balance.hbl_id = hbl.hbl_id
    LEFT JOIN companies ON companies.company_id = hbl.company_id
    WHERE hbl.hbl_id = '$hbl_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Location not found";
    }
}

if(isset($_POST['action']) && $_POST['action'] == 'update'){
    $complete_delivery_id = $_POST['complete_delivery_id'];
    $name = $_POST['ehname']; // Updated to match the form field name

    // Fetch old image filename
    $sql = "SELECT image FROM complete_delivery WHERE complete_delivery_id = '$complete_delivery_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $oldImage = $row['image'];

    // Handle image upload if a new image is provided
    $dcimage = $oldImage; // Default value
    if(isset($_FILES['edcimage']) && $_FILES['edcimage']['error'] === UPLOAD_ERR_OK) {
        // Delete old image if it exists
        if(!empty($oldImage)) {
            $oldImagePath = "uploads/" . $oldImage;
            if(file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }

        // Upload new image
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['edcimage']['name']);
        if(move_uploaded_file($_FILES['edcimage']['tmp_name'], $targetFile)) {
            $dcimage = basename($_FILES['edcimage']['name']);
        } else {
            echo "Error uploading image.";
            exit;
        }
    }

    // Handle signature update if a new signature is provided
    $signature = ''; // Default value
    if(isset($_POST['esignatureDataURL'])) {
        $signature = $_POST['esignatureDataURL'];
    }

    // Update delivery data in the database
    $sql = "UPDATE complete_delivery SET name = '$name'";
    if (!empty($dcimage)) {
        $sql .= ", image = '$dcimage'";
    }
    if (!empty($signature)) {
        $sql .= ", signature = '$signature'";
    }
    $sql .= " WHERE complete_delivery_id = '$complete_delivery_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Delivery updated successfully";
    } else {
        echo "Error updating delivery: " . $conn->error;
    }
}


?>
