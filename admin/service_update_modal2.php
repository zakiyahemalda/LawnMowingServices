<?php
include "database.php";

$connectDb = mysqli_select_db($conn,'mowing');

/*include "joint_table.php";*/

  if (isset($_POST['update'])) {
  $price = $_POST['price'];
  $service_id = $_POST['service_id'];

  $sql = mysqli_query($conn,"UPDATE service SET price = '".$price."' WHERE service_id = '".$service_id."'");
  /*$sqlupdate = ;*/

  if ($sql) {
    echo'<script language="javascript">';
    echo 'alert("Price Updated");';
    echo 'window.location.href="service_price_update.php?worker=$username";';
    echo'</script>';
  } else{
    echo "Data not Updated";
  }
  mysqli_close($conn);
}

?>



