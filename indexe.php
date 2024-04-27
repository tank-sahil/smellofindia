<?php

include_once('sidebar.php');

include('admin_session.php');

$con = new mysqli("localhost", "root", "", "soi");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="button.css">
</head>

<body><br><br>

    <?php
    ?>
    <div class="w-100" id="main1">
        <h2> Edit Index Page </h2>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">H3</th>
                    <th scope="col">H1</th>
                    <th scope="col">P</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $res =  $con->query("select * from indexe");
                while ($row = $res->fetch_assoc()) {
                ?>

                    <tr>
                        <td>1</td>
                        <td><?= $row['h3']; ?></td>
                        <td><?= $row['h1']; ?></td>
                        <td><?= $row['p']; ?></td>

                        <td><a href="edit_index.php?id=<?= $row['sr']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                                    <path fill="blue" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                                </svg> </a></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">Image 1</th>
                    <th scope="col">Image 2</th>
                    <th scope="col">Image 3</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <?php

            $res2 =  $con->query("select * from imgofi ");
            while ($row2 = $res2->fetch_assoc()) {
            ?>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td><img src="upload/<?= $row2['i1'] ?>" alt=""></td>
                        <td><img src="upload/<?= $row2['i2'] ?>" alt=""></td>
                        <td><img src="upload/<?= $row2['i3'] ?>" alt=""></td>
                        <td><a href="imgofi.php?id2=<?= $row2['sr']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                                    <path fill="blue" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                                </svg> </a></td>
                    </tr>
                </tbody>
            <?php
            }
            ?>
        </table>

        <br><br>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr no.</th>
                    <th scope="col">P</th>
                    <th scope="col">P</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $res1 =  $con->query("select * from aofi ");
                while ($row1 = $res1->fetch_assoc()) {
                ?>

                    <tr>
                        <td>1</td>
                        <td><?= $row1['p1']; ?></td>
                        <td><?= $row1['p2']; ?></td>
                        <td> <a href="aofi.php?id1=<?= $row1['sr']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                                    <path fill="blue" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                                </svg> </a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>

<script>
    $(document).ready(function() {
        $('#form').validate({
            rules: {
                sr: {
                    required: true,
                    digits: true
                },
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
                sr: {
                    required: "Please enter a serial number",
                    digits: "Please enter only digits"
                },
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
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>