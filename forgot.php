<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/PHPMailer.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/SMTP.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/Exception.php');
?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">

    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <?php include('header.php');
    ?>

    <div class="container" id="fp">
        <div class="div col-lg-6 col-sm-7">
            <form id="forgotPasswordForm" method="post">

                <div class="main ">
                    <a href="login.php" style="color:#433;">
                        <h5 style="text-align: right;">Back to Login</h5>
                    </a>
                    <h1 style="text-align: center;">Forgot Password</h1>

                    <div class="mb-3">
                        <label for="email2" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email2" placeholder="email@example.com" name="email2">
                        <span id="err-mail2" class="error"></span>
                    </div>

                    <br>
                    <div class="mb-3">
                        <input class="btn" type="submit" value="Send OTP" name="fp" style="background-color:#433;color:white">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#forgotPasswordForm').validate({
                rules: {
                    email2: {
                        required: true,
                        email: true // Validate email format
                    }
                },
                messages: {
                    email2: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    }
                }
            });
        });
    </script>
</body>

</html>
<?php
$con = new mysqli("localhost", "root", "", "soi");
// chek button
if (isset($_POST['fp'])) {
    $otp = rand(1000, 9999);
    echo $otp;
    $email = $_POST['email2'];
    date_default_timezone_set('Asia/kolkata');

    $sel = "select * from reg1 where mail = '$email'  ";
    $res = $con->query($sel);
    $row = $res->fetch_assoc();
    if ($res->num_rows >= 1) {
        // echo "Mail id reg $email <br> ";
        $mail = new PHPMailer();

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'stank729@rku.ac.in'; // SMTP username//sender mail id
        $mail->Password = "UPDATE PASSWORD OF RKU ACCOUNT IS 94.25"; // SMTP password // sender mail id password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;
        $mail->setFrom('stank729@rku.ac.in', 'Smell Of The India !'); // Sender's email address and name
        $mail->addAddress($email); // Recipient's email address and name
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Forgot Password OTP';
        $mail->Body    = "<h4>Your $email I'd OTP is </h4><br><b><h1>$otp</h1></b>";
        $mail->send();

        $del = "delete otp from otp where email = '$email'";
        $con->query($del);
        $insert = "insert into otp values('','$email','$otp',CURRENT_TIMESTAMP)";
        $con->query($insert);
?>
        <script>
            window.location.href = "otp_verify.php?email=<?php echo ($email); ?>";
        </script>

    <?php
    } else {
        echo "moye";

    ?>
        <script>
            alert('Your <?= $email ?> is not Registed . \n Please Register. ')
        </script>
<?php
    }
}
?>