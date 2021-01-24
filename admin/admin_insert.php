<?php
			include 'database.php';

			if (isset($_POST['Submit'])) 
			{
				
				$workername = $_POST['workername'];
				$address = $_POST['address'];
				$telno = $_POST['telno'];
				$email = $_POST['email'];
				$staff_role = $_POST['staff_role'];
				$username = $_POST['username'];
				$password = $_POST['password'];

			$sql = mysqli_query($conn, "SELECT * FROM worker WHERE username='$username'");
			$sql = mysqli_query($conn, "SELECT * FROM customer WHERE username='$username'");

			if (mysqli_num_rows($sql) > 1) {
				echo '<script language="javascript">';
				echo 'alert("Please use another username");';
				echo 'window.location.href="admin_form.php?username=$username";';
				echo '</script>';
			}else {
				$sql = mysqli_query($conn, "INSERT INTO worker (workername,address,telno,email,staff_role,username,password) VALUES ('$workername','$address','$telno','$email','$staff_role','$username','$password')");

				echo '<script language="javascript">';
				echo 'alert("Registeration successful");';
				echo 'window.location.href="admin_form.php?username=$username";';
				echo '</script>';
			}
			$conn -> close();
			}
?>
