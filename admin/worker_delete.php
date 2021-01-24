<?php
			include 'database.php';

			if (isset($_GET['worker_id'])) {

				$worker_id = $_GET["worker_id"];
			
			$query = "DELETE FROM `worker` WHERE worker_id = '$worker_id'";
			
			$run_query=mysqli_query($conn,$query);

			if($run_query == TRUE){
				echo '<script language="javascript">';
				echo 'alert("Resign Worker Deleted");';
				echo 'window.location.href="worker.php?worker=$username";';
				echo '</script>';
			}else {
				echo '<script language="javascript">';
				echo 'alert("Delete denied because worker still have job");';
				echo 'window.location.href="worker.php?worker=$username";';
				echo '</script>';
			}
			}

	mysqli_close($conn);
?>
