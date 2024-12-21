<?php
// Include the database connection
require_once 'conn.php'; // Ensure the path is correct relative to this file

// Check if a category is provided
if (isset($_GET['category'])) {
    $category = $conn->real_escape_string($_GET['category']); // Sanitize input

    // SQL query to fetch service providers based on the selected category
    $sql = "SELECT provider FROM billpaymentproviders WHERE category = '$category' ORDER BY provider";
    $result = $conn->query($sql);

    $serviceProviders = [];

    // Fetch data and store it in an array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $serviceProviders[] = $row;
        }
    }

    // Output data as JSON
    echo json_encode($serviceProviders);
} else {
    // If no category is provided, return an error message
    echo json_encode(['error' => 'No category selected']);
}

// Close connection
$conn->close();
?>
