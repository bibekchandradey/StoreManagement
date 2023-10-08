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
        if(isset($_GET['users_first_name'])){
            $users_first_name = $_GET['users_first_name'];
            $users_last_name =  $_GET['users_last_name'];
            $users_email =      $_GET['users_email'];
            $users_password =   $_GET['users_password'];
            $sql = "INSERT INTO users(users_first_name,users_last_name,  users_email,users_password )
                    VALUES('$users_first_name', '$users_last_name', '$users_email','$users_password')";

            if($conn->query($sql) == true){
                echo "Data Submited";
            }else{
                echo "Data Send fail";
            }
        }
    ?>
 

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
       
        First Name : <br>
        <input type="text" name="users_first_name"><br><br>  
        Last Name: <br>
        <input type="text" name="users_last_name"><br><br>
        Email:<br>
        <input type="email" name="users_email"><br><br>
        Password:<br>
        <input type="password" name="users_password"><br><br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>