<?php
  require("connection.php") ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add catagory</title>
</head>
<body>
    <?php
        if(isset($_GET['catagory_name'])){
            $catagory_name = $_GET['catagory_name'];
            $catagory_entrydate = $_GET['catagory_entrydate'];
            $sql = "INSERT INTO catagory(catagory_name,catagory_entrydate)
                    VALUES('$catagory_name', '$catagory_entrydate')";

            if($conn->query($sql) == true){
                echo "Data Submited";
            }else{
                echo "Data Send fail";
            }
        }
    ?>
    <form action="add_catagory.php" method="GET">\
        <input type="text" name="catagory_name"><br><br>
        <input type="date" name="catagory_entrydate"><br><br>
        <input type="submit" value="submit">
    </form>
</body>
</html>