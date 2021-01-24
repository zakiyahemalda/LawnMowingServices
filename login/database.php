<?php

	$conn = new mysqli('localhost', 'root', '', 'mowing');
	if ($conn -> connect_error){
		die("Connection failed : " . $connect_error);
	}else{
		/*echo ("connection successfully");
		echo "<br>";
		echo "<br>";*/
	}
?>