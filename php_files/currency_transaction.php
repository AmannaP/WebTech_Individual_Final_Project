<?php
// Include the database connection file
require_once 'conn.php';

// Function to fetch all rows from the database
function fetchData($conn) {
    $query = "SELECT * FROM currencytransactions ORDER BY currency_transaction_id ASC";
    $result = $conn->query($query);

    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// Handle Add, Edit, and Delete Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Determine the action
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Add a new row
    if ($action === 'add') {
        $first_name = $conn->real_escape_string($_POST['FirstName']);
        $last_name = $conn->real_escape_string($_POST['LastName']);
        $country = $conn->real_escape_string($_POST['country']);
        $currency = $conn->real_escape_string($_POST['currency']);
        $amount = floatval($_POST['amount']);

        $query = "INSERT INTO currencytransactions (FirstName, LastName, country, currency, amount) 
                  VALUES ('$first_name', '$last_name', '$country', '$currency', $amount)";
        
        $result = $conn->query($query);
        
        // Send back a JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'success' => $result ? true : false,
            'message' => $result ? 'Row added successfully' : 'Failed to add row',
            'error' => $conn->error
        ]);
        exit;
    }

    // Edit a row
    if ($action === 'edit') {
        $id = intval($_POST['currency_transaction_id']);
        $first_name = $conn->real_escape_string($_POST['FirstName']);
        $last_name = $conn->real_escape_string($_POST['LastName']);
        $country = $conn->real_escape_string($_POST['country']);
        $currency = $conn->real_escape_string($_POST['currency']);
        $amount = floatval($_POST['amount']);

        $query = "UPDATE currencytransactions 
                  SET FirstName='$first_name', LastName='$last_name', country='$country', currency='$currency', amount=$amount 
                  WHERE currency_transaction_id=$id";
        
        $result = $conn->query($query);
        
        // Send back a JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'success' => $result ? true : false,
            'message' => $result ? 'Row updated successfully' : 'Failed to update row',
            'error' => $conn->error
        ]);
        exit;
    }

    // Delete a row
    if ($action === 'delete') {
        $id = intval($_POST['currency_transaction_id']);
        $query = "DELETE FROM currencytransactions WHERE currency_transaction_id=$id";
        
        $result = $conn->query($query);
        
        // Send back a JSON response
        header('Content-Type: application/json');
        echo json_encode([
            'success' => $result ? true : false,
            'message' => $result ? 'Row deleted successfully' : 'Failed to delete row',
            'error' => $conn->error
        ]);
        exit;
    }

    // If fetch action is used
    if ($action === 'fetch') {
        // Fetch and return data
        $data = fetchData($conn);

        // Return data as JSON (for frontend use)
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

// If no specific action is set, fetch all data
$data = fetchData($conn);

// Return data as JSON (for frontend use)
header('Content-Type: application/json');
echo json_encode($data);

// Close the connection
$conn->close();
?>