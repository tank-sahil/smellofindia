<?php
$mail = $_REQUEST['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
            max-width: 600px;
            margin-left: 32%;
            background-color: beige;

        }

        @media screen and (max-width:1080px) {
            .profile-info {
                margin-left: 0%;
            }
        }

        .user-details {
            font-size: 18px;
            width: 100%;
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
    <?php
    include('header.php') ?>
    <main>

        <section class="profile-info">
            <div class="profile-details">
                <?php
                $con = new mysqli("localhost", "root", "", "soi");
                $mail = $_SESSION['emil'];
                $sel = "select * from reg1 where mail='$mail'";
                $res = $con->query($sel);
                $row = $res->fetch_assoc();
                ?>
                <center>
                    <h3>Edit Profile</h3>
                </center>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3 mt-5">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $row['un'] ?>">
                        <span id="err-name"></span>
                    </div>

                    <div class="mb-3 ">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $row['mail'] ?>">
                        <span id="err-mail"></span>
                    </div>

                    <div class="mb-3 ">
                        <label for="file" class="form-label">Image</label>
                        <input type="file" class="form-control" id="file" name="file">
                        <span id="err-file"></span>
                    </div>
                    <button class="btn" type="submit" name="ep" style="background-color:#433;color:white">Edit Profile</button>

                </form>
            </div>
            <div class="bio">
            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>
<?php

if (isset($_POST['ep'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file = $_FILES['file']['name'];

    $up = "UPDATE `reg1` SET `un`='$name',`mail`='$email',`profile`='$file' WHERE `mail` = '$mail'";

    if ($con->query($up)) {
        echo "<script>window.location.href = 'profile.php';</script>";
    } else {
        echo "Not Update";
    }
}
?>