<?php
  require("connection.php") ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Users</title>
</head>
<body>
    <?php
       if(isset($_GET["id"])){
          $getid = $_GET['id'];
          $sql = "SELECT * FROM users WHERE users_id = $getid";
          $queary = $conn->query($sql);
          $data = mysqli_fetch_assoc($queary);

          $users_id =          $data["users_id"];
          $users_first_name =  $data["users_first_name"];
          $users_last_name =   $data["users_last_name"];
          $users_email =       $data["users_email"];
       }
       if (isset($_GET['users_first_name'])) {
          $new_users_id =          $_GET["users_id"];
          $new_users_first_name =  $_GET["users_first_name"];
          $new_users_last_name =   $_GET["users_last_name"];
          $new_users_email =       $_GET["users_email"];

          $sql1 =   "UPDATE users SET
                      users_first_name =  '$new_users_first_name',
                      users_last_name =   '$new_users_last_name',                       
                      users_email =       '$new_users_email'
                      WHERE users_id =    '$new_users_id'";

            if ($conn->query($sql1) == true ){
                echo "Update Successfully";
                
            }else{
                
                echo 'Not Updated';
            }
       }
    ?>
    <?php 
        $sql2 = "SELECT * FROM users";
        $quary2 = $conn->query($sql2);
    ?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
       
       First Name : <br>
       <input type="text" name="users_first_name" value='<?php echo $users_first_name; ?>'><br><br>  
       Last Name: <br>
       <input type="text" name="users_last_name " value='<?php echo $users_last_name; ?>'><br><br>
       Email:<br>
       <input type="email" name="users_email" value='<?php echo $users_email; ?> '><br><br>
       Password:<br>
       <input type="password" name="users_password" value='<?php echo $users_password; ?>'><br><br>
       <input type="text" name="users_id" value='<?php echo $users_id; ?>' hidden><br><br>
       <input type="submit" value="Update">
   </form>
</body>
</html>