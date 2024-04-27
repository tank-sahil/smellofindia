<form action="" method="post">
    <input type="submit" name="sub" value="Click me">
</form>
<?php
if (isset($_POST["sub"])) {
?>
    <form action="" method="post">
        Enter ID : : <input type="text" name="pid" id="pid"><br>
        Enter Name : : <input type="text" name="pname" id="pname"><br>
        Enter Description <textarea name="des" id="des"></textarea><br>
        Enter Price : : <input type="number" name="ppri" id="ppri"><br>
        <input type="submit" name="sub2" value="Add DATA"><br>
    </form>
<?php
}
$id = $_POST["pid"];
$name = $_POST["pname"];
$des = $_POST["des"];
$pri = $_POST["ppri"];
if (isset($_POST["sub2"])) {
?>
    <table>
        <tr>
            <th>Product ID</th>
            <th>product Name</th>
            <th>Product Description</th>
            <th>Product Price</th>
        </tr>
        <tr>
            <td><?= $id ?></td>
            <td><?= $name ?></td>
            <td><?= $des ?></td>
            <td><?= $pri ?></td>
        </tr>
    </table>
<?php


}
$con = new mysqli("localhost", "root", "", "product");
if ($con) {

    // Create a Data base.
    // $db = "create database product";
    // $con->query($db);
    //Create a table
    // $table = "create table product (id int,name varchar(10),description varchar(30),price int)";
    // $con->query("$table");
    $insert = "insert into product values ($id,'$name','$des',$pri)";
    $con->query($insert);
} else {
    echo "MOye Moye";
}

?>

<style>
    table,
    td {
        border: 2px solid black;
    }
</style>