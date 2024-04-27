<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <?php
    include('header.php');

    ?>
    <div class="container" id="login">
        <div class="div col-lg-6 col-sm-7">
            <form id="loginForm" action="" method="post">
                <div class="top">
                    <div class="main ">
                        <h1 style="text-align: center;">Login</h1>

                        <div class="mb-3 mt-5">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                            <span id="err-mail"></span>
                        </div>
                        <div class="mb-3">
                            <label for="pwd" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pwd" name="password" placeholder="Digits & Characters">
                            <span id="err-pws"> </span>
                        </div>
                        <br>
                        <input class="btn" name="sub" type="submit" style="background-color:#433;color:white">
                        <div class="class">
                            <br>
                            <a href="Forgot.php" style=" text-decoration: none;color: #433;">
                                <h6>Forgot Password!</h6>
                            </a>
                            <a href="register.php" style=" text-decoration: none;color: #433;">
                                <h6>Don't have an account ? <label for="" style="font-size: larger;">Register</label></h6>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <!-- <h1 class="" style="text-align: center; ">
                <a href="#foot" style="color: #433;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" viewBox="0 0 1024 1024" fill="#433">
                        <path fill="currentColor" d="M104.704 338.752a64 64 0 0 1 90.496 0l316.8 316.8l316.8-316.8a64 64 0 0 1 90.496 90.496L557.248 791.296a64 64 0 0 1-90.496 0L104.704 429.248a64 64 0 0 1 0-90.496" />
                    </svg>
                </a>
            </h1> -->
        </div>

    </div>

    <div class="php" id="foot" class="mt-5">
        <?php include('footer.php') ?>
    </div>
    <script>
        $(document).ready(function() {
            $('#loginForm').validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6 // Change this value according to your requirements
                    }
                },
                messages: {
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter your password",
                        minlength: "Your password must be at least 6 characters long"
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("invalid-feedback");
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass("is-invalid").addClass("is-valid");
                }
            });
        });
    </script>
</body>

</html>


<?php

$con = new mysqli("localhost", "root", "", "soi");
$sel = "select * from reg1";
$res = $con->query($sel);
$row = $res->fetch_assoc();
$sta = $row['satus'];
$name = $row['un'];
$role = $row['role'];
echo $sta;
if (isset($_POST['sub'])) {
    // $check = $_SESSION['email1'];

    $mail = $_POST['email'];
    $pass = $_POST['password'];
    $sel = "select * from reg1 where mail = '$mail' AND pass = '$pass' AND satus = 'active' ";
    $res = $con->query($sel);



    if ($res->num_rows >= 1) {
        $row = $res->fetch_assoc();
        $role = $row['role'];
        $name = $row['un'];

        if ($role == 'admin') {
            echo "Admin";
            $_SESSION['name'] = $name;
?>
            <script>
                alert("Successfully Admin Login.");
                window.location.href = 'dashboard.php';
            </script>
        <?php

        } else {
            $_SESSION['emil'] = $mail;
            echo "User";
        ?>
            <script>
                alert("Successfully Login.");
                window.location.href = 'index.php';
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert("Entered Email is not registered or its status is inactive.");
            window.location.href = 'register.php';
        </script>
<?php
    }
}
?>