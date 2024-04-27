<?php
include('sidebar.php');
include('admin_session.php');


$con = new mysqli("localhost", "root", "", "soi");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div id="main1">
        <h2>Edit About Page</h2>
        <br><br>
        <form action="abute.php" method="post">
            <button class="submitbtnofmenu" data-text="Awesome" name="add1">
                <span class="actual-text">&nbsp;Add_Images&nbsp;</span>
                <span aria-hidden="true" class="hover-text">&nbsp;Add_Images&nbsp;</span><br>
            </button>
        </form>
        <?php
        if (isset($_POST['add1'])) {


        ?>
            <form method="post" id="form" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="i1" class="form-label">Image</label>
                    <input type="file" class="form-control" name="i1" id="i1">
                </div>
                <button class="submitbtnofmenu" data-text="Awesome" name="add">
                    <span class="actual-text">&nbsp;Submit&nbsp;</span>
                    <span aria-hidden="true" class="hover-text">&nbsp;Submit&nbsp;</span><br>
                </button>
            </form>
        <?php
        }
        ?>
        <table class="table">
            <h3>Slider</h3>

            <thead>
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">Images</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $res = $con->query("select * from slider");
            while ($row = $res->fetch_assoc()) {
            ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['sr']; ?></td>
                        <td><img src="upload/<?php echo $row['i1'] ?>" alt=""></td>
                        <td><a href="delete_i.php?id=<?php echo ($row['sr']) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                                    <path fill="red" d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                                </svg></a></td>
                    </tr>
                <?php
            }
                ?>
                </tbody>
        </table>
        <br>
        <table class="table"><br>
            <h3>Text</h3><br>
            <thead>
                <th scope="col">Sr No.</th>
                <th scope="col">Heading</th>
                <th scope="col">Paragraph</th>
                <th scope="col">Action</th>
            </thead>
            <?php
                $sel = "select * from abute";
                $res = $con->query($sel);
                $data = $res->fetch_assoc();
            ?>
            <tbody>
                <td><?= $data['sr'] ?></td>
                <td><?= $data['head'] ?></td>
                <td><?= $data['par'] ?></td>
                <td><a href="edit_abute.php?id= <?php echo ($data['sr']) ?> "><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                            <path fill="blue" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                        </svg> </a></td>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php

if (isset($_POST['add'])) {
    $file = $_FILES['i1']['name'];
    $temp = $_FILES["i1"]["tmp_name"];
    $path = "upload/" . $file;
    move_uploaded_file($temp, $path);

    $con->query("INSERT INTO `slider`(`i1`) VALUES ('$file')");

?>
    <script>
        window.location.href = "abute.php";
    </script>
<?php
}

?>