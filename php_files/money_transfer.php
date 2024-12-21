<?php
// Note: This is a simulation and would require actual bank integration in a real scenario

// Allow cross-origin requests (for development)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Simulated database connection
require_once 'conn.php';

function logTransfer($data) {
    // In a real scenario, this would log to a secure database
    $logFile = 'transfer_logs.txt';
    $logMessage = date('Y-m-d H:i:s') . " | " . 
                  "Transaction ID: {$data['transactionId']} | " . 
                  "Sender: {$data['senderCountry']} | " . 
                  "Receiver: {$data['receiverCountry']} | " . 
                  "Amount: {$data['amount']}\n";
    
    file_put_contents($logFile, $logMessage, FILE_APPEND);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receive JSON data
    $inputJSON = file_get_contents('php://input');
    $inputData = json_decode($inputJSON, true);

    // Validate input (basic example)
    if (isset($inputData['transactionId'])) {
        // Log the transfer
        logTransfer($inputData);

        // Simulate transfer processing
        $response = [
            'status' => 'success',
            'message' => 'Transfer processed successfully',
            'transactionId' => $inputData['transactionId']
        ];

        echo json_encode($response);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid transfer data']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}

?>