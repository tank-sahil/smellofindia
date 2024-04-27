<?php

include_once('sidebar.php');
$con = new mysqli("localhost", "root", "", "soi");
$id = $_REQUEST['id'];
$select = "select * from item where sr=$id";
$res = $con->query($select);
$row = $res->fetch_assoc();
?>
<form method="post" id="form">
    <div class="mb-3">
        <label for="" class="form-label">Item-name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $row['name'] ?>">
        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Item-Description</label>
        <input type="text" class="form-control" id="des" name="des" value="<?= $row['des'] ?>">
        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Item-Price</label>
        <input type="text" class="form-control" id="price" name="price" value="<?= $row['price'] ?>">
        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Item-Time</label>
        <select class="form-control" name="cat" id="cat">
            <option value="select">Select</option>
            <option value="breakfast">Breakfast</option>
            <option value="lunch">Lunch</option>
            <option value="dinner">Dinner</option>
        </select>
        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Item-Category</label>
        <select class="form-control" name="cat1" id="cat1">
            <option value="select">Select</option>
            <option value="Gujarati">Gujarati</option>
            <option value="Punjabi">Punjabi</option>
            <option value="Tamil">Tamil</option>
            <option value="Drinks">Drinks</option>
        </select>

        <span id="name-err"></span>
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Item-image</label>
        <input type="file" class="form-control" id="file" name="file">
        <span id="name-err"></span>
    </div>

    <button class="submitbtnofmenu" type="submit" data-text="Awesome" name="update">
        <span class="actual-text">&nbsp;Update&nbsp;</span>
        <span aria-hidden="true" class="hover-text">&nbsp;Update&nbsp;</span>
    </button>

</form>

<?php

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $des = $_POST['des'];
    $pri = $_POST['price'];
    $cat = $_POST['cat'];
    $cat1 = $_POST['cat1'];
    $file = $_FILES['file']['name'];

    $up = "UPDATE item SET time='$cat', typeoffood='$cat1', name='$name', des='$des', price='$pri', photo='$file' WHERE sr = $id";

    if ($con->query($up)) {
        echo "Done";
        $imgup = "imgup/";
        $target_file = $imgup . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
    } else {
        echo "Moye Moye";
    }

?>
    <script>
        window.location.href = "addgujarati.php";
    </script>
<?php
}
?>

<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                name: {
                    required: true
                },
                des: {
                    required: true
                },
                price: {
                    required: true,
                    number: true
                },
                cat: {
                    required: true
                },
                cat1: {
                    required: true
                },
                file: {
                    required: true,
                    extension: "jpg|jpeg|png|gif" // Specify the allowed file extensions
                }
            },
            messages: {
                name: "Please enter item name",
                des: "Please enter item description",
                price: {
                    required: "Please enter item price",
                    number: "Please enter a valid number"
                },
                cat: "Please select item time",
                cat1: "Please select item category",
                file: {
                    required: "Please select item image",
                    extension: "Please upload only image files"
                }
            },
            submitHandler: function(form) {
                form.submit(); // Submit the form when it's valid
            }
        });
    });
</script>