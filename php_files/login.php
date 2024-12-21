<?php
// Start session
session_start();

require_once 'conn.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $inputemail = $_POST['email'];
    $inputPassword = $_POST['password'];

    // Prevent SQL injection
    $inputemail = $conn->real_escape_string($inputemail);
    $inputPassword = $conn->real_escape_string($inputPassword);

    // Query to check user credentials
    $sql = "SELECT * FROM users WHERE email = '$inputemail'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Check if user is an admin
        if ($user['role'] === 'admin') {
            $_SESSION['user_id'] = $user['user_id']; // Store session data
            header("Location: ../back_end/admin_dashboard.php"); // Redirect to admin dashboard
            exit();
        }

        // Verify password for customer
        if (password_verify($inputPassword, $user['password'])) { // Assumes password is hashed
            $_SESSION['user_id'] = $user['user_id']; // Store session data
            header("Location: ../back_end/dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $conn->close();
} else {
    // Invalid request method
    header("Location: ../back_end/login.php");
    exit();
}
?>