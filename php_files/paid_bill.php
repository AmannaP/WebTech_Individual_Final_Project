<?php
// Include the connection file
include 'conn.php';

// Check if the form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $bill_category = $_POST['billCategory'];
    $service_provider = $_POST['serviceProvider'];
    $customer_account_number = $_POST['customerID'];
    $bill_amount = $_POST['billAmount'];
    $payment_method = $_POST['paymentMethod'];

    // Validate the inputs (basic validation)
    if (empty($bill_category) || empty($service_provider) || empty($customer_account_number) || empty($bill_amount) || empty($payment_method)) {
        die("All fields are required.");
    }

    // Prepare the SQL query to insert data securely
    $stmt = $conn->prepare("INSERT INTO billpayments (bill_category, service_provider, customer_account_number, bill_amount, payment_method) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $bill_category, $service_provider, $customer_account_number, $bill_amount, $payment_method);

    // Execute the query
    if ($stmt->execute()) {
        echo "Bill payment details have been saved successfully.";
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
