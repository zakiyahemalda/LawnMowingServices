<?php
include "database.php";

/*$connectDb = mysqli_select_db($conn,'mowing');*/

/*include "joint_table.php";*/

  if (isset($_POST['success'])) {
  $worker_id = $_POST['worker_id'];
  $booking_id = $_POST['booking_id'];
  $phone = $_POST['telno'];
  $workername = $_POST['workername'];

  // $sql = "SELECT * FROM worker";
  $tioi = "UPDATE booking SET worker_id='$worker_id' WHERE booking_id='$booking_id'";

  // $a = mysqli_query($conn, $tioi);
  if(mysqli_query($conn, $tioi)){

    $sms = "RM0.00 Hi ".$workername.", you've got task to do. Please check using our system immediately. Thank you";

    sendAssign($phone, $sms);

    //header("location: assign.php");

    echo'<script language="javascript">';
      echo'alert ("Assign to mower");';
      echo 'window.location.href = "assign.php?username=$username"';
      echo'</script>';
  } else{
    echo'<script language="javascript">';
      echo'alert ("Not Assign");';
      echo 'window.location.href = "service_landscape_update.php"';
      echo'</script>';
  } 
  // mysqli_close($conn);
}

function sendAssign($phone, $sms) {
    $url = 'https://api.esms.com.my/sms/send';
    // $sms = $_POST['phonenumber'];

    $data = array('user' => 'faizal', 
        'pass' => 'student123', 
        'to' => $phone, 
        'msg' => $sms);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded; charset=utf-8",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if ($result === FALSE) { /* Handle error */ }

    var_dump($result);
}

?>