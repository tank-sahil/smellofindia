<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        /* === removing default button style ===*/

        .query {
            display: flex;
            justify-content: space-around;
        }

        @media screen and (max-width:1080px) {
            .query {
                display: flex;
                flex-direction: column;
            }
        }

        .final {
            overflow-x: auto;
            scrollbar-width: none;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <?php include('sidebar.php');
    include('admin_session.php');

    $con = new mysqli("localhost", "root", "", "soi");

    ?>

    <div id="main1">
        <div class="final">
            <h2>Category</h2><br><br>
            <div class="query">
                <form action="add_cat.php" method="post">
                    <button class="submitbtnofmenu" data-text="Awesome" name="add1">
                        <span class="actual-text">&nbsp;Add_Category&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Add_Category&nbsp;</span><br>
                    </button>
                </form><br>

                <br>
            </div>

            <br><br>
            <h3></h3>
            <?php
            if (isset($_POST['add1'])) {
            ?>
                <form action="add_cat.php" method="post" enctype="multipart/form-data" id="form">
                    <div class="mb-3">
                        <label for="" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name">
                        <span id="name-err"></span>
                    </div><br>
                    <div class="mb-3">
                        <label for="" class="form-label">Time</label>
                        <select class="form-control" name="time" id="time"> <!-- Add the name attribute here -->
                            <option value="select">Select</option>
                            <option value="breakfast">Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner">Dinner</option>
                        </select>
                        <span id="cat-err"></span>
                    </div>

                    <br>
                    <div class="mb-3">
                        <label for="" class="form-label">Image</label>
                        <input class="form-control" type="file" name="photo" id="photo">
                        <span id="pt-err"></span>
                    </div>


                    <button class="submitbtnofmenu" data-text="Awesome" name="add">
                        <span class="actual-text">&nbsp;Submit&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Submit&nbsp;</span>
                    </button>
                </form>
                <?php
            }
            if (isset($_POST['add'])) {
                $name = $_POST['cat_name'];
                $time = $_POST['time'];
                $img = $_FILES['photo']['name'];

                  // echo $name . $time . $img;
                $insert = "INSERT INTO `add_cat`(`id`, `cat_name`, `time`, `photo`) VALUES ('','$name','$time','$img')";

                if ($con->query($insert)) {
                    $imgup = "imgup/";
                    $target_file = $imgup . basename($_FILES["photo"]["name"]);
                    move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
                ?>
                    <script>
                        alert("Data Successfully Inserted");
                    </script>
            <?php
                } else {
                    echo "Error";
                }
            }
            ?>
            <div class="w-100"><br><br><br>
                <h2> Category History</h2>
                <br><br>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr no.</th>
                            <th scope="col">Catagory Name</th>
                            <th scope="col">Catagory Time</th>
                            <th scope="col">Catagory image</th>
                            <th scope="col">Action</th>
                            <!-- <th scope="col">Delete</th> -->

                        </tr>
                    </thead>
                    <?php
                    $con = new mysqli("localhost", "root", "", "soi");
                    $sele = "select * from add_cat";
                    $res = $con->query($sele);

                    while ($data = $res->fetch_assoc()) {
                    ?>
                        <tbody>
                            <tr>
                                <td><?= $data['id'] ?></td>
                                <td><?= $data['cat_name'] ?></td>
                                <td><?= $data['time'] ?></td>
                                <td><?= $data['photo'] ?></td>
                                <td><a href="cat_delete.php?id=<?php echo ($data['id']) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                                            <path fill="red" d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6zM8 9h8v10H8zm7.5-5l-1-1h-5l-1 1H5v2h14V4z" />
                                        </svg></a></td>
                            </tr>

                        </tbody>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#time').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Select') {
                $('#cat-err').text('Please select a valid time').show();
            } else {
                $('#cat-err').text('').hide();
            }
        });
        $('#form').validate({
            rules: {
                cat_name: {
                    required: true
                },
                photo: {
                    required: true,
                    extension: "jpg|jpeg|png|gif" // Specify the allowed file extensions
                }
            },
            messages: {
                cat_name: "Please enter category name",

                photo: {
                    required: "Please select an image",
                    extension: "Please upload only image files"
                }
            },
            submitHandler: function(form) {
                form.submit(); // Submit the form when it's valid
            }
        });
    });
</script>

</html>