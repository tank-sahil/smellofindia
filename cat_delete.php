<?php

$id = $_REQUEST['id'];
$con = new mysqli("localhost", "root", "", "soi");

$del = "delete from add_cat where id='$id'";
if($con->query($del)){
    ?>
        <script>
            window.location.href = "add_cat.php ";
        </script>
    <?php
}
?>