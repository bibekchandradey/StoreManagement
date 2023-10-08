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
       $sql = "SELECT * FROM users" ;
       $queary = $conn->query($sql);
       echo "<table border ='1'>  <tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Action</th> </tr>";
      
       while ($data = mysqli_fetch_assoc($queary)){
          $users_id =         $data["users_id"];
          $users_first_name =       $data["users_first_name"];
          $users_last_name =   $data["users_last_name"];
          $users_email = $data["users_email"];
         echo "<tr>
                  
                  <td> $users_first_name</td> 
                  <td> $users_last_name</td>
                  <td> $users_email</td> 
                  <td><a href='edit_users.php?id=$users_id ' >Edit</a></td>
               </tr>";
       }
      echo "</table>";
    ?>
 </body>
 </html>