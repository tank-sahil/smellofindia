<?php
if(!isset($_SESSION['emil']))
{
    ?>
    <script>
        alert("You are Not Able to do any Activity \n\n Please Login")
        window.location.href = "login.php";
    </script>
    <?php
}