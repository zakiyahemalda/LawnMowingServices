<?php
	if(isset($_POST["success"]))
	{
		$phone = $_POST["phonenumber"];
		$booking_id = $_POST["booking_id"];
		$cust_name = $_POST["cust_name"];

		$sms = "RM0.00 Hi Admin. Payment has been transferred to your account. Please check your account.
		Customer name : ".$cust_name." 
		Booking id : ".$booking_id."";
		sendNotify("60189880605", $sms);
		echo'<script language="javascript">';
      echo'alert ("We will get to your request as soon as possible");';
      echo 'window.location.href = "booking_status.php?username=$username"';
      echo'</script>';

		/*header("location: booking_status.php");*/
	}

function sendNotify($phone, $sms) 

	{

	$url = 'https://api.esms.com.my/sms/send';
	// $sms = $_POST['phonenumber'];
	$data = array('user' => 'faizal', 
	'pass' => 'student123', 
	'to' => '60189880605', 
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