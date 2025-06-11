<!DOCTYPE html>
<html>
<head>
    <title>Send Email using PHP</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label>Your Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Your Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Message:</label><br>
        <textarea name="message" required></textarea><br><br>

        <input type="submit" value="Send Email">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "shree@gmail.com";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = wordwrap($_POST['message'], 70);

    $subject = "Message from Contact Form";
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Sending email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
} else {
    echo "Invalid Request";
}
?>
