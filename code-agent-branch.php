<?php
include('connection.php');

// Insert Agent

if(isset($_POST['action']) && $_POST['action'] == 'insert'){
    // Check if any required field is empty
    $required_fields = ['address', 'city', 'country', 'phone', 'fax', 'email', 'status'];
    $empty_fields = array_filter($required_fields, function($field) {
        return empty($_POST[$field]);
    });

    if (!empty($empty_fields)) {
        echo "Please fill in all required fields.";
    } else {
        // Proceed with data processing
        // Retrieve POST data
        $agent_id_fks = $_POST['agent_id'];
        $addresses = $_POST['address'];
        $cities = $_POST['city'];
        $countries = $_POST['country'];
        $phones = $_POST['phone'];
        $faxes = $_POST['fax'];
        $emails = $_POST['email'];
        $statuses = $_POST['status'];
        
        // Initialize an empty array to store checkbox values
        $head_ofs = isset($_POST['head_of']) ? $_POST['head_of'] : array(); // Checkbox value
        
        // Loop through each set of address data
        foreach($addresses as $key => $address){
            // Retrieve other corresponding data
            $agent_id_fk = mysqli_real_escape_string($conn, $agent_id_fks[$key]);
            $city = mysqli_real_escape_string($conn, $cities[$key]);
            $country = mysqli_real_escape_string($conn, $countries[$key]);
            $phone = mysqli_real_escape_string($conn, $phones[$key]);
            $fax = mysqli_real_escape_string($conn, $faxes[$key]);
            $email = mysqli_real_escape_string($conn, $emails[$key]);
            $status = mysqli_real_escape_string($conn, $statuses[$key]);
            $head_of = mysqli_real_escape_string($conn, $head_ofs[$key]);
            
            // Check if the current checkbox is checked
            $head_office_selected = ($head_of === 'head_office');

            // Check if a head office is already selected for the agent in the database
            $query_check_head_office = "SELECT * FROM agents_address WHERE agent_id_fk = '$agent_id_fk' AND head_of = 'head_office'";
            $result_check_head_office = mysqli_query($conn, $query_check_head_office);

            if (mysqli_num_rows($result_check_head_office) > 0 && $head_office_selected) {
                // Head office already selected for this agent in the database, show alert or handle as per your requirements
                echo "Alert: Head office already selected for agent";
            } else {
                // Insert query
                $sql = "INSERT INTO agents_address (agent_id_fk, address, city, country, phone, fax, email, status, head_of) 
                        VALUES ('$agent_id_fk', '$address', '$city', '$country', '$phone', '$fax', '$email', '$status', '$head_of')";
                
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
    $sql = "SELECT * FROM agent";
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
    // Retrieve agent_id from POST data
    $agent_id = $_POST['agent_id'];

    // Prepare and execute SQL query to fetch agent data based on agent_id
    $query = "SELECT * FROM agents_address WHERE agent_id_fk = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $agent_id);
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
    $agent_address_ids = $_POST['agent_address_id'];
    $addresses = $_POST['eaddress'];
    $cities = $_POST['ecity'];
    $countries = $_POST['ecountry'];
    $phones = $_POST['ephone'];
    $faxes = $_POST['efax'];
    $emails = $_POST['eemail'];
    $statuses = $_POST['estatus'];
    $head_ofs = $_POST['ehead_of'];

    // Initialize flag for update status
    $update_success = true;

    // Loop through each set of address data
    foreach($agent_address_ids as $key => $agent_address_id){
        // Retrieve other corresponding data
        $address = mysqli_real_escape_string($conn, $addresses[$key]);
        $city = mysqli_real_escape_string($conn, $cities[$key]);
        $country = mysqli_real_escape_string($conn, $countries[$key]);
        $phone = mysqli_real_escape_string($conn, $phones[$key]);
        $fax = mysqli_real_escape_string($conn, $faxes[$key]);
        $email = mysqli_real_escape_string($conn, $emails[$key]);
        $status = mysqli_real_escape_string($conn, $statuses[$key]);
        $head_of = mysqli_real_escape_string($conn, $head_ofs[$key]);

        // Check if the current checkbox is checked
        $head_office_selected = ($head_of === 'head_office');

        // Check if a head office is already selected for the agent in the database
        $query_check_head_office = "SELECT * FROM agents_address WHERE agent_address_id != '$agent_address_id' AND agent_id_fk = (SELECT agent_id_fk FROM agents_address WHERE agent_address_id = '$agent_address_id') AND head_of = 'head_office'";
        $result_check_head_office = mysqli_query($conn, $query_check_head_office);

        if (mysqli_num_rows($result_check_head_office) > 0 && $head_office_selected) {
            // Head office already selected for this agent in the database, show alert or handle as per your requirements
            echo "Head office already selected for agent";
            // Update flag for update status
            $update_success = false;
        } else {
            // Update query
            $sql = "UPDATE agents_address 
                    SET address='$address', city='$city', country='$country', phone='$phone', fax='$fax', email='$email', status='$status', head_of='$head_of' 
                    WHERE agent_address_id='$agent_address_id'";

            if ($conn->query($sql) !== TRUE) {
                echo "Error updating record for address ID: $agent_address_id<br>";
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
    // Retrieve the agent_id from the POST data
    $agent_address_id = $_POST['agent_address_id'];

    // Prepare and execute SQL query to delete the agent data
    $query = "DELETE FROM agents_address WHERE agent_address_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $agent_address_id);

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
