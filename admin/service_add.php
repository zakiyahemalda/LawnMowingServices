<?php
include 'database.php';


/*if (isset($_POST['submit'])) 
{*/
	$description = $_POST['a'];
	$price = $_POST['b'];

	
	echo $description;
	echo "<br>";


	echo $price;
	echo "<br>";

	$mengantuk = mysqli_query($conn, "INSERT INTO service (description,price) VALUES ('$description','$price')");

	echo'<script language="javascript">';
      echo'alert ("New Service Added");';
      echo 'window.location.href = "service_price_update.php?username=$username"';
      echo'</script>';

mysqli_close ($conn);
/*
}*/



?>