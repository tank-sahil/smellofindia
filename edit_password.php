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
                    <br>
                    <h1 style="text-align: center;">Edit Password</h1>

                    <div class="mb-3">
                        <label for="email2" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="pass" placeholder="New Password" name="pass">
                        <span id="err-pass" class="error"></span>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="con_pass" placeholder="Confirm New Password" name="con_pass">
                        <span id="err-pass" class="error"></span>
                    </div>
                    <br>
                    <div class="mb-3">
                        <input class="btn" type="submit" value="Change Password" name="cp" style="background-color:#433;color:white">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#forgotPasswordForm').validate({
            rules: {
                pass: {
                    required: true,
                    minlength: 6 // Example: Minimum password length
                },
                con_pass: {
                    required: true,
                    equalTo: '#pass' // Make sure it matches the #pass field
                }
            },
            messages: {
                pass: {
                    required: "Please enter a new password",
                    minlength: "Your password must be at least {0} characters long"
                },
                con_pass: {
                    required: "Please confirm your new password",
                    equalTo: "Passwords do not match"
                }
            }
        });
    });
</script>

<?php
$mail = $_REQUEST['email'];
echo $mail;
if (isset($_POST['cp'])) {

    // Check if both pass and con_pass are set in $_POST
    if (isset($_POST['pass'], $_POST['con_pass'])) {
        $pass = $_POST['pass'];
        $cpass = $_POST['con_pass'];

        if ($pass == $cpass) {
            echo "done";
            $con = new mysqli("localhost", "root", "", "soi");
            $up = "UPDATE `reg1` SET `pass`='$pass' WHERE `mail`='$mail'";
            // $up = "UPDATE reg1 SET   'pass'='$pass' where 'mail'= '$mail'";
            $run = $con->query($up);
            if ($run) { ?>
                <script>
                    window.location.href = "login.php";
                </script>
            <?php            } else { ?>

                <script>
                    alert('Not Update Password');
                    window.location.href = "indexe.php";
                </script>
            <?php        }
        } else { ?>
            <script>
                alert('Both Password not match');
            </script>
<?php
        }
    } else {
        // Handle the case where either pass or con_pass is not set
        echo "Please fill out both password fields.";
    }
}
?>