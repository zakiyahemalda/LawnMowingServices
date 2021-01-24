<?php
	require 'database.php';

	if(isset($_POST['register']))
	{
		$cust_name=$_POST['cust_name'];
		$cust_email=$_POST['cust_email'];
		$cust_tel=$_POST['cust_tel'];
		$username=$_POST['username'];
		$password=$_POST['password'];


	$sql = mysqli_query($conn,"SELECT * FROM worker WHERE username='$username'");
	$sql = mysqli_query($conn,"SELECT * FROM customer WHERE username='$username'");

	if (mysqli_num_rows($sql) > 1){
		echo '<script language="javascript">';
		echo 'alert("Please use another username");';
		echo 'window.location.href="login.php#toregister";';
		echo '</script>';
	}else{

		$sql = mysqli_query($conn,"INSERT INTO customer (cust_name, cust_email, cust_tel, username, password) VALUES ('$cust_name','$cust_email','$cust_tel','$username','$password')");

			echo '<script language="javascript">';
			echo 'alert("Registeration successful");';
			echo 'window.location.href="login.php#tologin";';
			echo '</script>';
	}
	$conn -> close();	
	}
?>