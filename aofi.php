<?php
include_once('sidebar.php');

$con = new mysqli("localhost", "root", "", "soi");

$id1 = $_REQUEST['id1'];
$select = "select * from aofi where sr=$id1";
$res = $con->query($select);
$row = $res->fetch_assoc();

?>
<br>
<h2>Update Form</h2>
<br>
<form method="post" id="form">
    <div class="mb-3">
        <label for="" class="form-label">P1</label>
        <input type="text" class="form-control" id="p2" name="p1" value="<?= $row['p1'] ?>">
        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">P2</label>
        <input type="text" class="form-control" name="p2" id="p2" value="<?= $row['p2'] ?>">
        <span id="des-err"></span>
    </div>

    <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update1">
        <span class="actual-text">&nbsp;Update&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;Update&nbsp;</span>
    </button>

</form>
<?php


if (isset($_POST['update1'])) {

    $p1 = $_POST['p1'];
    $p2 = $_POST['p2'];
    $up = "UPDATE aofi SET p1='$p1',p2='$p2' where sr= $id1";

    $con->query($up);
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
                p1: {
                    required: true
                },
                p2: {
                    required: true
                }
            },
            messages: {
                p1: {
                    required: "Please enter P1"
                },
                p2: {
                    required: "Please enter P2"
                }
            },
            errorPlacement: function(error, element) {
                // Display error message next to the input field
                error.insertAfter(element);
            }
        });
    });
</script>