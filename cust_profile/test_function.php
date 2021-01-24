<?php
include "database.php";
$connectDb = mysqli_select_db($conn,'mowing');
/*include "joint_table.php";*/
  if (isset($_POST['update'])) {

    $booking_id = $_POST['booking_id'];
    $payment_status = $_POST['payment_status'];

   /* echo $booking_id;
    echo "<br>";
    echo $payment_status;*/
  
  $sql = mysqli_query($conn,"UPDATE booking SET payment_status = '1' WHERE booking_id = '".$booking_id."'");
  /*$sqlupdate = ;*/
  if ($sql) {
    echo'<script language="javascript">';
      header("Location:index.php?username=$username");
      echo "Thank You";
      echo'</script>';
  } else{
    echo "Data not Updated";
  }
  mysqli_close($conn);
}
?>