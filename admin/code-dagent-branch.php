<?php
include('../connection.php');

// Insert Agent

if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Check if any required field is empty
    $required_fields = ['dabaddress', 'dabcity', 'dabphone', 'dabfax', 'dabemail', 'dabstatus'];
    $empty_fields = array_filter($required_fields, function($field) {
        return empty($_POST[$field]);
    });

    if (!empty($empty_fields)) {
        echo "Please fill in all required fields.";
    } else {
        // Proceed with data processing
        // Retrieve POST data
        $delivery_agent_ids = $_POST['delivery_agent_id'];
        $addresses = $_POST['dabaddress'];
        $cities = $_POST['dabcity'];
        $phones = $_POST['dabphone'];
        $faxes = $_POST['dabfax'];
        $emails = $_POST['dabemail'];
        $statuses = $_POST['dabstatus'];
        
        // Initialize an empty array to store checkbox values
        $head_ofs = isset($_POST['dabhead_of']) ? $_POST['dabhead_of'] : array(); // Checkbox value
        
        // Loop through each set of address data
        foreach($addresses as $key => $address){
            // Retrieve other corresponding data
            $delivery_agent_id = mysqli_real_escape_string($conn, $delivery_agent_ids[$key]);
            $city = mysqli_real_escape_string($conn, $cities[$key]);
            $phone = mysqli_real_escape_string($conn, $phones[$key]);
            $fax = mysqli_real_escape_string($conn, $faxes[$key]);
            $email = mysqli_real_escape_string($conn, $emails[$key]);
            $status = mysqli_real_escape_string($conn, $statuses[$key]);
            $head_of = mysqli_real_escape_string($conn, $head_ofs[$key]);
            
            // Check if the current checkbox is checked
            $head_office_selected = ($head_of === 'head_office');

            // Check if a head office is already selected for the agent in the database
            $query_check_head_office = "SELECT * FROM delivery_agent_branch WHERE delivery_agent_id = '$delivery_agent_id' AND dabhead_of = 'head_office'";
            $result_check_head_office = mysqli_query($conn, $query_check_head_office);

            if (mysqli_num_rows($result_check_head_office) > 0 && $head_office_selected) {
                // Head office already selected for this agent in the database, show alert or handle as per your requirements
                echo "Alert: Head office already selected for agent";
            } else {
                // Insert query
                $sql = "INSERT INTO delivery_agent_branch (delivery_agent_id, dabaddress, dabcity, dabphone, dabfax, dabemail, dabstatus, dabhead_of) 
                        VALUES ('$delivery_agent_id', '$address', '$city', '$phone', '$fax', '$email', '$status', '$head_of')";
                
                if ($conn->query($sql) !== TRUE) {
                    echo "Error inserting record for address: $address<br>";
                }
            }
        }
        echo "All records updated successfully";
    }
}











// Fetch Agents
if(isset($_POST['action']) && $_POST['action'] == 'fetch'){
    // Fetch agents from database
    $sql = "SELECT * FROM delivery_agent_branch";
    $result = $conn->query($sql);

    $rows = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
    }

    echo json_encode($rows);
}

// Edit Agent
if (isset($_POST['action']) && $_POST['action'] == 'edit') {
    // Retrieve delivery_agent_id from POST data
    $delivery_agent_id = $_POST['delivery_agent_id'];

    // Prepare and execute SQL query to fetch agent data based on delivery_agent_id
    $query = "SELECT * FROM delivery_agent_branch WHERE delivery_agent_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $delivery_agent_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Initialize an array to store fetched data
    $data = array();

    // Check if there are any results
    if ($result) {
        // Loop through each row and store it in the $data array
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        // Encode the data array to JSON format and echo it
        echo json_encode($data);
    } else {
        // If no data is found, echo an error message
        echo json_encode(["error" => "Failed to fetch data"]);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}


if(isset($_POST['action']) && $_POST['action'] == 'update'){
    // Retrieve POST data
    $delivery_agent_bids = $_POST['delivery_agent_bid'];
    $addresses = $_POST['edabaddress'];
    $cities = $_POST['edabcity'];
    $phones = $_POST['edabphone'];
    $faxes = $_POST['edabfax'];
    $emails = $_POST['edabemail'];
    $statuses = $_POST['edabstatus'];
    $head_ofs = $_POST['edabhead_of'];

    // Initialize flag for update status
    $update_success = true;

    // Loop through each set of address data
    foreach($delivery_agent_bids as $key => $delivery_agent_bid){
        // Retrieve other corresponding data
        $address = mysqli_real_escape_string($conn, $addresses[$key]);
        $city = mysqli_real_escape_string($conn, $cities[$key]);
        $phone = mysqli_real_escape_string($conn, $phones[$key]);
        $fax = mysqli_real_escape_string($conn, $faxes[$key]);
        $email = mysqli_real_escape_string($conn, $emails[$key]);
        $status = mysqli_real_escape_string($conn, $statuses[$key]);
        $head_of = mysqli_real_escape_string($conn, $head_ofs[$key]);

        // Check if the current checkbox is checked
        $head_office_selected = ($head_of === 'head_office');

        // Check if a head office is already selected for the agent in the database
        $query_check_head_office = "SELECT * FROM delivery_agent_branch WHERE delivery_agent_bid != '$delivery_agent_bid' AND delivery_agent_id = (SELECT delivery_agent_id FROM delivery_agent_branch WHERE delivery_agent_bid = '$delivery_agent_bid') AND dabhead_of = 'head_office'";
        $result_check_head_office = mysqli_query($conn, $query_check_head_office);

        if (mysqli_num_rows($result_check_head_office) > 0 && $head_office_selected) {
            // Head office already selected for this agent in the database, show alert or handle as per your requirements
            echo "Head office already selected for agent";
            // Update flag for update status
            $update_success = false;
        } else {
            // Update query
            $sql = "UPDATE delivery_agent_branch 
                    SET dabaddress='$address', dabcity='$city', dabphone='$phone', dabfax='$fax', dabemail='$email', dabstatus='$status', dabhead_of='$head_of' 
                    WHERE delivery_agent_bid='$delivery_agent_bid'";

            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record for address ID: $delivery_agent_bid<br>";
                // Update flag for update status
                $update_success = false;
            }
        }
    }
    // Echo message if all records updated successfully
    if ($update_success) {
        echo "All records updated successfully";
    }
}




// Delete Agent
// Check if the action is set to 'delete'
if(isset($_POST['action']) && $_POST['action'] === 'delete') {
    // Retrieve the delivery_agent_id from the POST data
    $delivery_agent_bid = $_POST['delivery_agent_bid'];

    // Prepare and execute SQL query to delete the agent data
    $query = "DELETE FROM delivery_agent_branch WHERE delivery_agent_bid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $delivery_agent_bid);

    // Check if the deletion was successful
    if(mysqli_stmt_execute($stmt)) {
        // Return a success message if deletion was successful
        echo json_encode(["success" => "Agent data deleted successfully"]);
    } else {
        // Return an error message if deletion failed
        echo json_encode(["error" => "Failed to delete agent data"]);
    }

    // Close the prepared statement
    mysqli_stmt_close($stmt);
}

$conn->close();
?>
