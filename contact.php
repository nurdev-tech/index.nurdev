<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Validate the inputs
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Here you can process the data, such as sending an email or saving to a database.
        
        // Example: Send an email to the admin
        $to = "viltia40@gmail.com";  // Replace with your email
        $subject = "New message from contact form";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        // Sending the email
        if (mail($to, $subject, $body, $headers)) {
            echo "<p>Сообщение успешно отправлено!</p>";
        } else {
            echo "<p>Ошибка при отправке сообщения. Попробуйте еще раз.</p>";
        }
    } else {
        echo "<p>Пожалуйста, заполните все поля.</p>";
    }
}
?>
