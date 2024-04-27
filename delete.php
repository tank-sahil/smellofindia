<?php

$id = $_REQUEST['id'];
$con = new mysqli("localhost", "root", "", "soi");

$del = "delete from item where sr='$id'";
if($con->query($del)){
    ?>
        <script>
            window.location.href = "addgujarati.php ";
        </script>
    <?php
}
?>