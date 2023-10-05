<?php 
     function data_list($table, $colum1, $colum2){
        require("connection.php");
        $sql = "SELECT * FROM $table";
        $quary = $conn->query($sql);
        
        while( $data = mysqli_fetch_array($quary) ){
          $data_id = $data[$colum1];
          $data_name = $data[$colum2];
          echo "<option value='$data_id'> $data_name </option>";
        }
      }
?>