<?php
session_start();
require_once 'conn.php';

// Check if the user is logged in (assuming session contains 'user_id')
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

$user_id = $_SESSION['user_id']; // Get logged-in user's ID

// Prepare SQL to fetch user details
$stmt = $conn->prepare("SELECT FirstName, LastName, Email, PhoneNumber, Address, Country, DateOfBirth FROM Users WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo json_encode($user); // Send user details as JSON
} else {
    echo json_encode(["error" => "User not found"]);
}

// Close connection
$stmt->close();
$conn->close();
?>
