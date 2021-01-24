<?php
include "database.php";
$connectDb = mysqli_select_db($conn,'mowing');
/*include "joint_table.php";*/
  if (isset($_POST['update'])) {
  $username = $_POST['username'];
  $workername = $_POST['workername'];
  $telno = $_POST['telno'];
  $email = $_POST['email']; 
  $worker_id = $_POST['worker_id'];


  $sql2 = mysqli_query($conn,"UPDATE worker SET username = '".$username."', workername = '".$workername."', telno = '".$telno."', email = '".$email."' WHERE worker_id = '".$worker_id."'");
  /*$sqlupdate = ;*/
  if ($sql2) {
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
