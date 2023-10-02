<?php
  require("connection.php") ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editcatagory</title>
</head>
<body>
    <?php
         if(isset($_GET['id'])){
            $getid = $_GET['id'];

            $sql = "SELECT * FROM catagory WHERE catagory_id = $getid";
            $queary = $conn->query($sql);
            $data = mysqli_fetch_assoc($queary);

            $catagoryId =        $data["catagory_id"];
            $catagoryName =      $data['catagory_name'];
            $catagoryEntrydate = $data['catagory_entrydate'];
        }

        if(isset($_GET['catagory_name'])){

            $new_catagory_name     = $_GET['catagory_name'];
            $new_catagory_entrydate = $_GET['catagory_entrydate'];
            $new_id = $_GET['catagory_id'];

            $sql1 =   "UPDATE catagory SET
                      catagory_name = '$new_catagory_name',
                      catagory_entrydate = '$new_catagory_entrydate' WHERE catagory_id = '$new_id'";

            if ($conn->query($sql1) == TRUE ){
                echo 'Update Successfully';
            }else{
                echo 'Not Updated';
            }
        }
        
    ?>
    <form action="edit_catagory.php" method="GET">
        <input type="text" name="catagory_name" value="<?php echo $catagoryName ?>"><br><br>
        <input type="text" name="catagory_entrydate" value="<?php echo $catagoryEntrydate ?> "><br><br>
        <input type="text" name="catagory_id" value="<?php echo $catagoryId ?> ">
        <input type="submit" value="Update">
    </form>
</body>
</html>