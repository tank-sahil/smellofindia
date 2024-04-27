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
        .submitbtnofmenu {
            margin: 0;
            height: auto;
            background: transparent;
            padding: 0;
            border: none;
            cursor: pointer;
            color: darkgray;
        }

        /* submitbtnofmenu styling */
        .submitbtnofmenu {
            --border-right: 6px;
            --text-stroke-color: rgba(255, 255, 255, 0.6);
            --animation-color: black;
            --fs-size: 1.5em;
            letter-spacing: 3px;
            text-decoration: none;
            font-size: var(--fs-size);
            font-family: "Arial";
            position: relative;
            text-transform: uppercase;
            color: darkgray;
            -webkit-text-stroke: 1px var(--text-stroke-color);
        }

        /* this is the text, when you hover on button1 */
        .hover-text {
            position: absolute;
            box-sizing: border-box;
            /* content: attr(data-text); */
            color: var(--animation-color);
            width: 0%;
            inset: 0;
            border-right: var(--border-right) solid var(--animation-color);
            overflow: hidden;
            transition: 0.5s;
            /* font-size: var(--fs-size); */
            -webkit-text-stroke: 1px var(--animation-color);
        }

        /* hover */
        .submitbtnofmenu:hover .hover-text {
            width: 100%;
            filter: drop-shadow(0 0 23px var(--animation-color))
        }

        .update {
            background-color: white;
        }

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
    <?php include('sidebar.php'); ?>

    <div id="main1">
        <h2>Tamil Menu</h2><br><br>
        <div class="query">
            <div class="final">
                <form action="addtamil.php" method="post">
                    <button class="submitbtnofmenu" data-text="Awesome" name="add1">
                        <span class="actual-text">&nbsp;Add_Item&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Add_Item&nbsp;</span><br>
                    </button>
                </form>

                <form action="addtamil.php" method="post">
                    <button class="submitbtnofmenu" data-text="Awesome" name="add2">
                        <span class="actual-text">&nbsp;Update_Item&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Update_Item&nbsp;</span><br>
                    </button>
                </form>

                <form action="addtamil.php" method="post">
                    <button class="submitbtnofmenu" data-text="Awesome" name="add3">
                        <span class="actual-text">&nbsp;Delete_Item&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Delete_Item&nbsp;</span><br>
                    </button>
                </form>
            </div>
            <?php
            if (isset($_POST['add1'])) {

            ?>
                <br><br>
                <h3>Add Item</h3>
                <form action="addtamil.php" method="post" onsubmit="return valid()" id="form">
                    <div class="mb-3">
                        <label for="" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="item_name" name="item_name">
                        <span id="name-err"></span>
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
                    </div><br>
                    <div class="mb-3">
                        <label for="" class="form-label">Item Image</label>
                        <input class="form-control" type="file" name="photo" id="photo">
                        <span id="pt-err"></span>
                    </div>


                    <button class="submitbtnofmenu" data-text="Awesome" name="add">
                        <span class="actual-text">&nbsp;Submit&nbsp;</span>
                        <span aria-hidden="true" class="hover-text">&nbsp;Submit&nbsp;</span>
                    </button>
                <?php } else {
            } ?>

                </form>
                <?php
                if (isset($_POST['add2'])) {
                ?>
                    <br><br>
                    <h3>Update Item</h3>
                    <form action="addtamil.php" method="post" onsubmit="return updatevalid()" id="form">
                        <div class="mb-3">
                            <label for="" class="form-label">Sr No. (You want to update field)</label>
                            <input type="text" class="form-control" id="usrno" name="usrno">
                            <span id="usrerr"></span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Item Name</label>
                            <input type="text" class="form-control" id="item_name" name="item_name">
                            <span id="name-err"></span>
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
                        </div><br>
                        <div class="mb-3">
                            <label for="" class="form-label">Item Image</label>
                            <input class="form-control" type="file" name="photo" id="photo">
                            <span id="pt-err"></span>
                        </div>


                        <button class="submitbtnofmenu" data-text="Awesome" name="add">
                            <span class="actual-text">&nbsp;Update&nbsp;</span>
                            <span aria-hidden="true" class="hover-text">&nbsp;Update&nbsp;</span>
                        </button>
                    </form>
                <?php } ?>

                <?php
                if (isset($_POST['add3'])) {
                ?>
                    <br><br>
                    <h3>Delete Item</h3>
                    <form action="addtamil.php" method="post" onsubmit="return devalid()" id="form">
                        <div class="mb-3">
                            <label for="" class="form-label">Sr No. (You want to Delete field)</label>
                            <input type="text" class="form-control" id="usrno" name="usrno">
                            <span id="usr-err"></span>
                        </div>

                        <button class="submitbtnofmenu" data-text="Awesome" name="add">
                            <span class="actual-text">&nbsp;Delete&nbsp;</span>
                            <span aria-hidden="true" class="hover-text">&nbsp;Delete&nbsp;</span>
                        </button>
                    </form>
                <?php } ?>
                <!-- Menu History -->
                <div class="w-100"><br><br><br>
                    <h2>Tamil Menu History</h2>
                    <br><br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sr no.</th>
                                <th scope="col">Item-name</th>
                                <th scope="col">Item-Description</th>
                                <th scope="col">Item-Price</th>
                                <th scope="col">Item-Category</th>
                                <th scope="col">Item-image</th>
                                <!-- <th scope="col">Delete</th> -->

                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Lameon Rice</td>
                                <td>Lameon as its main ingredients,this dish also has onion , tometo and curry Leaves.</td>
                                <td>220 /-</td>
                                <td>Lunch</td>
                                <td>lrice.jpg</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>

