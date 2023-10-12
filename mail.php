<?php
$to = "elavarasan5193@gmail.com";
$subject = "Hello, World!";
$message = "This is a test email sent from PHP.";
$headers = "From: elavarasan@gmail.com\r\n";
$headers .= "Reply-To: sender@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully.";
} else {
    echo "Email could not be sent.";
}
?>
