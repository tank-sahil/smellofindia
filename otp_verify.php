<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/PHPMailer.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\SMTP.php');
require('C:/xampp/htdocs/BHAI/PHPMailer-20240402T051622Z-001/PHPMailer/\Exception.php');

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
    <?php include('header.php') ?>
    <div class="container" id="fp">
        <div class="div col-lg-6 col-sm-7">
            <form id="forgotPasswordForm" method="post">

                <div class="main ">
                    <a href="login.php" style="color:#433;">
                        <h5 style="text-align: right;">Back to Login</h5>
                    </a>
                    <h1 style="text-align: center;">Verify OTP</h1><br>
                    <center>
                        <svg class="check" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" xml:space="preserve">
                            <image id="image0" width="60" height="60" x="0" y="0" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADwAAAA8CAQAAACQ9RH5AAAABGdBTUEAALGPC/xhBQAAACBjSFJN
AAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZ
cwAACxMAAAsTAQCanBgAAAAHdElNRQfnAg0NDzN/r+StAAACR0lEQVRYw+3Yy2sTURTH8W+bNgVf
aGhFaxNiAoJou3FVEUQE1yL031BEROjCnf4PLlxILZSGYncuiiC48AEKxghaNGiliAojiBWZNnNd
xDza3pl77jyCyPzO8ubcT85wmUkG0qT539In+MwgoxQoUqDAKDn2kSNLlp3AGi4uDt9xWOUTK3xg
hVU2wsIZSkxwnHHGKZOxHKfBe6rUqFGlTkPaVmKGn6iYao1ZyhK2zJfY0FZ9ldBzsbMKxZwZjn/e
5szGw6UsD5I0W6T+hBhjUjiF7bNInjz37Ruj3igGABjbtpIo3GIh30u4ww5wr3fwfJvNcFeznhBs
YgXw70TYX2bY/ulkZhWfzfBbTdtrzjPFsvFI+T/L35jhp5q2owDs51VIVvHYDM9sa/LY8XdtKy1l
FXfM8FVN2/X2ajctZxVXzPA5TZvHpfb6CFXxkerUWTOcY11LX9w0tc20inX2mmF4qG3upnNWrOKB
hIXLPu3dF1x+kRWq6ysHpkjDl+7eQjatYoOCDIZF3006U0unVSxIWTgTsI3HNP3soSJkFaflMDwL
3OoHrph9YsPCJJ5466DyOGUHY3Epg2rWloUxnMjsNw7aw3AhMjwVhgW4HYm9FZaFQZ/bp6QeMRQe
hhHehWKXGY7CAuSpW7MfKUZlAUqWdJ3DcbAAB3guZl9yKC4WYLfmT4muFtgVJwvQx7T2t0mnXK6J
XlGGyAQvfNkaJ5JBmxnipubJ5HKDbJJsM0eY38QucSx5tJWTVHBwqDDZOzRNmn87fwDoyM4J2hRz
NgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyMy0wMi0xM1QxMzoxNTo1MCswMDowMKC8JaoAAAAldEVY
dGRhdGU6bW9kaWZ5ADIwMjMtMDItMTNUMTM6MTU6NTArMDA6MDDR4Z0WAAAAKHRFWHRkYXRlOnRp
bWVzdGFtcAAyMDIzLTAyLTEzVDEzOjE1OjUxKzAwOjAwIIO3fQAAAABJRU5ErkJggg=="></image>
                        </svg>
                    </center>
                    <br>
                    <div class="mb-3">
                        <label for="email2" class="form-label">OTP</label>
                        <input type="number" class="form-control" id="otp" placeholder="OTP" name="ot">
                        <span id="err-mail2" class="error"></span>
                    </div>


                    <div class="mb-3">
                        <input class="btn" type="submit" value="Verify OTP" name="otp" style="background-color:#433;color:white">
                    </div>
                    <div class="mb-3">
                        <h3><input type="submit" name="resend_otp" value="Resend OTP" style="background: none;border:none "></h3>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        // Initialize form validation on the OTP form
        $("#forgotPasswordForm").validate({
            // Specify validation rules
            rules: {
                otp: {
                    required: true,
                    digits: true,
                    minlength: 6 // Assuming OTP is 6 digits long
                }
            },
            // Specify validation error messages
            messages: {
                otp: {
                    required: "Please enter your OTP",
                    digits: "Please enter only digits",
                    minlength: "OTP must be at least 6 digits long"
                }
            },
            // Submit the form via Ajax
            submitHandler: function(form) {
                // You can add your Ajax submission code here
                // For example, you can use jQuery's .ajax() function
                // $.ajax({
                //     url: 'your_server_script.php',
                //     type: 'post',
                //     data: $(form).serialize(),
                //     success: function(response) {
                //         // Handle the response from the server
                //     }
                // });
                form.submit(); // Default form submission
            }
        });
    });
</script>

<?php
$con = new mysqli("localhost", "root", "", "soi");

date_default_timezone_set('Asia/kolkata');

if (isset($_POST['otp'])) {
    $email = $_REQUEST['email'];
    $ot = $_POST['ot'];
    $sel = "select * from otp where email = '$email'";
    $res = $con->query($sel);
    $row = $res->fetch_assoc();
    $c_time = date('Y-m-d H:i:s');
   $otp_time = date('Y-m-d H:i:s', strtotime($row['time']) + 60);
    if ($otp_time >= $c_time) {
        if ($ot != $row['otp']) {
?> <script>
                alert("Incorrect OTP");
            </script>
        <?php
        } else { ?>

            <script>
                window.location.href = "edit_password.php?email=<?php echo $email  ?>";
            </script>
        <?php
        }
        ?>

    <?php
    } else {
    ?>
        <script>
            alert("Expire OTP");
        </script><?php
                }
            }
            if (isset($_POST['resend_otp'])) {
                $otp = rand(1000, 9999);
                echo "Done";

                $email = $_REQUEST['email'];
                echo "OTP";
                echo "Mail id reg $email <br> ";
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

                // // Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Forgot Password OTP';
                $mail->Body    = "<h4>Your $email I'd OTP is </h4><br><b><h1>$otp</h1></b>";
                $mail->send();
                // $del = "DELETE FROM otp WHERE email = $email";
                $del = "delete otp from otp where email = '$email'";
                $con->query($del);
                $insert = "insert into otp values('','$email','$otp',CURRENT_TIMESTAMP)";
                $con->query($insert);
            }

                    ?>