<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Script accessed directly without form submission
    $response = array('message' => 'Invalid request.');
    echo json_encode($response);
    exit;
}

// Get form data
$u_name = $_POST['u_name'];
$u_email = $_POST['u_email'];
$phone = $_POST['phone'];
$message1 = $_POST['message1'];
$subject = 'Enquiry Form the Website';

// Set up email content with HTML line breaks
$message = "Name: $u_name<br>Email: $u_email<br>Phone Number: $phone<br>Subject: $subject<br>Message: $message1";

ini_set('display_errors', 1);
error_reporting(E_ALL);
$from = "test@urovisionclinic.net";
$to = "urovisionclinic2015@gmail.com";
$subject = "Enquiry Form the Website";

$replyTo = $u_email;

$headers = "From: $from\r\n";
$headers .= "Reply-To: $replyTo\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";

if (mail($to, $subject, $message, $headers)) {
    // Email sent successfully
    $response = array('message' => 'Email sent successfully!');
    echo json_encode($response);
} else {
    // Failed to send email
    $response = array('message' => 'Failed to send email.');
    echo json_encode($response);
    echo "Error: " . error_get_last()['message'];
}
?>
