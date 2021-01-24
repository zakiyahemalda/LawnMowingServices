<?php
include "database.php";

$connectDb = mysqli_select_db($conn,'mowing');

/*include "joint_table.php";*/

  if (isset($_POST['success'])) {
  $price = $_POST['price'];

  $sql = mysqli_query($conn, "UPDATE service SET price = '$price' WHERE description = 'Mowing'");

  if ($sql){
    echo'<script language="javascript">';
      echo'alert ("Price Updated");';
      echo 'window.location.href = "service_price_update.php"';
      echo'</script>';
  } else{
    echo'<script language="javascript">';
      echo'alert ("Price not update");';
      echo 'window.location.href = "service_landscape_update.php"';
      echo'</script>';
  } 
  /*mysqli_close($conn);*/
}


?>
