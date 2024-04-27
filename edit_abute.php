<?php

$id = $_REQUEST['id'];
include_once('sidebar.php');
$con = new mysqli("localhost", "root", "", "soi");

$id = $_REQUEST['id'];
$select = "select * from abute where sr=$id";
$res = $con->query($select);
$row = $res->fetch_assoc();

?>
<br>
<div id="main1">
    <h2>Update Form</h2><br>


    <form method="post" id="form">

        <div class="mb-3">
            <label for="" class="form-label">H3</label>
            <input type="text" class="form-control" id="h3" name="h3" value="<?= $row['head'] ?>">
            <span id="name-err"></span>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">H1</label>
            <input type="text" class="form-control" name="h1" id="h1" value="<?= $row['par'] ?>">
            <span id="des-err"></span>
        </div>

        <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update">
            <span class="actual-text">&nbsp;Update&nbsp;</span>
            <span aria-hidden="true" class="hover-text">&nbsp;Update&nbsp;</span>
        </button>

    </form>
</div>
<?php


if (isset($_POST['update'])) {
    $h3 = $_POST['h3'];
    $h1 = $_POST['h1'];

    $up = "UPDATE abute SET head='$h3',par='$h1' where sr= $id";


    if ($con->query($up)) {
        echo "Done";
    } else {
        echo "Moye Moye";
    }

?>
    <script>
        window.location.href = "abute.php";
    </script>
<?php
}
?>

?>