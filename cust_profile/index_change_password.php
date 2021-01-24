<?php
include 'database.php';
$connectDb = mysqli_select_db($conn,'mowing');

if (isset($_POST['change'])) {
	$oldPass = $_POST['oldPass'];
	$newPass = $_POST['newPass'];
	$renewPass = $_POST['renewPass'];
	$cust_id = $_POST['cust_id'];

	$change = mysqli_query($conn, "SELECT * FROM customer WHERE cust_id = '$cust_id'");
	$row = mysqli_fetch_array($change);
	$data = $row['password'];

	if ($data == $oldPass) {
		if ($newPass == $renewPass) {
			 $sql = "UPDATE customer SET password = '$newPass' WHERE cust_id = '$cust_id'";

			 if (mysqli_query($conn, $sql)) {
			 	echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
			 } else{
			 	echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
			 }
		} else {
			echo "<script>alert('Your new and Current Password is not match'); window.location='index.php'</script>";
		}
	}
}
?>