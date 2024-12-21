<?php
// logout.php
require_once 'conn.php';

// Destroy all session variables
session_unset();
session_destroy();

// Return JSON response
header("Location: ../index.php");
echo json_encode([
    'status' => 'success',
    'message' => 'Logged out successfully'
]);
exit();