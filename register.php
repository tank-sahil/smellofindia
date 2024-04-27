<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/PHPMailer.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\SMTP.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\Exception.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
    <style>
        a {
            color: #433;
        }

        span.error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    include('header.php') ?>
    <div class="container" id="register">
        <div class="div col-lg-6 col-sm-7">
            <form id="registerForm" method="post">

                <div class="main ">
                    <a href="login.php">
                        <h5 style="text-align: right; text-decoration: none;color: #433;">Back to Login</h5>
                    </a>
                    <h1 style="text-align: center;">Register</h1>
                    <div class="mb-3 mt-5">
                        <label for="name" class="form-label">Username</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Only Characters">
                        <span id="nerr" class="error"></span>
                    </div>
                    <div class="mb-3  ">
                        <label for="email1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email1" name="email1" placeholder="email@example.com">
                        <span id="eerr" class="error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="pwd1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="pwd1" name="pwd1" placeholder="Digits & Characters">
                        <span id="perr" class="error"></span>
                    </div>
                    <div class="mb-3">
                        <label for="cpwd1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="cpwd1" name="cpwd1" placeholder="Digits & Characters">
                        <span id="cperr" class="error"></span>
                    </div>

                    <br>
                    <div class="mb-3">
                        <input class="btn" name="reg" type="submit" value="Submit" style="background-color:#433;color:white">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
            }, "Please enter only letters.");
            $('#registerForm').validate({
                rules: {
                    name: {
                        required: true,
                        lettersOnly: true,
                        minlength: 2, // Minimum length of 2 characters
                        maxlength: 20
                    },
                    email1: {
                        required: true,
                        email: true // Validate email format
                    },
                    pwd1: {
                        required: true,
                        minlength: 6 // Minimum length of 6 characters
                    },
                    cpwd1: {
                        required: true,
                        equalTo: '#pwd1' // Should be equal to password
                    }
                },
                messages: {
                    name: {
                        required: "Please enter your username",
                        lettersOnly: "Please enter only letters.",
                        minlength: "Username must consist of at least 2 characters",
                        maxlength: "Username must consist of 20 characters"
                    },
                    email1: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    pwd1: {
                        required: "Please enter a password",
                        minlength: "Password must be at least 6 characters long"
                    },
                    cpwd1: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "name")
                        error.appendTo("#nerr");
                    else if (element.attr("name") == "email1")
                        error.appendTo("#eerr");
                    else if (element.attr("name") == "pwd1")
                        error.appendTo("#perr");
                    else if (element.attr("name") == "cpwd1")
                        error.appendTo("#cperr");
                    else
                        error.insertAfter(element);
                }
            });
        });
    </script>
</body>

</html>

<?php

$con = new mysqli("localhost", "root", "", "soi");
$token = uniqid() . uniqid();
if (isset($_POST['reg'])) {
    $name = $_POST['name'];
    $em = $_POST['email1'];
    $pass = $_POST['pwd1'];
    $cp = $_POST['cpwd1'];
    $_SESSION['email1'];
    $sel = "select * from reg1 where mail = '$em' ";
    $res = $con->query($sel);
    if ($res->num_rows >= 1) {
?>
        <script>
            alert("Email id is Already registed. ");
        </script>
        <?php
    } else {
        // $insert = "INSERT INTO `reg1`(`un`, `mail`, `pass`, `cp`,) VALUES ('$name','$em','$pass','$cp')";4
        $insert = "INSERT INTO `reg1`(`sr`, `un`, `mail`, `pass`, `cp`, `profile`, `satus`, `token`) VALUES ('','$name','$em','$pass','$cpass','','inactive','$token')";
        $de = $_SESSION['un'] = $name;
        $_SESSION['mail'] = $em;

        if ($con->query($insert)) {
            $mail = new PHPMailer();
            try {
                // Server settings
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = 'stank729@rku.ac.in'; // SMTP username
                $mail->Password = 'UPDATE PASSWORD OF RKU ACCOUNT IS 94.25'; // SMTP password
                $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465; // TCP port to connect to
                // $mail->SMTPDebug = 2;

                // Recipients
                $mail->setFrom('stank729@rku.ac.in', 'Tank Sahil'); // Sender's email address and name
                $mail->addAddress($em,$name); // Recipient's email address and name

                // Attachments
                //$mail->addAttachment('/path/to/attachment/file.pdf', 'Attachment.pdf'); // Path to the attachment and optional filename

                // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Account Verification';
                $mail->Body    = 'Congratulations! ' .$name . ' Your account has been created successfully. This email is for your account verification. <br> Kindly click on the link below to verify your account. You will be able to login into your account only after account verification. <br>
                <a href="http://localhost/bhai/verify.php?em=' . $em . '&token=' . $token . '">Click here to verify your account</a>';

                // Send the email
                if ($mail->send()) {
                    setcookie("success", "Registration Successfull. Activation mail is sent to your registered email account. Kindly activate your account to login.", time() + 2, "/");
        ?>
                    <script>
                        window.location.href = "login.php";
                    </script>
                <?php
                } else {
                    setcookie("error", "Error in sending mail. Please try again later.", time() + 2, "/");
                ?>
                    <script>
                        window.location.href = "register.php";
                    </script>
            <?php
                }
            } catch (Exception $e) {
                echo "Email sending failed. Error: {$mail->ErrorInfo}";
            }
        } else {
            setcookie("error", "Error in registration. Please try again later.", time() + 2, "/");
            ?>
            <script>
                window.location.href = "register.php";
            </script>
<?php
        }
    }
}
?>