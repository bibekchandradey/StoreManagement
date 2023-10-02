<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db_name = "store_db" ;
    
     $conn = new mysqli($hostname,$username,$password, $db_name);

     if($conn){
        
     }
     else{
        echo "Not ok";
     }
?>