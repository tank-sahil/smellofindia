<?php

include_once('sidebar.php');
$con = new mysqli("localhost", "root", "", "soi");

$id1 = $_REQUEST['id2'];
$select = "SELECT * FROM slider WHERE sr=$id1";
$res = $con->query($select);
$row = $res->fetch_assoc();

if (isset($_POST['update1'])) {
    $i1 = $_FILES['i1']['name'];
    $i2 = $_FILES['i2']['name'];
    $i3 = $_FILES['i3']['name'];

    // File upload path
    $targetDir = "upload/";

    // Handle file 1 upload
    if (!empty($i1)) {
        $i1TargetFile = $targetDir . basename($_FILES["i1"]["name"]);
        move_uploaded_file($_FILES["i1"]["tmp_name"], $i1TargetFile);
    } else {
        $i1 = $row['i1']; // If no new file is uploaded, retain the existing file name
    }

    // Handle file 2 upload
    if (!empty($i2)) {
        $i2TargetFile = $targetDir . basename($_FILES["i2"]["name"]);
        move_uploaded_file($_FILES["i2"]["tmp_name"], $i2TargetFile);
    } else {
        $i2 = $row['i2']; // If no new file is uploaded, retain the existing file name
    }

    // Handle file 3 upload
    if (!empty($i3)) {
        $i3TargetFile = $targetDir . basename($_FILES["i3"]["name"]);
        move_uploaded_file($_FILES["i3"]["tmp_name"], $i3TargetFile);
    } else {
        $i3 = $row['i3']; // If no new file is uploaded, retain the existing file name
    }

    // Update query
    $updateQuery = "UPDATE slider SET i1='$i1', i2='$i2', i3='$i3' WHERE sr=$id1";

    if ($con->query($updateQuery) === TRUE) {
        ?>
        <script>
            window.location.href = "abute.php";
        </script>
        <?php
    } else {
        echo "Error updating record: " . $con->error;
    }

    ?>
    <!-- <script>
        window.location.href(indexe.php);
    </script> -->
    <?php
}
?>

<br>
<h2>Update Form</h2>
<br>
<form method="post" id="form" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="i1" class="form-label">Image 1</label>
        <input type="file" class="form-control" name="i1" id="i1">
    </div>
    <div class="mb-3">
        <label for="i2" class="form-label">Image 2</label>
        <input type="file" class="form-control" name="i2" id="i2">
    </div>
    <div class="mb-3">
        <label for="i3" class="form-label">Image 3</label>
        <input type="file" class="form-control" name="i3" id="i3">
    </div>

    <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update1">
        <span class="actual-text">&nbsp;Update&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;Update&nbsp;</span>
    </button>
</form>
