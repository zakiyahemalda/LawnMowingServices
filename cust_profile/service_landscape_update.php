<?php
include "database.php";

$connectDb = mysqli_select_db($conn,'mowing');

/*include "joint_table.php";*/

  if (isset($_POST['success'])) {

  $price = $_POST['price'];

  $sql = mysqli_query($conn, "SELECT price FROM service WHERE price = 'Landscape'");

  $res = mysqli_query($sql);

  if ($res){
    echo'<script language="javascript">';
      echo'alert ("Price Updated");';
      echo 'window.location.href = "service_price_update.php"';
      echo'</script>';
  } else{
    echo'<script language="javascript">';
      echo'alert ("Price not update");';
      echo 'window.location.href = "service_price_update.php"';
      echo'</script>';
  } 
  /*mysqli_close($conn);*/
}


?>
