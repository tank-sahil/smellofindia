<?php
if(!isset($_SESSION['name']))
{
    ?>
    <script>
        alert("You are Not Able to do any Activity \n\n Please Login")
        window.location.href = "bhai/login.php";
    </script>
    <?php
}