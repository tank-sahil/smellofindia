<?php
include('sidebar.php');
$con = new mysqli("localhost", "root", "", "soi");

?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


        }

        main {
            display: flex;
            justify-content: center;
        }

        .profile-info {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            width: 600px;
            margin-left: 0%;

        }

        @media screen and (max-width:1080px) {
            .profile-info {
                margin-left: 0%;
            }
        }

        .profile-details {
            display: flex;
            align-items: center;
        }

        .profile-picture {
            width: 50%;
        }

        .profile-picture img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .user-details {
            font-size: 18px;
        }

        .bio {
            margin-top: 20px;
        }

        .bio h3 {
            margin-bottom: 10px;
        }

        .bio p {
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <main>

        <section class="profile-info">
            <div class="profile-details">

            </div>
            <div class="user-details">
                <h2>Change Password</h2>
                <br>
                <form action="" method="post">
                    <div class="mb-3 ">
                        <label for="email" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="email" name="op">
                        <span id="err-mail"></span>
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="pwd" name="np">
                        <span id="err-pws"> </span>
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" id="pwd" name="cnp">
                        <span id="err-pws"> </span>
                    </div>
                    <!-- <input type="submit" value="Change Password" name="but" class="btn" style="background-color:#433;color:white"> -->
                    <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="but">
                        <span class="actual-text">&nbsp;Change_password&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Change_password&nbsp;</span>
                    </button>
                </form>
                <br>


            </div>
            </div>
            <!-- <button class="btn" style="background-color:#433;color:white" name="but">Change Password</button> -->

        </section>
    </main>

</body>

</html>

<?php
$mail = $_REQUEST['email1'];

if (isset($_POST['but'])) {
    $op = $_POST['op'];
    $np = $_POST['np'];
    $cnp = $_POST['cnp'];

    $sel = "select * from reg1 where mail = '$mail' AND role = 'admin'";
    $res = $con->query($sel);
    $data = $res->fetch_assoc();

    if ($op == $data['pass']) {
        if ($np == $cnp) {
            $up = "UPDATE `reg1` SET `pass`='$np' WHERE `mail`='$mail'";
            $con->query($up); ?>
            <script>
                alert('Password Update Successfully');
                window.location.href = "aprofile.php";
            </script>

        <?php

        } else {
        ?>

            <script>
                alert('Both Password Not Match');
            </script>
        <?php
        }
    } else {
        ?>

        <script>
            alert('Old Password Wrong');
        </script>
<?php
    }
}
?>