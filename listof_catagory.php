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
       $queary = $conn->query($sql);
       echo "<table border ='1'>  <tr><th>Catagory</th><th>Entry Date</th><th>Action</th> </tr>";
      
       while ($data = mysqli_fetch_assoc($queary)){
          $catagoryId = $data["catagory_id"];
          $catagoryName = $data["catagory_name"];
          $catagoryEntry = $data["catagory_entrydate"];

         echo "<tr>
                  <td>$catagoryName</td> 
                  <td>$catagoryEntry</td> 
                  <td><a href='edit_catagory.php?id=$catagoryId' >Edit</a></td>
               </tr>";
       }
      echo "</table>";
    ?>
 </body>
 </html>