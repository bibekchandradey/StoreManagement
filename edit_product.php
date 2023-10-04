<?php
  require("connection.php") ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <?php
       if(isset($_GET["id"])){
          $getid = $_GET['id'];
          $sql = "SELECT * FROM product WHERE product_id = $getid";
          $queary = $conn->query($sql);
          $data = mysqli_fetch_assoc($queary);

          $productId =        $data["product_id"];
          $productName =      $data['product_name'];
          $productCatagory =  $data['product_catagory'];
          $productCode =      $data['product_code'];
          $productEntrydate = $data['product_entrydate'];
       }
       if (isset($_GET['product_name'])) {
          $new_product_name =       $_GET['product_name'];
          $new_product_catagory =   $_GET['product_catagory'];
          $new_product_code =       $_GET['product_code'];
          $new_product_entrydate =  $_GET['product_entrydate'];
          $new_id =                 $_GET['product_id'];
          

          $sql1 =   "UPDATE product SET
                      product_name =       '$new_product_name',
                      product_catagory =   '$new_product_catagory', 
                      product_code =       '$new_product_code',
                      product_entrydate =  '$new_product_entrydate'
                      WHERE product_id =   '$new_id'";

            if ($conn->query($sql1) == true ){
                echo "Update Successfully";
                
            }else{
                
                echo 'Not Updated';
            }
       }
    ?>
    <?php 
        $sql2 = "SELECT * FROM catagory";
        $quary2 = $conn->query($sql2);
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        Product: <br>
        <input type="text" name="product_name" value="<?php echo $productName ?>"><br><br>
        Product Catagory: <br>
        <select name="product_catagory" id=""> 
            <?php
             while( $data2 = mysqli_fetch_array($quary2)){
               $catagory_id = $data2['catagory_id'];
               $catagory_name = $data2['catagory_name'];
               ?>
               <option value='<?php echo $catagory_id ;?>'
                  <?php 
                    if($catagory_id == $productCatagory) {
                      echo 'selected' ;
                     } ?> > 
                  <?php echo $catagory_name; ?>  
               </option>
            <?php
             }
            ?>
            
        </select><br>
        
        Product Code: <br>
        <input type="text" name="product_code" value="<?php echo $productCode ?>"><br><br>
        Product Entry Date:<br>
        <input type="text" name="product_entrydate" value="<?php echo $productEntrydate ?>"><br><br>
        <input type="text" name="product_id" value="<?php echo $productId ?>" hidden><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>