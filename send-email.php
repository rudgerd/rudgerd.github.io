<?php
// Check for empty fields
if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
    echo "Please fill out all the fields.";
    exit;
}

// Sanitize input data
$name = htmlspecialchars($_POST['name']);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$message = htmlspecialchars($_POST['message']);

// Validate email address
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid email address.";
    exit;
}

// Set up email headers and message
$to = "rhdame@gmail.com"; // Replace with your email address
$subject = "New message from website";
$headers = "From: $name <$email>\r\n";
$message = "Name: $name\nEmail: $email\nMessage: $message";

// Send the email
if(mail($to, $subject, $message, $headers)) {
    echo "Thank you for your message. We will get back to you soon.";
} else {
    echo "Oops! Something went wrong. Please try again later.";
}
?>
