<?php

$id = $_REQUEST['id'];
$con = new mysqli("localhost", "root", "", "soi");

$del = "delete from slider where sr='$id'";
if($con->query($del)){
    ?>
        <script>
            window.location.href = "abute.php ";
        </script>
    <?php
}
?>