</html>

<script>
    function valid() {

        var name = document.getElementById('item_name').value;
        var des = document.getElementById('des').value;
        var pri = document.getElementById('price').value;
        var cat = document.getElementById('cat').value;
        var pt = document.getElementById('photo').value;



        if (name == "") {
            document.getElementById('name-err').innerHTML = "Item-Name Field Requried.";
            document.getElementById('name-err').style.color = "red";
        } else {
            var name_match = /^[a-zA-Z]+$/;
            if (name_match.test(name)) {
                document.getElementById('name-err').innerHTML = "";
                var despass = true;
            } else {
                document.getElementById('name-err').innerHTML = "Enter Proper Item- name";
                document.getElementById('name-err').style.color = "red";
                var despass = false;

            }
        }

        if (des == "") {
            document.getElementById('des-err').innerHTML = "Item-Description Field Requried.";
            document.getElementById('des-err').style.color = "red";
        } else {
            var des_match = /^[a-zA-Z0-9 .,()]+$/;
            if (des_match.test(des)) {
                document.getElementById('des-err').innerHTML = "";
                var npass = true;
            } else {
                document.getElementById('des-err').innerHTML = "Enter Proper Item-Description.";
                document.getElementById('des-err').style.color = "red";
                var npass = false;

            }
        }

        if (pri == "") {
            document.getElementById('pri-err').innerHTML = "Item-Price Field Requried.";
            document.getElementById('pri-err').style.color = "red";
        } else {
            var pri_match = /^[0-9]+$/;
            if (pri_match.test(pri)) {
                document.getElementById('pri-err').innerHTML = "";
                var pripass = true;
            } else {
                document.getElementById('pri-err').innerHTML = "Enter Proper Item-Price.";
                document.getElementById('pri-err').style.color = "red";
                var pripass = false;

            }
        }

        if (cat == "select") {
            document.getElementById('cat-err').innerHTML = "Item-Category Field Requried.";
            document.getElementById('cat-err').style.color = "red";
        } else {
            document.getElementById('cat-err').innerHTML = "";
            var catpass = true;
        }

        // if (pt == "") {
        //     document.getElementById('pt-err').innerHTML = "Item-Image Field Requried.";
        //     document.getElementById('pt-err').style.color = "red";
        // } else {
        //     <?php
                //     $file_type = $_FILES['photo']['type'];
                //     $file_size = $_FILES['photo']['size'];

                //     if ($file_type == "image/jpeg" || $file_type == "image/png" && $file_size == "200000") {
                //     
                ?>
        //         document.getElementById('pt-err').innerHTML = "";
        //         var photopass = true;

        //     <?php


                //     } else {
                //     
                ?>
        //         document.getElementById('pt-err').innerHTML = "Item-Image Field Requried.";
        //         document.getElementById('pt-err').style.color = "red";
        //         var photopass = false;

        //     <?php

                //     }



                //     
                ?>
        // }



        if (npass == true && despass == true && pripass == true && catpass == true && photopass == true) {
            return true;
        } else {
            return false;
        }
    }


    function updatevalid() {

        var name = document.getElementById('item_name').value;
        var des = document.getElementById('des').value;
        var pri = document.getElementById('price').value;
        var cat = document.getElementById('cat').value;
        var pt = document.getElementById('photo').value;
        var sr = document.getElementById('usrno').value;



        if (name == "") {
            document.getElementById('name-err').innerHTML = "Item-Name Field Requried.";
            document.getElementById('name-err').style.color = "red";
        } else {
            var name_match = /^[a-zA-Z]+$/;
            if (name_match.test(name)) {
                document.getElementById('name-err').innerHTML = "";
                var despass = true;
            } else {
                document.getElementById('name-err').innerHTML = "Enter Proper Item- name";
                document.getElementById('name-err').style.color = "red";
                var despass = false;

            }
        }

        if (des == "") {
            document.getElementById('des-err').innerHTML = "Item-Description Field Requried.";
            document.getElementById('des-err').style.color = "red";
        } else {
            var des_match = /^[a-zA-Z0-9 .,()]+$/;
            if (des_match.test(des)) {
                document.getElementById('des-err').innerHTML = "";
                var npass = true;
            } else {
                document.getElementById('des-err').innerHTML = "Enter Proper Item-Description.";
                document.getElementById('des-err').style.color = "red";
                var npass = false;

            }
        }

        if (pri == "") {
            document.getElementById('pri-err').innerHTML = "Item-Price Field Requried.";
            document.getElementById('pri-err').style.color = "red";
        } else {
            var pri_match = /^[0-9]+$/;
            if (pri_match.test(pri)) {
                document.getElementById('pri-err').innerHTML = "";
                var pripass = true;
            } else {
                document.getElementById('pri-err').innerHTML = "Enter Proper Item-Price.";
                document.getElementById('pri-err').style.color = "red";
                var pripass = false;

            }
        }

        if (cat == "select") {
            document.getElementById('cat-err').innerHTML = "Item-Category Field Requried.";
            document.getElementById('cat-err').style.color = "red";
        } else {
            document.getElementById('cat-err').innerHTML = "";
            var catpass = true;
        }

        if (sr == "") {
            document.getElementById('usrerr').innerHTML = "Sr - no Field Requried.";
            document.getElementById('usrerr').style.color = "red";
        } else {
            var sr_match = /^[0-9]+$/;
            if (sr_match.test(sr)) {
                document.getElementById('usrerr').innerHTML = "";
                var srpass = true;
            } else {
                document.getElementById('usrerr').innerHTML = "Enter Only Digits.";
                document.getElementById('usrerr').style.color = "red";
                var srpass = false;

            }
        }


        if (npass == true && despass == true && pripass == true && catpass == true) {
            return true;
        } else {
            return false;
        }
    }

    function devalid() {
        var sr = document.getElementById('usrno').value;

        if (sr == "") {
            document.getElementById('usr-err').innerHTML = "Sr - no Field Requried.";
            document.getElementById('usr-err').style.color = "red";
        } else {
            var sr_match = /^[0-9]+$/;
            if (sr_match.test(sr)) {
                document.getElementById('usr-err').innerHTML = "";
                var srpass = true;
            } else {
                document.getElementById('usr-err').innerHTML = "Enter Only Digits.";
                document.getElementById('usr-err').style.color = "red";
                var srpass = false;

            }
        }
        if (srpass == true) {
            return true;
        } else {
            return false;
        }
    }
</script>