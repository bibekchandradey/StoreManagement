<?php
  require("connection.php") ;
  $sql1 = "SELECT * FROM product";
        $quary1 = $conn->query($sql1);
        
        $data_list = array();
        while ($data1 = mysqli_fetch_array($quary1)) {
            $store_id = $data1['product_id'];
            $store_name = $data1['product_name'];
            $data_list[$store_id] = $store_name;
        }
        
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of catagory</title>
 </head>
 <body>
    <?php 
       $sql = "SELECT * FROM store_product" ;
       $queary = $conn->query($sql);
       echo "<table border ='1'>  <tr><th>Name</th><th>Quentity</th><th>Entry Date</th><th>Action</th> </tr>";
      
       while ($data = mysqli_fetch_assoc($queary)){
          $store_product_id =         $data["store_product_id"];
          $store_product_name =       $data["store_product_name"];
          $store_product_quentity =   $data["store_product_quentity"];
          $store_product_entry_date = $data["store_product_entry_date"];

         echo "<tr>
                  <td> $data_list[$store_product_id]</td> 
                  <td>$store_product_quentity</td> 
                  <td>$store_product_entry_date</td>
                  <td><a href='edit_store_product.php?id=$store_product_id ' >Edit</a></td>
               </tr>";
       }
      echo "</table>";
    ?>
 </body>
 </html>