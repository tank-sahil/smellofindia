<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/PHPMailer.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\SMTP.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\Exception.php');


$con = new mysqli("localhost", "root", "", "soi");
$sr = $_REQUEST['sr'];
echo $sr;
$sel = "select * from book where sr='$sr'";
$res = $con->query($sel);
$row = $res->fetch_assoc();

$name = $row['name'];
$email = $row['mail'];
$date = $row['date'];
$time = $row['time'];
$phone = $row['phone'];
echo "$name AND $email AND $date AND $time AND $phone";
// $insert = "insert into acc"
$in = "INSERT INTO `acc_book`(`name`, `mail`, `date`, `time`, `phone`) VALUES ('$name','$email','$date','$time','$phone')";

if ($con->query($in)) {
    $mail = new PHPMailer();

    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'stank729@rku.ac.in'; // SMTP username//sender mail id
    $mail->Password = "UPDATE PASSWORD OF RKU ACCOUNT IS 94.25"; // SMTP password // sender mail id password
    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to
    // $mail->SMTPDebug = 2;

    // Recipients
    $mail->setFrom('stank729@rku.ac.in', 'Smell Of The India !'); // Sender's email address and name
    $mail->addAddress($email); // Recipient's email address and name

    // Attachments
    //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Table Confirmation';
    $mail->Body    = "<h2>Congratulation , $name <br> Your Table has been Booked,Please Come and enjoy Your Food.</h2>";
    $mail->send();

    $del = "DELETE FROM `book` WHERE sr='$sr'";
    $con->query($del);
    ?>
    <script>
        window.location.href = "bookhistory.php";
    </script>
<?php
}
