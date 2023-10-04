<?php
  require("connection.php") ;
  $sql1 = "SELECT * FROM catagory";
        $quary1 = $conn->query($sql1);
        
        $data_list = array();
        while ($data1 = mysqli_fetch_array($quary1)) {
            $catagory_id = $data1['catagory_id'];
            $catagory_name = $data1['catagory_name'];
            $data_list[$catagory_id] = $catagory_name;
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
       $sql = "SELECT * FROM product" ;
       $queary = $conn->query($sql);
       echo "<table border ='1'>  <tr><th>Name</th><th>Code</th><th>Catagory</th><th>Action</th> </tr>";
      
       while ($data = mysqli_fetch_assoc($queary)){
          $productId = $data["product_id"];
          $productName = $data["product_name"];
          $productCode = $data["product_code"];
          $productCatagory = $data["product_catagory"];

         echo "<tr>
                  <td>$productName</td> 
                  <td>$productCode</td> 
                  <td>$data_list[$productCatagory]</td>
                  <td><a href='edit_product.php?id=$productId ' >Edit</a></td>
               </tr>";
       }
      echo "</table>";
    ?>
 </body>
 </html>