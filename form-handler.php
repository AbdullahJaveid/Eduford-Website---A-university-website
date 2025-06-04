<?php
// Sanitize input data
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$visitor_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

// Validate email
if (!filter_var($visitor_email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email address');
}

$email_from = 'mabdullahjaved203@gmail.com';  // Your email
$email_subject = 'New Form Submission';

// Construct the email body 
$email_body = "User Name: $name.\n".
              "User Email: $visitor_email.\n".
              "Subject: $subject.\n".
              "User Message: $message.\n";

// Recipient email address
$to = ' Recipient email address';

// Headers
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8 \r\n";

// Send the email and check if successful
if (mail($to, $email_subject, $email_body, $headers)) {
    header("Location: contact.html");  // Redirect on success
    exit();
} else {
    echo "Error: Message not sent.";
}
?>
