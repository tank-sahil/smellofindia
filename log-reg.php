<?php include('sidebar.php');
include('admin_session.php');
?>
<div id="main1">
    <h2>Login History</h2>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr No.</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>

            </tr>
        </thead>

        <tbody>
            <?php
            $con = new mysqli("localhost", "root", "", "soi");
            $sel = "select * from login";
            $result = $con->query($sel);

            while ($test = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?= $test['sr']; ?></td>
                    <td><?= $test['emil']; ?></td>
                    <td><?= $test['password']; ?></td>
                </tr>
            <?php
            }
            ?>


        </tbody>

    </table>

    <h2>Register History</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Sr no.</th>
                <th scope="col">Username</th>
                <th scope="col">Email id</th>
                <th scope="col">Role</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
            <?php

            $sele = "select * from reg1";
            $res = $con->query($sele);

            while ($data = mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                    <td><?=$data['sr']; ?></td>
                    <td><?=$data['un']; ?></td>
                    <td><?=$data['mail']; ?></td>
                    <td><?=$data['pass']; ?></td>
                    <td><?=$data['satus']; ?></td>
                </tr>
            <?php
            }


            ?>




        </tbody>

    </table>
</div>
<style>
    td,
    th {
        text-align: center;
    }
</style>