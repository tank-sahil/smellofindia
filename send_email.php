<?php
include('admin_session.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/PHPMailer.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\SMTP.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\Exception.php');
$mail = new PHPMailer();
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'stank729@rku.ac.in'; // SMTP username//sender mail id
            $mail->Password = "UPDATE PASSWORD OF RKU ACCOUNT IS 94.25"; // SMTP password // sender mail id password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to
            // $mail->SMTPDebug = 2;

            // Recipients
            $mail->setFrom('stank729@rku.ac.in','Sahil Tank'); // Sender's email address and name
            $mail->addAddress('kukadiyanisha@gmail.com','Nisha'); // Recipient's email address and name

            // Attachments
            //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Mail Subject';
            $mail->Body    = 'Mail Body';

            // Send the email
            $mail->send();
        } catch (Exception $e) {
            echo "Email sending failed. Error: {$mail->ErrorInfo}";
        }