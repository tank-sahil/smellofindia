<?php
include('sidebar.php');
include('admin_session.php');
?>
<div id="main1">
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
        <div id="main1">
            <h2>Add Admin</h2><br>

            <a href="adda.php"><button class="submitbtnofmenu" type="submit" data-text="Awesome" name="adda">
                    <span class="actual-text">&nbsp;Add&nbsp;</span>
                    <span aria-hidden="true" class="hover-text">&nbsp;Add&nbsp;</span>
                </button>
            </a><br><br>
            <h2>Profile</h2>
            <main>

                <section class="profile-info">
                    <div class="profile-details">
                        <?php
                        $name = $_SESSION['name'];
                        $con = new mysqli("localhost", "root", "", "soi");

                        $sel = "SELECT * FROM reg1 WHERE un='$name'";
                        $res = $con->query($sel);

                        if ($res && $res->num_rows > 0) {
                            $row = $res->fetch_assoc();
                        ?>
                            <div class="profile-picture">
                                <img src="images/<?php echo $row['profile'] ?>" alt="User Profile Picture">
                            </div>
                            <div class="user-details">
                                <br>
                                <h2><?= $row['un'] ?></h2>
                                <br>
                                <p><?= $row['mail'] ?></p>
                                <br>
                            </div>
                        <?php
                        } else {
                            // Handle case where no rows are returned
                            echo "No user found";
                        }
                        ?>

                    </div>
                    <div class="bio">
                        <a href="ad_edit_pro.php?email=<?php echo $row['mail'] ?>">
                            <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update">
                                <span class="actual-text">&nbsp;Edit_Profile&nbsp;</span>
                                <span aria-hidden="true" class="hover-text">&nbsp;Edit_Profile&nbsp;</span>
                            </button></a>
                        <a href="ad_edit_pa.php?email1=<?php echo $row['mail'] ?>">
                            <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update">
                                <span class="actual-text">&nbsp;Change_Password&nbsp;</span>
                                <span aria-hidden="true" class="hover-text">&nbsp;Change_Password&nbsp;</span>
                            </button>
                        </a>
                    </div>

                </section>

            </main>
        </div>
    </body>

    </html>
</div>