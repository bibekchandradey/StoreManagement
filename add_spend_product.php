<?php
  require("connection.php");
  require("myFunctio.php");
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <?php
        if(isset($_GET['spend_product_name'])){
            $spend_product_name = $_GET['spend_product_name'];
            $spend_product_quentity = $_GET['spend_product_quentity'];
            $spend_product_entry_date = $_GET['spend_product_entry_date'];
            $sql = "INSERT INTO spend_product(spend_product_name,spend_product_quentity,  spend_product_entry_date)
                    VALUES('$spend_product_name', '$spend_product_quentity', '$spend_product_entry_date')";

            if($conn->query($sql) == true){
                echo "Data Submited";
            }else{
                echo "Data Send fail";
            }
        }
    ?>
 

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
       
         Product : <br>
        <select name="spend_product_name" id=""> 
            <?php
                data_list('product', 'product_id', 'product_name');
            ?>
            
        </select><br>
        
        Product Quentity: <br>
        <input type="text" name="spend_product_quentity"><br><br>
        Store  Entry Date:<br>
        <input type="date" name="spend_product_entry_date"><br><br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>