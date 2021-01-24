<?php
			include 'database.php';
			include 'session.php';
			include ("connectdb.php");
			
			$query = "INSERT INTO service (serviceid, description, price) VALUES ('".$_POST['serviceid']."','".$_POST['description']."','".$_POST['price']."')";
			
			$run_query=mysqli_query($connection,$query);
			
			if(!empty($run_query))
			{ ?>
		
			<script>
			alert('Registration Successfull');
			window.location.href = "service_profile.php";
			</script>
			
			<?php
			
			} else {
				
			?>
				
			<script>
			alert('Registration Unsuccesful');
			window.location.href = "service_form.php";
			</script>
			<?php
			}
		
?>
