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
          $sql = "SELECT * FROM store_product WHERE store_product_id = $getid";
          $queary = $conn->query($sql);
          $data = mysqli_fetch_assoc($queary);

          $store_product_id =         $data["store_product_id"];
          $store_product_name =       $data["store_product_name"];
          $store_product_quentity =   $data["store_product_quentity"];
          $store_product_entry_date = $data["store_product_entry_date"];
       }
       if (isset($_GET['store_product_name'])) {
          $new_store_product_name =       $_GET['store_product_name'];
          $new_store_product_quentity =   $_GET['store_product_quentity'];
          $new_store_product_entrydate =  $_GET['store_product_entry_date'];
          $new_store_product_id =         $_GET['store_product_id'];
          

          $sql1 =   "UPDATE store_product SET
                      store_product_name =       '$new_store_product_name',
                      store_product_quentity =   '$new_store_product_quentity',                       
                      store_product_entry_date = '$new_store_product_entrydate'
                      WHERE store_product_id =   '$new_store_product_id'";

            if ($conn->query($sql1) == true ){
                echo "Update Successfully";
                
            }else{
                
                echo 'Not Updated';
            }
       }
    ?>
    <?php 
        $sql2 = "SELECT * FROM product";
        $quary2 = $conn->query($sql2);
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        Product: <br>
        <select name="store_product_name" id=""> 
            <?php
             while( $data2 = mysqli_fetch_array($quary2)){
               $product_id = $data2['product_id'];
               $product_name = $data2['product_name'];
               ?>
               <option value='<?php echo  $product_id;?>'
                  <?php 
                    if($product_id == $store_product_id) {
                      echo 'selected' ;
                     } ?> > 
                  <?php echo $product_name; ?>  
               </option>
            <?php
             }
            ?>
            
        </select><br>
        
        Store Product quentity: <br>
        <input type="text" name="store_product_quentity" value="<?php echo $store_product_quentity ?>"><br><br>
        Product Entry Date:<br>
        <input type="text" name="store_product_entry_date" value="<?php echo $store_product_entry_date ?>"><br><br>
        <input type="text" name="store_product_id" value="<?php echo $store_product_id ?>" hidden><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>