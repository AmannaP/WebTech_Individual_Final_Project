<?php
// Include the database connection file
include 'conn.php';

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_POST['user_id']; // ID of the sender
    $recipient_email = $_POST['recipient_email'];
    $recipient_phone = $_POST['recipient_phone'];
    $recipient_name = $_POST['recipient_name'];
    $recipient_country = $_POST['recipient_country'];
    $recipient_bank = $_POST['recipient_bank'];
    $amount = $_POST['amount'];

    // Basic validation
    if (empty($user_id) || empty($recipient_email) || empty($recipient_phone) || empty($recipient_name) || 
        empty($recipient_country) || empty($recipient_bank) || empty($amount)) {
        die("All fields are required.");
    }

    // Validate that user_id is numeric and amount is numeric and positive
    if (!is_numeric($user_id) || !is_numeric($amount) || $amount <= 0) {
        die("User ID must be numeric, and amount must be a positive number.");
    }

    // Prepare the SQL query to insert data securely
    $stmt = $conn->prepare("INSERT INTO MoneyTransfers (user_id, recipient_email, recipient_phone, recipient_name, recipient_country, recipient_bank, amount) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssd", $user_id, $recipient_email, $recipient_phone, $recipient_name, $recipient_country, $recipient_bank, $amount);

    // Execute the query
    if ($stmt->execute()) {
        echo "Money transfer details have been saved successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
