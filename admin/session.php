<?php
include 'database.php';

session_start();
if (isset($_SESSION['username'])){
	$username = $_SESSION['username'];
} else {
	header('Location: logout.php');
}
?>

<?php
include 'database.php';

$run= mysqli_query($conn,"SELECT * FROM worker WHERE username = '$username'");
    while ($row=mysqli_fetch_array($run))
    {
     $worker_id=$row['worker_id'];
    }
?>
