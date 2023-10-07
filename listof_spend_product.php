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
    <title>List of Spend Product</title>
 </head>
 <body>
    <?php 
       $sql = "SELECT * FROM spend_product" ;
       $queary = $conn->query($sql);
       echo "<table border ='1'>  <tr><th>Name</th><th>Quentity</th><th>Entry Date</th><th>Action</th> </tr>";
      
       while ($data = mysqli_fetch_assoc($queary)){
          $spend_product_id =         $data["spend_product_id"];
          $spend_product_name =       $data["spend_product_name"];
          $spend_product_quentity =   $data["spend_product_quentity"];
          $spend_product_entry_date = $data["spend_product_entry_date"];

         echo "<tr>
                  <td> $data_list[$spend_product_id]</td> 
                  <td>$spend_product_quentity</td> 
                  <td>$spend_product_entry_date</td>
                  <td><a href='edit_spend_product.php?id=$spend_product_id ' >Edit</a></td>
               </tr>";
       }
      echo "</table>";
    ?>
 </body>
 </html>