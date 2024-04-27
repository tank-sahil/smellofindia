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

            .mb-3 span {
                color: red;
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
                <h2> Menu</h2><br><br>
                <div class="query">
                    <form action="addgujarati.php" method="post">
                        <button class="submitbtnofmenu" data-text="Awesome" name="add1">
                            <span class="actual-text">&nbsp;Add_Item&nbsp;</span>
                            <span aria-hidden="true" class="hover-text">&nbsp;Add_Item&nbsp;</span><br>
                        </button>
                    </form><br>

                    <br>
                </div>

                <br><br>
                <h3>Add Item</h3>
                <?php
                if (isset($_POST['add1'])) {
                ?>
                    <form action="addgujarati.php" method="post" enctype="multipart/form-data" id="form">
                        <div class="mb-3">
                            <label for="" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name">
                            <span id="name-err" style="color:red" ></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Item Description</label>
                            <input type="text" class="form-control" name="des" id="des">
                            <span id="des-err"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Item Price</label>
                            <input type="number" class="form-control" name="price" id="price">
                            <span id="pri-err"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>
                            <select class="form-control" name="cat" id="cat">
                                <option value="select">Select</option>
                                <option value="breakfast">Breakfast</option>
                                <option value="lunch">Lunch</option>
                                <option value="dinner">Dinner</option>
                            </select>
                            <span id="cat-err"></span>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="" class="form-label">Type of Food</label>
                            <select class="form-control" name="cat1" id="cat1">
                                <option value="select">Select</option>
                                <?php
                                $sel = "select DISTINCT cat_name from add_cat ";
                                $res = $con->query($sel);
                                while ($row = $res->fetch_assoc()) {

                                ?>
                                    <option value="<?php echo $row['cat_name'] ?>"><?php echo $row['cat_name'] ?></option>

                                <?php
                                }
                                ?>
                            </select>
                            <span id="cat1-err"></span>
                        </div>

                        <br>
                        <div class="mb-3">
                            <label for="" class="form-label">Item Image</label>
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
                    $name = $_POST['item_name'];
                    $des = $_POST['des'];
                    $price = $_POST['price'];
                    $cat = $_POST['cat'];
                    $cat1 = $_POST['cat1'];
                    $img = $_FILES['photo']['name'];

                    echo $cat;
                    echo $cat1;

                    $insert = "INSERT INTO `item`(`sr`, `time`, `typeoffood`, `name`, `des`, `price`, `photo`) VALUES ('','$cat','$cat1','$name','$des','$price','$img')";

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
                    <h2> Menu History</h2>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr no.</th>
                                <th scope="col">Item-name</th>
                                <th scope="col">Item-Description</th>
                                <th scope="col">Item-Price</th>
                                <th scope="col">Item-Time</th>
                                <th scope="col">Item-Category</th>
                                <th scope="col">Item-image</th>
                                <th scope="col">Action</th>
                                <!-- <th scope="col">Delete</th> -->

                            </tr>
                        </thead>
                        <?php
                        $con = new mysqli("localhost", "root", "", "soi");
                        $sele = "select * from item";
                        $res = $con->query($sele);

                        while ($data = $res->fetch_assoc()) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $data['sr'] ?></td>
                                    <td><?= $data['name'] ?></td>
                                    <td><?= $data['des'] ?></td>
                                    <td><?= $data['price'] ?></td>
                                    <td><?= $data['time'] ?></td>
                                    <td><?= $data['typeoffood'] ?></td>
                                    <td><?= $data['photo'] ?></td>
                                    <td><a href="edit_item.php?id= <?php echo ($data['sr']) ?> "><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
                                                <path fill="blue" d="m14.06 9l.94.94L5.92 19H5v-.92zm3.6-6c-.25 0-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29m-3.6 3.19L3 17.25V21h3.75L17.81 9.94z" />
                                            </svg> </a></td>
                                    <td><a href="delete.php?id=<?php echo ($data['sr']) ?>"><svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 24 24">
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

    </html>

    <script>
        $(document).ready(function() {
            $('#form').submit(function(event) {
                var isValid = true;

                // Validate item name
                var itemName = $('#item_name').val().trim();
                if (itemName === '') {
                    $('#name-err').text('Please enter item name');
                    isValid = false;
                } else {
                    $('#name-err').text('');
                }

                // Validate item description
                var itemDescription = $('#des').val().trim();
                if (itemDescription === '') {
                    $('#des-err').text('Please enter item description');
                    isValid = false;
                } else {
                    $('#des-err').text('');
                }

                // Validate item price
                var itemPrice = $('#price').val().trim();
                if (itemPrice === '') {
                    $('#pri-err').text('Please enter item price');
                    isValid = false;
                } else {
                    $('#pri-err').text('');
                }

                // Validate category
                var category = $('#cat').val();
                if (category === 'select') {
                    $('#cat-err').text('Please select a category');
                    isValid = false;
                } else {
                    $('#cat-err').text('');
                }

                // Validate type of food
                var typeOfFood = $('#cat1').val();
                if (typeOfFood === 'select') {
                    $('#cat1-err').text('Please select a type of food');
                    isValid = false;
                } else {
                    $('#cat1-err').text('');
                }

                // Validate item image
                var itemImage = $('#photo').val();
                if (itemImage === '') {
                    $('#pt-err').text('Please select an item image');
                    isValid = false;
                } else {
                    $('#pt-err').text('');
                }

                if (!isValid) {
                    event.preventDefault(); // Prevent form submission if validation fails
                }
            });
        });
    </script>