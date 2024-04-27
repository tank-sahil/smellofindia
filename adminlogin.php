<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="adlogin.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


</head>

<body>
    <?php include("sidebar.php");
    $con = new mysqli("localhost", "root", "", "soi");
    ?>
    <div id="main1">
        <div class="container" id="register">
            <div class="div col-lg-6 col-sm-7">
                <form action="" method="post" id="form">

                    <h1 style="text-align: center;">Admin</h1>
                    <div class="mb-3 mt-5">
                        <label for="" class="form-label">Admin Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Only Charcaters">
                        <span id="err-name"> </span>
                    </div>
                    <div class="mb-3  ">
                        <label for="formGroupExampleInput" class="form-label">Password</label>
                        <input type="password" class="form-control" name="Password" id="Password" placeholder="Charcters and Digits">
                        <span id="err-pass"></span>
                    </div>

                    <br>
                    <div class="mb-3">
                        <button class="submitbtnofmenu" data-text="Awesome" type="submit" name="add">
                            <span class="actual-text">&nbsp;Login&nbsp;</span>
                            <span aria-hidden="true" class="hover-text">&nbsp;Login&nbsp;</span>
                        </button>
                    </div>

                </form>
            </div>
        </div>
</body>
<?php

if (isset($_POST['add'])) {
    
    $name = $_POST['name'];
    $pass = $_POST['Password'];
    $sel = "select * from adminlog where aname = '$name' AND apass = '$pass'";
    $res = $con->query($sel);
    if ($res->num_rows >= 1 == $name) {
        $_SESSION['name'] = $name;
?>
        <script>
            window.location.href = "dashboard.php";
        </script>
<?php
    } else {
        echo "<script>alert('Incorrect Admin name OR password .') </script>";
    }
}

?>

</html>
<script>
    $(document).ready(function() {
        // Add validation rules
        $("#form").validate({
            rules: {
                name: {
                    required: true,
                    lettersOnly: true,
                    minlength: 2,
                    maxlength: 8
                },
                Password: {
                    required: true,
                    alphanumeric: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name.",
                    lettersOnly: "Please enter only characters.",
                    minlength: "Admin Name must consist of at least 2 characters",
                    maxlength: "Admin Name must consist of 8 characters"

                },
                Password: {
                    required: "Please enter your password.",
                    alphanumeric: "Please enter only characters and digits."
                }
            }
        });

        // Custom validation methods
        $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        }, "Please enter only letters.");

        $.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
        }, "Please enter only characters and digits.");
    });
</script>