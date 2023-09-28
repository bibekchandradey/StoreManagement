<?php
  require("connection.php") ;
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
       $sql = "SELECT * FROM catagory" ;
       $data = mysqli_fetch_assoc($queary);
       
    ?>
 </body>
 </html>