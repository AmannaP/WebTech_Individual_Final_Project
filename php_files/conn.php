<?php
//verified
// Purpose: This file establishes a connection to the database

$servername = "localhost"; //"http://169.239.251.102/";
$username = "root"; // Default MySQL username
$password = ""; //69606617";     // Default MySQL password for XAMPP
$dbname = "minto_forex_bureau";// webtech_fall2024_chika_amanna"; // Name of my database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
