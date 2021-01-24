<?php
header('Content-Type: application/json');
$objConnect = mysqli_connect("localhost","root","","mowing");

$strSQL = "SELECT * FROM booking where worker_id = 4";
$objQuery = mysqli_query($strSQL);
$resultArray = array();
while ($obResult = mysqli_fetch_assoc($objQuery)) {
	array_push($resultArray, $objQuery);
}
echo json_encode($resultArray);
?>