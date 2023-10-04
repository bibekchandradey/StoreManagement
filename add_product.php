<?php
  require("connection.php") ;
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
        if(isset($_GET['product_name'])){
            $product_name = $_GET['product_name'];
            $product_catagory = $_GET['product_catagory'];
            $product_code = $_GET['product_code'];
            $product_entrydate = $_GET['product_entrydate'];
            $sql = "INSERT INTO product(product_name,product_catagory, product_code, product_entrydate)
                    VALUES('$product_name', '$product_catagory', '$product_code', '$product_entrydate')";

            if($conn->query($sql) == true){
                echo "Data Submited";
            }else{
                echo "Data Send fail";
            }
        }
    ?>
    <?php 
        $sql = "SELECT * FROM catagory";
        $quary = $conn->query($sql);
        $data = mysqli_fetch_array($quary);
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
        Product: <br>
        <input type="text" name="product_name"><br><br>
        Product Catagory: <br>
        <select name="product_catagory" id=""> 
            <?php
             while( $data = mysqli_fetch_array($quary)){
               $catagory_id = $data['catagory_id'];
               $catagory_name = $data['catagory_name'];
               echo "<option value='$catagory_id'> $catagory_name </option>";
             }
            ?>
            
        </select><br>
        
        Product Code: <br>
        <input type="text" name="product_code"><br><br>
        Product Entry Date:<br>
        <input type="date" name="product_entrydate"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>