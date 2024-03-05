<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer library
require 'C:/Users/Ckostopoulos/Documents/Wooden Suites/Website/Temp01/PHPMailer/src/Exception.php';
require 'C:/Users/Ckostopoulos/Documents/Wooden Suites/Website/Temp01/PHPMailer/src/PHPMailer.php';
require 'C:/Users/Ckostopoulos/Documents/Wooden Suites/Website/Temp01/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // PHPMailer configuration
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'contactwoodensuites@gmail.com';
        $mail->Password = 'vbmwjlyjlghxjjxi';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('contactwoodensuites@gmail.com'); // Add a recipient

        // Content
        $mail->isHTML(false); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";

        $mail->send();
        echo 'Thank you! Your message has been sent.';
    } catch (Exception $e) {
        echo "Something went wrong. Please try again. {$mail->ErrorInfo}";
    }
}
?>
