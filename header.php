<?php
session_start();

?>
<html>
<header>
    <title>

    </title>
    <!-- <link rel="stylesheet" href="header.css"> -->
    <!-- <link rel="stylesheet" href="bootstrap.bundle.min.js">
    <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="header.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        nav {
            width: 100%;
            /* background-color: aqua; */
            justify-content: space-around;
            align-items: center;
            display: flex;
            padding: 5px 5px 5px;
            font-size: larger;
        }

        .logo {
            display: flex;
            align-items: center;

        }

        .logo h6 {
            float: left;
            shape-outside: circle();
            font-size: large;
        }

        .logo>img {
            padding: 0;
            border-radius: 50%;
            height: 100px;
            width: 100px;
        }

        .menu a,
        .menu1 a {
            text-decoration: none;
            color: #433;
            padding: 10px 20px;
            transition: all 0.30s ease-in;

        }

        .menu a:hover {
            padding: 21px;
            font-size: xx-large;
            transition: all 0.30s ease-out;
        }

        .menu1 a:hover {
            font-size: xx-large;
            transition: all 0.30s ease-out;
        }

        .ulmenu {
            display: flex;
            list-style: none;
        }

        .but>h4>a {
            background-color: #433;
            color: white;
            padding: 10px;
            text-transform: uppercase;
            transition: all 0.45s linear;
            text-decoration: none;
        }

        .but:hover,
        .but1:hover {

            transition: all 0.45s linear;
            transform: rotate(5deg) scale(1.2);
        }

        .sidebar {
            position: fixed;
            top: 0;
            right: 0;
            height: 100vh;
            color: black;
            width: 100%;
            z-index: 999;
            background-color: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(30px);
            display: none;
            flex-direction: column;
            align-items: center;

        }

        .ulmenu1 {
            list-style: none;
            font-size: large;
            padding: 30px 30px;
        }

        .svg {
            display: none;
        }

        @media screen and (max-width:1080px) {

            .menu,
            .but {
                display: none;
            }

            .svg {
                display: flex;
            }
        }

                  
    </style>
</header>

<body>
    <!-- <header class="container"> -->


    <header>
        <nav>
            <div class="logo"><img src="images/logo-removebg-preview.png" alt="">
                <h6>|| SMELL OF INDIA ||</h6>
            </div>
            <div class="menu">
                <ul class="ulmenu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about.php">About us</a></li>
                    <?php
                    $con = new mysqli("localhost", "root", "", "soi");
                    // $se =;
                    // echo $se; 
                    // $_SESSION['emil'];
                    // $se = $_SESSION['emil'];

                    if (isset($_SESSION['emil'])) {
                    ?>

                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="profile.php">Profile</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="login.php">Login / Register</a></li>

                    <?php
                    }
                    ?>
                </ul>

            </div>
            <div class="but">
                <h4><a href="book.php">book now</a></h4>
            </div>
            <li class="svg" onclick="show()" style="transition: all 5s ease-out;">
                <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40">
                    <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" class="svg" />
                </svg>
            </li>
        </nav>
        <hr>
        <div class="sidebar">
            <div class="menu1">
                <ul class="ulmenu1">
                    <li onclick="hide()" style="transition: all 5s ease-in;"><a href="#"> <svg xmlns="http://www.w3.org/2000/svg" height="35" viewBox="0 -960 960 960" width="35">
                                <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
                            </svg></a>
                    </li>
                    <br><br>

                    <li><a href="index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about.php">About us</a></li>
                    <?php
                    $con = new mysqli("localhost", "root", "", "soi");
                    // echo $se;

                    if (isset($_SESSION['emil'])) {
                    ?>

                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="profile.php">Profile</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="login.php">Login / Register</a></li>

                    <?php
                    }
                    ?>
                </ul>

            </div>
            <div class="but1">
                <h4>
                    <a href="login.php">BOOK</a>
                </h4>
            </div>
        </div>

    </header>
</body>

</html>