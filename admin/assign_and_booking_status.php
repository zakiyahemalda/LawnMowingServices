<?php
include 'database.php';
/*if (isset($_POST['success'])) {
 	$booking_id = $_POST ['booking_id'];

 	$query = "UPDATE booking SET booking_status = 1 WHERE booking_id = '$booking_id'";
 	$query2 = mysqli_query($conn,$query);

 	if ($query2) {
 		echo'<script language="javascript">';
      echo'alert ("Booking Accepted");';
      echo 'window.location.href = "assign.php?username=$username"';
      echo'</script>';
 	}};*/


 	if (isset($_POST['fail'])) {
 		$booking_id = $_POST ['booking_id'];
 		$habis = "UPDATE booking SET booking_status= 2 WHERE booking_id = '$booking_id'";
 		$query3 = mysqli_query($conn,$habis);

 		if ($query3) {
 		echo'<script language="javascript">';
      echo'alert ("Booking Declined");';
      echo 'window.location.href = "assign.php?username=$username"';
      echo'</script>';
 	}
 	};

 	if(isset($_POST["success"])){
   
       $phone = $_POST["phonenumber"];
       $booking_id = $_POST ['booking_id'];
       $name = $_POST["cust_name"];

      $query = "UPDATE booking SET booking_status = 1 WHERE booking_id = '$booking_id'";
      $query2 = mysqli_query($conn,$query);

      if ($query2) {
      $sms = "RM0.00 Hi ".$name.", your booking for lawn mowing service has been approved. Please make a payment within 24 hours after you receive this message. Thank you.";
   
      sendApproved($phone, $sms);
      echo'<script language="javascript">';
      echo'alert ("Booking Accepted");';
      echo 'window.location.href = "assign.php?username=$username"';
      echo'</script>';


  }}
   if(isset($_POST["unsuccess"])){
   
       $phone = $_POST["phonenumber"];
       $booking_id = $_POST ['booking_id'];
       $name = $_POST["cust_name"];

       $habis = "UPDATE booking SET booking_status= 2 WHERE booking_id = '$booking_id'";
       $query3 = mysqli_query($conn,$habis);

    if ($query3) {
      $sms = "RM0.00 Hi ".$name.", your booking for lawn mowing service has been declined. Please cancel your existing booking. Thank you";
      
      sendDisapproved($phone, $sms);
      echo'<script language="javascript">';
      echo'alert ("Booking Declined");';
      echo 'window.location.href = "assign.php?username=$username"';
      echo'</script>';
  }}
   
    function sendApproved($phone, $sms) {
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
   
   function sendDisapproved($phone, $sms) {
       $url = 'https://api.esms.com.my/sms/send';
   
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