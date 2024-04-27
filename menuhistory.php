   <?php include('sidebar.php') ?>
   <div id="main1">
       <h2>Menu History</h2>
       <?php
        $sr = 0;
        if (isset($_POST['add'])) {
            $name = $_POST['item_name'];
            $des = $_POST['des'];
            $pri = $_POST['price'];
            $cat = $_POST['cat'];
            $file = $_POST['photo'];
            $sr = $sr + 1;
        }
        ?>
       <div class="w-100">
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
                       <td>Varaliyu</td>
                       <td>It is Make with All green and all Vegetables, It is Cooked with steem of water.</td>
                       <td>320 /-</td>
                       <td>Lunch</td>
                       <td>varaliyu.jpg</td>
                   </tr>

               </tbody>
               <tbody>
                   <tr>
                       <th scope="row">2</th>
                       <td>Kaju butter Masala</td>
                       <td>It is Make with kaju, Gravy ,Some dry Fruit. </td>
                       <td>210 /-</td>
                       <td>Dinner</td>
                       <td>Kaju-b-m.jpg</td>
                   </tr>

               </tbody>

           </table>
       </div>
   </div>
   <style>
       td,
       th {
           text-align: center;
       }
       .table{
        overflow: scroll;
       }
   </style>