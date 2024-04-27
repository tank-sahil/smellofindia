<?php

include_once('sidebar.php');
$con = new mysqli("localhost", "root", "", "soi");

$id = $_REQUEST['id'];
$select = "select * from indexe where sr=$id";
$res = $con->query($select);
$row = $res->fetch_assoc();

?>
<br>
<h2>Update Form</h2>
<br>
<form method="post" id="form">
    <div class="mb-3">
        <label for="" class="form-label">H3</label>
        <input type="text" class="form-control" id="h3" name="h3" value="<?= $row['h3'] ?>">
        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">H1</label>
        <input type="text" class="form-control" name="h1" id="h1" value="<?= $row['h1'] ?>">
        <span id="des-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">P</label>
        <input type="text" class="form-control" name="p" id="p" value="<?= $row['p'] ?>">
        <span id="pri-err"></span>
    </div>
    <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update">
        <span class="actual-text">&nbsp;Update&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;Update&nbsp;</span>
    </button>

</form>
<?php


if (isset($_POST['update'])) {
    $h3 = $_POST['h3'];
    $h1 = $_POST['h1'];
    $p = $_POST['p'];

    $up = "UPDATE indexe SET h3='$h3',h1='$h1',p='$p' where sr= $id";


    if ($con->query($up)) {
        echo "Done";
    } else {
        echo "Moye Moye";
    }

?>
    <script>
        window.location.href = "indexe.php";
    </script>
<?php
}
?>
<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                h3: {
                    required: true
                },
                h1: {
                    required: true
                },
                p: {
                    required: true
                }
            },
            messages: {
                h3: {
                    required: "Please enter H3"
                },
                h1: {
                    required: "Please enter H1"
                },
                p: {
                    required: "Please enter P"
                }
            },
            errorPlacement: function(error, element) {
                // Display error message next to the input field
                error.insertAfter(element);
            }
        });
    });
</script>