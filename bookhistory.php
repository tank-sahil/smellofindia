   <?php include('sidebar.php');
   include('admin_session.php');
   ?>
   <div id="main1"><br>
       <br>
       <div class="query">
           <h3>All bookings</h3>
           <br>
           <table class="table">
               <thead>

                   <tr>
                       <th scope="col">Sr no.</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col">Customer Email id</th>
                       <th scope="col">Customer Date</th>
                       <th scope="col">Customer Time</th>
                       <th scope="col">Customer Phone no.</th>
                   </tr>
               </thead>

               <tbody>
                   <tr>
                       <?php
                    $con = new mysqli("localhost", "root", "", "soi");

                        $sel = ("select * from allbook");
                        $res = $con->query($sel);
                        while ($row = $res->fetch_assoc()) {
                        ?>
                           <td><?= $row['sr'] ?></td>
                           <td><?= $row['name'] ?></td>
                           <td><?= $row['mail'] ?></td>
                           <td><?= $row['date'] ?></td>
                           <td><?= $row['time'] ?></td>
                           <td><?= $row['phone'] ?></td>

                   </tr>
               <?php
                        }
                ?>
               </tbody>
           </table>

           <br>
           <h3>New bookings</h3>
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col">Sr no.</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col">Customer Email id</th>
                       <th scope="col">Customer Date</th>
                       <th scope="col">Customer Time</th>
                       <th scope="col">Customer Phone no.</th>
                       <th scope="col">Action</th>
                   </tr>
               </thead>

               <tbody>
                   <?php
                    $sel = ("select * from book");
                    $res = $con->query($sel);
                    while ($row = $res->fetch_assoc()) {
                    ?>
                       <td><?= $row['sr'] ?></td>
                       <td><?= $row['name'] ?></td>
                       <td><?= $row['mail'] ?></td>
                       <td><?= $row['date'] ?></td>
                       <td><?= $row['time'] ?></td>
                       <td><?= $row['phone'] ?></td>
                       <form action="" method="post">
                           <td><a href="right.php?sr=<?= $row['sr'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 15 15">
                                       <path fill="none" stroke="green" d="M4 7.5L7 10l4-5" />
                                   </svg></a></td>

                           <td><a href="wrong.php?sr=<?= $row['sr'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" viewBox="0 0 24 24">
                                       <path fill="none" stroke="red" stroke-linecap="round" stroke-width="1.5" d="m8.464 15.535l7.072-7.07m-7.072 0l7.072 7.07" />
                                   </svg></a></td>
                       </form>
               </tbody>
           <?php
                    }
            ?>
           </table>
           <br>
           <h3>Accept bookings</h3>
           <br>
           <table class="table">
               <thead>

                   <tr>
                       <th scope="col">Sr no.</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col">Customer Email id</th>
                       <th scope="col">Customer Date</th>
                       <th scope="col">Customer Time</th>
                       <th scope="col">Customer Phone no.</th>
                   </tr>
               </thead>

               <tbody>
                   <tr>
                       <?php
                        $sel = ("select * from acc_book");
                        $res = $con->query($sel);
                        while ($row = $res->fetch_assoc()) {
                        ?>
                           <td><?= $row['sr'] ?></td>
                           <td><?= $row['name'] ?></td>
                           <td><?= $row['mail'] ?></td>
                           <td><?= $row['date'] ?></td>
                           <td><?= $row['time'] ?></td>
                           <td><?= $row['phone'] ?></td>

                   </tr>
               <?php
                        }
                ?>
               </tbody>
           </table>
           <br>
           <h3>Reject Bookings</h3>
           <br>
           <table class="table">
               <thead>
                   <tr>
                       <th scope="col">Sr no.</th>
                       <th scope="col">Customer Name</th>
                       <th scope="col">Customer Email id</th>
                       <th scope="col">Customer Date</th>
                       <th scope="col">Customer Time</th>
                       <th scope="col">Customer Phone no.</th>
                   </tr>
               </thead>

               <tbody>

                   <tr>
                       <?php
                        $sel = ("select * from rej");
                        $res = $con->query($sel);
                        while ($row = $res->fetch_assoc()) {
                        ?>
                           <td><?= $row['sr'] ?></td>
                           <td><?= $row['name'] ?></td>
                           <td><?= $row['mail'] ?></td>
                           <td><?= $row['date'] ?></td>
                           <td><?= $row['time'] ?></td>
                           <td><?= $row['phone'] ?></td>

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

           thead {
               overflow: scroll;
           }

           .query {
               overflow-x: auto;
               scrollbar-width: none;
           }
       </style>