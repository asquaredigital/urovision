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
$service = $_POST['service'];
$adate = $_POST['adate'];
$atime = $_POST['atime'];
$message = $_POST['message'];

// Set up email headers
// Set up email headers
$headers = "From: urovisionclinic.net" . "\r\n" .
           "Reply-To: $u_email" . "\r\n" ;

// Set up email content
$subject = 'Patient Enquiry Form the Website';
$message = "Name: $u_name\nEmail: $u_email\nPhone: $phone\nService: $service\nAppointment Date: $adate\nAppointment Time: $atime\nMessage: $message\n";
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (mail('elavarasan5193@gmail.com', $subject, $message, $headers)) {
    // Email sent successfully
    $response = array('message' => 'Appointment Request Sent successfully!');
    echo json_encode($response);
} else {
    // Failed to send email
    $response = array('message' => 'Failed to send email.');
    echo json_encode($response);
    echo "Error: " . error_get_last()['message'];
}
?>

