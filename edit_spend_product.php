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
          $sql = "SELECT * FROM spend_product WHERE spend_product_id = $getid";
          $queary = $conn->query($sql);
          $data = mysqli_fetch_assoc($queary);

          $spend_product_id =         $data["spend_product_id"];
          $spend_product_name =       $data["spend_product_name"];
          $spend_product_quentity =   $data["spend_product_quentity"];
          $spend_product_entry_date = $data["spend_product_entry_date"];
       }
       if (isset($_GET['spend_product_name'])) {
          $new_spend_product_name =       $_GET['spend_product_name'];
          $new_spend_product_quentity =   $_GET['spend_product_quentity'];
          $new_spend_product_entrydate =  $_GET['spend_product_entry_date'];
          $new_spend_product_id =         $_GET['spend_product_id'];
          

          $sql1 =   "UPDATE spend_product SET
                      spend_product_name =       '$new_spend_product_name',
                      spend_product_quentity =   '$new_spend_product_quentity',                       
                      spend_product_entry_date = '$new_spend_product_entrydate'
                      WHERE spend_product_id =   '$new_spend_product_id'";

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
        <select name="spend_product_name" id=""> 
            <?php
             while( $data2 = mysqli_fetch_array($quary2)){
               $product_id = $data2['product_id'];
               $product_name = $data2['product_name'];
               ?>
               <option value='<?php echo  $product_id;?>'
                  <?php 
                    if($product_id == $spen_product_id) {
                      echo 'selected' ;
                     } ?> > 
                  <?php echo $product_name; ?>  
               </option>
            <?php
             }
            ?>
            
        </select><br>
        
        spend Product quentity: <br>
        <input type="text" name="spend_product_quentity" value="<?php echo $spend_product_quentity ?>"><br><br>
        Product Entry Date:<br>
        <input type="text" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date ?>"><br><br>
        <input type="text" name="spend_product_id" value="<?php echo $spend_product_id ?>" hidden><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>