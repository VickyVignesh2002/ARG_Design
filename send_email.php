<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $number = htmlspecialchars($_POST['mn']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "info@argdesign.in";
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Email subject and body
    $email_subject = "New message from your website: " . $subject;
    $email_body = "<h2>New message from the contact form</h2>";
    $email_body .= "<p><strong>Name:</strong> {$name}</p>";
    $email_body .= "<p><strong>Email:</strong> {$email}</p>";
    $email_body .= "<p><strong>Subject:</strong> {$subject}</p>";
    $email_body .= "<p><strong>Number:</strong> {$number}</p>";
    $email_body .= "<p><strong>Message:</strong><br>{$message}</p>";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('Message sent successfully!');</script>";
        echo "<script>window.location.href = 'contact.html';</script>";
    } else {
        echo "<script>alert('Failed to send the message.');</script>";
    }
} else {
    echo "<script>alert('Invalid request.');</script>";
}
?>
