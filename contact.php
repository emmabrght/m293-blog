<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/vendor/phpmailer/phpmailer/src/Exception.php';
require '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '/vendor/phpmailer/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $topic = $_POST['topic'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'emy.spammacc@gmail.com';
        $mail->Password = 'gmfulmynwlyqqpis';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('YOUR_EMAIL_ADDRESS');

        $mail->isHTML(false);
        $mail->Subject = 'Contact Form Submission: ' . $topic;
        $mail->Body = "Name: $name\n\nEmail: $email\n\nTopic: $topic\n\nMessage: $message";

        $mail->send();

        echo 'Thank you for contacting us. We will get back to you soon!';
    } catch (Exception $e) {
        echo 'Message could not be sent. Error: ', $mail->ErrorInfo;
    }
}
?>
