

<?php
// Define the recipient email address
$to = "shriyankabhandari@gmail.com";

// Define the subject of the email
$subject = "Test Email using PHP mail()";

// Define the message body
$message = "Hello,\n\nThis is a test email sent using PHP's built-in mail() function.";

// Define additional headers (optional)
$headers = "From: s.saroj0048@gmail.com\r\n";
$headers .= "Reply-To: s.saroj0048@gmail.com\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Send the email
if (mail($to, $subject, $message, $headers)) {
    echo "Email sent successfully to $to.";
} else {
    echo "Failed to send email.";
}
?>
