<?php
include "database.php";

$connectDb = mysqli_select_db($conn,'mowing');

/*include "joint_table.php";*/

  if (isset($_POST['booking_la'])) {

  $service_id = $_POST['service_id'];
  $booking_date = $_POST['booking_date'];
  $booking_time = $_POST['booking_time'];
  $booking_address = $_POST['booking_address']; 
  $longitude = $_POST['longitude'];
  $latitude = $_POST['latitude'];
  $booking_quantity = $_POST['booking_quantity'];

  $cust_id = $_POST['cust_id'];





  $sql = "INSERT INTO booking (booking_date, booking_time, booking_address, lng, lat, booking_quantity, service_id, cust_id) VALUES ('$booking_date', '$booking_time', '$booking_address', '$longitude', '$latitude', '$booking_quantity', '$service_id', '$cust_id');";
  $result = mysqli_query ($conn,$sql);

  // $sql = mysqli_query($conn,"INSERT INTO customer (cust_name, cust_email, cust_tel, username, password) VALUES ('$cust_name','$cust_email','$cust_tel','$username','$password')");


  $sql2 = "SELECT price FROM service WHERE service_id = '$service_id'";
  $result2 = mysqli_query ($conn,$sql2);
  $row2 = mysqli_fetch_array($result2);
  $price = $row2['price'];

  $sql3 = "SELECT booking_id FROM booking ORDER BY booking_id DESC";
  $result3 = mysqli_query ($conn,$sql3);
  $row3 = mysqli_fetch_array($result3);
  $booking_id = $row3['booking_id'];/*
  $booking_amount = $row3['booking_amount'];*/

 /* echo $booking_id;*/
  $booking_amount = ($booking_quantity*$price);

  $sql4 = "UPDATE booking SET booking_amount = '$booking_amount' WHERE booking_id = '$booking_id'";
  $resul4 = mysqli_query ($conn,$sql4);


 
   

 /* $sql = "INSERT INTO booking (booking_date, booking_time, booking_address, booking_quantity, service_id, cust_id) VALUES ('$booking_date', '$booking_time', '$booking_address', '$booking_quantity', '$service_id', '$cust_id');";*/
  /*$result = mysqli_query ($conn,$sql);*/

  // $sql = mysqli_query($conn,"INSERT INTO customer (cust_name, cust_email, cust_tel, username, password) VALUES ('$cust_name','$cust_email','$cust_tel','$username','$password')");


  /*$sql2 = "SELECT price FROM service WHERE service_id = '$service_id'";
  $result2 = mysqli_query ($conn,$sql2);
  $row2 = mysqli_fetch_array($result2);
  $price = $row2['price'];

  $sql3 = "SELECT booking_id FROM booking ORDER BY booking_id";
  $result3 = mysqli_query ($conn,$sql3);
  $row3 = mysqli_fetch_array($result3);
  $booking_id = $row3['booking_id'];


  $amount = ($quantity*$price);


  $sql4 = "INSERT INTO booking_detail (booking_id, quantity, amount) VALUES ('$booking_id', '$quantity', '$amount');";
  $resul4 = mysqli_query ($conn,$sql4);*/



  if($sql4)
  {
    echo'<script language="javascript">';
      echo'alert ("Booking success");';
      echo 'window.location.href = "booking.php?username=$username"';
      echo'</script>';
  

} else{
    echo'<script language="javascript">';
      echo'alert ("Booking Fail");';
      echo'</script>';
 }

 mysqli_close($conn);
}
?>
