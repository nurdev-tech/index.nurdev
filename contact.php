<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message)) {
        // PHPMailer setup
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.yourmailprovider.com';  // Set the SMTP server to use
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@example.com';  // SMTP username
            $mail->Password = 'your-email-password';     // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('viltia40@gmail.com', 'NurDev Tech');
            $mail->addAddress('viltia40@gmail.com', 'Admin');  // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Message from Contact Form';
            $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<p>Пожалуйста, заполните все поля.</p>";
    }
}
?>
