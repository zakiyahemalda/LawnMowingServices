<?php
require 'database.php';
session_start();

if (isset($_SESSION["username"])) {
	echo '<h3> Login Success, welcome - '.$_SESSION["username"].'</h3>';
	echo '<br /><br /><a href="logout.php">Logou</a>';
}else{
	header("location:login.php");
}
?>