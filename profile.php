<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
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
    <?php
    include('header.php');
    include_once('session_login.php');
    ?>
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
                <div class="profile-picture">
                    <?php
                    if ($row['profile'] == "") {
                    ?>
                        <img src="images/user.png" alt="User Profile Picture">
                    <?php
                    } else {
                    ?>
                        <img src="images/<?php echo $row['profile'] ?>" alt="User Profile Picture">
                    <?php
                    }
                    ?>
                </div>
                <div class="user-details">
                    <br>
                    <h2><?= $row['un'] ?></h2>
                    <br>

                    <p><?= $row['mail'] ?></p>
                    <br>


                </div>
            </div>
            <div class="bio">
                <a href="edit_pro.php?email=<?php echo $mail ?>"><button class="btn" style="background-color:#433;color:white">Edit Profile</button></a>
                <a href="edit_pa.php?email1=<?php echo $mail ?>"><button class="btn" style="background-color:#433;color:white">Change Password</button></a>

            </div>
        </section>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>