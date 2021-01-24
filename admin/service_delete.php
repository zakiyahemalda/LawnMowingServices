<?php
			include 'database.php';

			$service_id = $_GET["service_id"];

			
			$query = "DELETE FROM service WHERE service_id = '$service_id'";
			
			$run_query=mysqli_query($conn,$query);
			
			if($run_query == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Delete Success");';
				echo 'window.location.href="service_price_update.php?worker=$username";';
				echo '</script>';
			}else {
				echo '<script language="javascript">';
				echo 'alert("Delete Fail");';/*
				echo 'window.location.href="index.php";';*/
				echo '</script>';
	} mysqli_close($conn);
?>
