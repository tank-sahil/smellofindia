<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
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
    include_once('session_login.php');
    ?>
    <div class="container" id="login">
        <div class="div col-lg-6 col-sm-7">
            <form method="post" id="bookTableForm">

                <div class="top">
                    <div class="main ">
                        <h1 style="text-align: center;">Book Table</h1>
                        <div class="mb-3 mt-5">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Characters" name="name">
                            <span id="err-name" class="error"></span>
                        </div>
                        <div class="mb-3  ">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="mail" name="mail" placeholder="email@example.com" name="email">
                            <span id="err-mail" class="error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" id="pn" name="pn" placeholder="Digits" name="phone">
                            <span id="err-pws" class="error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                            <span id="err-date" class="error"></span>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                            <span id="err-time" class="error"></span>
                        </div>
                        <br>
                        <div class="mb-2">
                        <input class="btn" name="bok" type="submit" value="Book" style="background-color:#433;color:white">

                        </div>

                    </div>
                </div>
            </form>
            <br><br><b></b>
        </div>
    </div>
    <?php include('footer.php') ?>
</body>

</html>
<script>
    $(document).ready(function() {
        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]*$/.test(value);
        }, "Please enter only letters.");
        $('#bookTableForm').validate({
            rules: {
                name: {
                    required: true,
                    lettersOnly: true,
                    minlength: 2, // Minimum length of 2 characters
                    maxlength: 8
                },
                mail: {
                    required: true,
                    mail: true
                },
                pn: {
                    required: true,
                    digits: true,
                    minlength: 10
                },
                date: {
                    required: true
                },
                time: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    lettersOnly: "Please enter only letters.",
                    minlength: "Username must consist of at least 2 characters",
                    maxlength: "Username must consist of 8 characters"

                },
                mail: {
                    required: "Please enter your email address",
                    email: "Please enter a valid email address"
                },
                pn: {
                    required: "Please enter your phone number",
                    digits: "Please enter only digits",
                    minlength: "Please enter at least 10 digits"
                },
                date: {
                    required: "Please select a date"
                },
                time: {
                    required: "Please select a time"
                }
            }
        });
    });
</script>

<?php

$con = new mysqli("localhost", "root", "", "soi");
if (isset($_POST['bok'])) {
    $email = $_SESSION['emil'];

    $un = $_POST['name'];
    $mail = $_POST['mail'];
    $pn = $_POST['pn'];
    $dt = $_POST['date'];
    $tm = $_POST['time'];
    echo $tm;
    $sel = "SELECT * from reg1 where mail='$mail' AND satus='active' ";
    $res = $con->query($sel);

    if ($res->num_rows == 1) {
        $in = "INSERT INTO `book`(`name`, `mail`, `date`, `time`, `phone`) VALUES ('$un','$mail','$dt','$tm','$pn')";
        $con->query($in);
        $in1 = "INSERT INTO `allbook`(`name`, `mail`, `date`, `time`, `phone`) VALUES ('$un','$mail','$dt','$tm','$pn')";
        $con->query($in1);
    }
}

?>