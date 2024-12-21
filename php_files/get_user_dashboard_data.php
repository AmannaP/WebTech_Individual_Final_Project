<?php
session_start();
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once 'conn.php';

try {
    if (!isset($_SESSION['user_id'])) {
        http_response_code(403);
        echo json_encode(["error" => "User not logged in"]);
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $userQuery = "SELECT FirstName, LastName, Email, Address, Country, PhoneNumber, DateOfBirth FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($userQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $userResult = $stmt->get_result();
    echo $userResult;

    if ($userResult && $userResult->num_rows > 0) {
        $userData = $userResult->fetch_assoc();
    } else {
        $userData = null;
    }

    $balancesQuery = "SELECT currency, balance FROM user_balances WHERE user_id = ?";
    $stmt = $conn->prepare($balancesQuery);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $balancesResult = $stmt->get_result();

    $userBalances = [];
    if ($balancesResult && $balancesResult->num_rows > 0) {
        while ($row = $balancesResult->fetch_assoc()) {
            $userBalances[$row['currency']] = $row['balance'];
        }
    }

    $response = [
        "userData" => $userData,
        "userBalances" => $userBalances
    ];

    echo json_encode($response);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["error" => "Server error: " . $e->getMessage()]);
} finally {
    $conn->close();
}
?>
