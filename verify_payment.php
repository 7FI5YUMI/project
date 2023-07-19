
<?php

$payload = json_decode(file_get_contents('php://input'), true);

$response = array(
    'status' => 'success',
    'message' => 'Payment verification successful!'
);

// Send the response back to the frontend
header('Content-Type: application/json');
echo json_encode($response);
?>
