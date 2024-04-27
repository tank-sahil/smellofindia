
<?php
include_once("guest_header.php");
$con = new mysqli("localhost","root","","soi");
$em = $_REQUEST['em'];
$token = $_REQUEST['token'];

// echo $em;
// echo $token;

$q = "select * from reg1 where mail='$em' and token='$token'";
// $result = mysqli_query($con, $q);
$result = $con->query($q);
$count = mysqli_num_rows($result);


    while ($row = mysqli_fetch_array($result)) {
        $status = $row[6];
        if ($status == "active") {

            $_SESSION['success'] = "Account is already activated";
        } else {
            $updt = "update reg1 set `satus`='active' where mail='$em' and token='$token'";
            if (mysqli_query($con, $updt)) {
                setcookie('success', "Activation activated successfully", time() + 2, "/");
            } else {
                setcookie('error', "Error in activating Account. Please try again later.", time() + 2, "/");
            }
        }
?>
        <script>
            window.location.href = "login.php";
        </script>
    <?php
    }
?>
