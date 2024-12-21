<?php
// Include the database connection
require_once 'conn.php'; // Ensure the path is correct relative to this file

if (isset($_POST['submit'])) {
    // Sanitize and get form data
    $FirstName = mysqli_real_escape_string($conn, $_POST['FirstName']);
    $LastName = mysqli_real_escape_string($conn, $_POST['LastName']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $phone = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $country = mysqli_real_escape_string($conn, $_POST['Country']);
    $dob = mysqli_real_escape_string($conn, $_POST['DateOfBirth']);
    $password = $_POST['password'];

    // Hash the password before saving it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Set default role
    $role = 'customer'; 

    // Insert query
    $sql = "INSERT INTO users (FirstName, LastName, Email, PhoneNumber, Address, Country, password, role, DateOfBirth) 
            VALUES ('$FirstName', '$LastName', '$Email', '$phone', '$address', '$country', '$hashed_password', '$role', '$dob')";

if ($conn->query($sql) === TRUE) {
    // Get the user_id of the newly inserted user
    $user_id = $conn->insert_id;

    // Insert query for user_balances table
    $balance_sql = "INSERT INTO user_balances (user_id, currency, balance) 
                    VALUES ('$user_id', 'USD', 100.0)";
    
    if ($conn->query($balance_sql) === TRUE) {
        // Redirect to login.html
        header("Location: ../back_end/login.html");
        exit(); // Always include exit() after a header redirect
    } else {
        echo "Error: " . $balance_sql . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
}
?>