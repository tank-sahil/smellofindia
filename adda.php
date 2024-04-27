<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/PHPMailer.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\SMTP.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\Exception.php');

include('sidebar.php');
include('admin_session.php');
?>
<div id="main1">
    <form method="post" enctype="multipart/form-data" id="form">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name Of New Admin ">
            <span id="mail-err"></span>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email I'd Of New Admin ">
            <span id="mail-err"></span>
        </div>

        <button class="submitbtnofmenu" data-text="Awesome" name="add">
            <span class="actual-text">&nbsp;Submit&nbsp;</span>
            <span aria-hidden="true" class="hover-text">&nbsp;Submit&nbsp;</span>
        </button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter only letters.");
        $('#form').validate({
            rules: {
                name: {
                    required: true,
                    lettersOnly: true,
                    minlength: 3 // Minimum length of 3 characters
                },
                email: {
                    required: true,
                    email: true // Validate email format
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 3 characters long"
                },
                email: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                }
            },
            errorPlacement: function(error, element) {
                // Display error messages below each input field
                error.insertAfter(element);
            }
        });
    });
</script>

<?php


$con = new mysqli("localhost", "root", "", "soi");
if (isset($_POST['add'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    function generateRandomString($length)
    {
        $randomString = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charLength - 1)];
        }

        return $randomString;
        $str = "admin".$randomString;
        echo $str;
    }

    // Usage example:
    $randomString = generateRandomString(7);

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
    $mail->Subject = 'Add Admin';
    $mail->Body    = "<h3>Your .$email. Id's Password is </h3><br><b><h1>$randomString</h1></b>
    <a href='http://localhost/bhai/Admin/adminlogin.php?em='.$email'>Click here to Login your Admin account</a><br>
    <h4 style='color:red'>Note : When Logged in Your Admin Account, First of all Change Your Admin Account Password (For Security Purpose.)</h4>";

    $mail->send();

    // $in = "INSERT INTO `adminlog`(`sr`, `aname`, `mail`, `apass`, `profilt`,) VALUES ('','$name','$email','$randomString','user.png')";
    $in = "INSERT INTO `reg1`(`un`, `mail`, `pass`, `profile`,`satus`,`role`) VALUES ('$name','$email','$str','user.png','active','admin')";
    if ($con->query($in)) {
        echo "<script>window.location.href = 'aprofile.php' </script>";
    }
}
?>
<style>
    .error {
        color: red;
    }
</style>