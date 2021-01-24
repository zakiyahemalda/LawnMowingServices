<?php
include "database.php";
$connectDb = mysqli_select_db($conn,'mowing');
/*include "joint_table.php";*/
  if (isset($_POST['update'])) {
  $username = $_POST['username'];
  $cust_name = $_POST['cust_name'];
  $cust_tel = $_POST['cust_tel'];
  $cust_email = $_POST['cust_email']; 
  $cust_id = $_POST['cust_id'];
  $sql = mysqli_query($conn,"UPDATE customer SET username = '".$username."', cust_name = '".$cust_name."', cust_tel = '".$cust_tel."', cust_email = '".$cust_email."' WHERE cust_id = '".$cust_id."'");
  /*$sqlupdate = ;*/
  if ($sql) {
    echo'<script language="javascript">';
    echo'alert ("Profile Updated");';
    echo 'window.location.href = "index.php?username=$username"';
    echo'</script>';
  } else{
    echo "Data not Updated";
  }
  mysqli_close($conn);
}
?>
