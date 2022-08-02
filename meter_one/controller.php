<?php
  include_once 'connection.php';
  if(isset($_POST['submit']))
  {    
       $units = $_POST['units_trans'];
       $meter_number = $_POST['meter_number'];
       $sql = "INSERT INTO meter_one (units_trans,meter_number)
       VALUES ('$units','$meter_number')";
       if (mysqli_query($conn, $sql)) {
          echo "New record has been added successfully !";
       } else {
          echo "Error: " . $sql . ":-" . mysqli_error($conn);
       }
       mysqli_close($conn);
  }
  

?>