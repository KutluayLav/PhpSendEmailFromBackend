<?php
require 'mail.php';

function sanitizeInput($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    throw new Exception('Invalid request method');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $decodedData = json_decode($data, true);

    if ($decodedData === null) {
        throw new Exception('Invalid JSON data');
    }

    $name = sanitizeInput($decodedData['name']);
    $email = sanitizeInput($decodedData['email']);
    $subject = sanitizeInput($decodedData['subject']);
    $message = sanitizeInput($decodedData['message']);

    $mail->setFrom($email, 'Kutluay ulutas');
    $mail->Subject = EMAIL_SUBJECT_CONTACT;

    $htmlTemplate = file_get_contents(EMAIL_TEMPLATE_CONTACT_PATH);

    $placeholders = array(
        '{{name}}' => $name,
        '{{email}}' => $email,
        '{{subject}}' => $subject,
        '{{message}}' => $message
    );

    $html = strtr($htmlTemplate, $placeholders);

    $mail->Body = $html;

    if ($mail->send()) {
        http_response_code(200);
        header("Content-Type: application/json");
    } else {
        http_response_code(500);
        header("Content-Type: application/json");
    }
} else {
    http_response_code(405);
    $response = ['error' => 'Method not allowed. Only POST requests are accepted.'];
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>