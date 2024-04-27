<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <!-- Add these lines in the head section of your HTML -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include jQuery Validate plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <title>Responsive Sidebar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        body,
        td {
            background-color: #fff;
        }

        #form {
            background-color: beige;
            padding: 20px;
        }

        form {
            padding: 20px;
        }

        #sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #111;
            padding-top: 60px;
            transition: 0.5s;
            overflow-x: hidden;

        }

        #sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        img {
            height: 125px;
            width: 125px;
        }

        #sidebar a:hover {
            color: #f1f1f1;
        }

        .closebtn {
            float: right;
        }

        #main,
        #main1 {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-width: 600px) {
            #sidebar {
                width: 250px;
                left: 0;
                padding-top: 15px;
                display: none;
            }

            #main {
                margin-left: 0;
            }
        }

        .Btn1 {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background-color: black;
        }

        /* plus sign */
        .sign {
            width: 100%;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sign svg {
            width: 17px;
        }

        .sign svg path {
            fill: white;
        }

        /* text */
        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1em;
            font-weight: 600;
            transition-duration: .3s;
        }

        /* hover effect on button width */
        .Btn1:hover {
            width: 125px;
            border-radius: 40px;
            transition-duration: .3s;
        }

        .Btn1:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 20px;
        }

        /* hover effect button's text */
        .Btn1:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 10px;
        }

        /* button click effect*/
        .Btn1:active {
            transform: translate(2px, 2px);
        }

        .button {
            height: 50px;
            width: 50px;
            background-color: black;
            border-radius: 50%;
            border: none;
        }

        label {
            font-size: large;
        }

        .main {
            background-color: #111;
        }

        .quert {
            display: flex;
            flex-direction: rowe;
        }

        .submitbtnofmenu {
            margin: 0;
            height: auto;
            background: transparent;
            padding: 0;
            border: none;
            cursor: pointer;
            color: darkgray;
        }

        /* submitbtnofmenu styling */
        .submitbtnofmenu {
            --border-right: 6px;
            --text-stroke-color: rgba(255, 255, 255, 0.6);
            --animation-color: black;
            --fs-size: 1em;
            letter-spacing: 3px;
            text-decoration: none;
            font-size: var(--fs-size);
            font-family: "Arial";
            position: relative;
            text-transform: uppercase;
            color: darkgray;
            -webkit-text-stroke: 1px var(--text-stroke-color);
        }

        /* this is the text, when you hover on button1 */
        .hover-text {
            position: absolute;
            box-sizing: border-box;
            /* content: attr(data-text); */
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            transition: 0.5s;
            /* font-size: var(--fs-size); */
            -webkit-text-stroke: 1px var(--animation-color);
        }

        /* hover */
        .submitbtnofmenu:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 23px var(--animation-color))
        }

        .update {
            background-color: white;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div id="sidebar">
        <a href="javascript:void(0)" class="closebtn" id="closebtn" onclick="closeNav()" class="button"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                <path fill="white" d="M18.36 19.78L12 13.41l-6.36 6.37l-1.42-1.42L10.59 12L4.22 5.64l1.42-1.42L12 10.59l6.36-6.36l1.41 1.41L13.41 12l6.36 6.36z" />
            </svg></a><br>
        <a href=""><img src="images/logo-removebg-preview.png" alt=""></a>
        <a href="dashboard.php">Dashboard</a>
        <a href="#" data-bs-toggle="collapse" data-bs-target="#menuDropdown">Add <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                <path fill="currentColor" d="m7 10l5 5l5-5z" />
            </svg></a>
        <div id="menuDropdown" class="collapse">
            <a href="addgujarati.php">Menu </a>
            <a href="add_cat.php">Category</a>
        </div>
        <a href="#" data-bs-toggle="collapse" data-bs-target="#menuDropdown1">Edit Pages <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24">
                <path fill="currentColor" d="m7 10l5 5l5-5z" />
            </svg></a>
        <div id="menuDropdown1" class="collapse">
            <a href="indexe.php">Edit Index </a>
            <a href="abute.php">Edit About</a>
        </div>

        <a href="log-reg.php">Login / Register</a>
        <a href="bookhistory.php">Book History</a>
        <br><br>
        <?php
        if (isset($_SESSION['name'])) {
        ?>
            <a href="aprofile.php">Profile</a>
        <?php
        } ?>
    </div>

    <div id="main" class="main d-flex justify-content-between ">
        <!-- Your main content goes here -->

        <button class="button" id="open" onclick="openNav()"><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 16 16">
                <path fill="white" fill-rule="evenodd" d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75M2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8m0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75" clip-rule="evenodd" />
            </svg></button>
        <form action="" method="post">
            <?php
            // $login = $_SESSION['name'];
            if (isset($_SESSION['name'])) {
            ?>

                <button class="Btn1" name="logout">

                    <div class="sign"><svg viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                        </svg>
                    </div>

                    <div class="text">Logout</div>

                </button>
            <?php
            } ?>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function openNav() {
            document.getElementById("sidebar").style.left = "0";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("main1").style.marginLeft = "250px";
            document.getElementById("open").style.visibility = "hidden";
            document.getElementById("sidebar").style.display = "block";
        }

        function closeNav() {
            document.getElementById("sidebar").style.left = "-250px";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("main1").style.marginLeft = "0";
            document.getElementById("open").style.visibility = "visible";

        }
    </script>
</body>

</html>
<?php
if (isset($_POST['logout'])) {
?>
    <script>
        window.location.href = "adlog.php";
    </script>
<?php

}
?>