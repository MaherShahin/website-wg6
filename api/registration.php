<?php
include '../config/db.php';
include '../utils/validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $postData = json_decode(file_get_contents('php://input'), true);

    if (!validateRequiredFields($postData)) {
        // Send an error response
        $response = array(
            'success' => false,
            'message' => 'First and last name are required',
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO players (first_name, last_name, nickname, phone_number) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssss',
        $postData['firstName'],
        $postData['lastName'],
        $postData['nickname'],
        $postData['phoneNumber']
    );

    if ($stmt->execute()) {
        // Send a success response
        $response = array(
            'success' => true,
            'message' => 'Registration successful',
        );
    } else {
        // Send an error response
        $response = array(
            'success' => false,
            'message' => 'Error: ' . $stmt->error,
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Send an error response
    $response = array(
        'success' => false,
        'message' => 'Invalid request method',
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}
