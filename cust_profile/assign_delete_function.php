<?php
			include 'database.php';

			if (isset($_GET['booking_id'])) {

				$booking_id = $_GET["booking_id"];
				
				echo $booking_id;
			
			
			
			$query = "DELETE FROM `booking` WHERE booking_id = '$booking_id'";
			
			$run_query=mysqli_query($conn,$query);

			if($run_query == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Delete Success");';
				echo 'window.location.href="booking_status.php?worker=$username";';
				echo '</script>';
			}else {
				echo '<script language="javascript">';
				echo 'alert("Delete Denied");';
				echo 'window.location.href="booking_status.php?worker=$username";';
				echo '</script>';
			}
			}

	mysqli_close($conn);
?>
