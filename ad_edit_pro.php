<?php
include('sidebar.php');
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
            width: 600px;
            margin-left: 0%;
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
    <main>

        <section class="profile-info">
            <div class="profile-details">
                <?php
                $con = new mysqli("localhost", "root", "", "soi");

                $sel = "select * from adminlog where mail='$mail'";
                $res = $con->query($sel);
                $row = $res->fetch_assoc();
                ?>
                <center>
                    <h3>Edit Profile</h3>
                </center>
                <form action="" method="post" id="form" enctype="multipart/form-data">
                    <div class="mb-3 mt-5">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $row['aname'] ?>">
                        <span id="err-name"></span>
                    </div>

                    <div class="mb-3 ">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $row['mail'] ?>">
                        <span id="err-mail"></span>
                    </div>

                    <div class="mb-3 ">
                        <label for="file" class="form-label">Image</label>
                        <input type="file" class="form-control" id="file" name="file" value="<?= $row['profilt'] ?>">
                        <span id="err-file"></span>
                    </div>
                    <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="ep">
                        <span class="actual-text">&nbsp;Edit&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Edit&nbsp;</span>
                    </button>
                </form>
            </div>
            <div class="bio">
            </div>
        </section>
    </main>
</body>

</html>
<?php

if (isset($_POST['ep'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $file = $_FILES['file']['name'];
    $temp = $_FILES["file"]["tmp_name"];
    $path = "images/" . $file;
    move_uploaded_file($temp, $path);
    $up = "UPDATE `reg1` SET `un`='$name',`mail`='$email',`profile`='$file' WHERE `mail` = '$mail'";

    if ($con->query($up)) {


        echo "<script>window.location.href = 'aprofile.php' </script>";
    } else {
        echo "Not Update";
    }
}
?>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                file: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Please enter your name"
                },
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                file: {
                    required: "Please select an image"
                }
            },
            errorPlacement: function(error, element) {
                // Display error message next to the input field
                error.insertAfter(element);
            }
        });
    });
</script>