<?php
include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</head> 
<body> 
<style>
	#checkoutsteps {list-style: none; margin: 0; padding: 0;}
#checkoutsteps li {font-size: small; display: inline; color: #aaa; padding: 0 10px; border-right: 1px solid #999;}
#checkoutsteps li.currentstep {color: #000;}
#checkoutsteps li.last {border-right: none;}
.shopping-cart {width: 100%; border-top: 1px solid #C3C3C3; border-right: 1px solid #C3C3C3; clear: both;}
.shopping-cart th {background: #F0F0F0;}
.shopping-cart th, .shopping-cart td {border-bottom: 1px solid #C3C3C3; border-left: 1px solid #C3C3C3; padding: 3px;}
.shopping-cart .link {font-size: 90%; white-space: nowrap;}
.shopping-cart .product {width: 55%}
.shopping-cart .price {width: 5%;}
.shopping-cart .quantity {width: 15%;}
.shopping-cart .quantity input {width: 30px;}
.shopping-cart .price {width: 20%;}
.shopping-cart .product-img {border: 1px solid #ccc; background-color: #e9e9e9; padding: 3px; width: 80px; height: 80px; float: left;}
.shopping-cart .product-img img {max-width:80px;max-height:80px;width:auto;height:auto;}
.shopping-cart .product-name {margin-left: 100px;}
.shopping-cart tr.totals {font-weight: bold;}
.shopping-cart tr.totals a {font-weight: normal;}
.shopping-cart .quantity-span {text-align: right;}


</style>
<div class="container" id="div1">
  <br><br>
 <h1>Checkout Complete - Thank You</h1>

<p>Thank you for your order. You will receive an e-mail confirmation shortly and will be contacted again when your order has shipped. Please print this page for your records.</p>
<br><br>

<h2>Services</h2>
<table class="table">
  <thead class="thead-dark">
    
    <?php
    $booking_id = $_GET['booking_id'];

    
       $hye = mysqli_query($conn, "SELECT b.booking_id, b.booking_date, b.booking_time, b.booking_quantity, b.booking_amount, c.cust_id, c.cust_name, s.service_id, s.description FROM booking b, customer c, service s WHERE b.cust_id = c.cust_id AND b.service_id = s.service_id AND b.booking_id = '$booking_id'");

                   while ($row = mysqli_fetch_array($hye)){
                   
                   ?>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Services</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $row['cust_name'];?></td>
      <td><?php echo $row['description'];?></td>
      <td><?php echo $row['booking_date'];?></td>
      <td><?php echo $row['booking_time'];?></td>
      <td><?php echo $row['booking_quantity'];?></td>
      <td><?php echo $row['booking_amount'];?></td>
    </tr>
    <?php }
                   ?>
  </tbody>
</table>


<br><br>
<h2>Payment Status</h2>
<p>
   <?php
    $booking_id = $_GET['booking_id'];

    
       $hye = mysqli_query($conn, "SELECT b.booking_id, b.booking_date, b.booking_time, b.booking_quantity, b.booking_amount, c.cust_id, c.cust_name, s.service_id, s.description FROM booking b, customer c, service s WHERE b.cust_id = c.cust_id AND b.service_id = s.service_id AND b.booking_id = '$booking_id'");

                   while ($row = mysqli_fetch_array($hye)){
                   
                   ?>
  Paid : RM<?php echo $row['booking_amount'];?>
  <?php }
                   ?>
</p>

  
</div>
<br><br>
<div class="container">
<div class="row">
  <?php
    $booking_id = $_GET['booking_id'];

    
       $hoi = mysqli_query($conn, "SELECT b.booking_id, b.booking_date, b.booking_time, b.booking_quantity, b.booking_amount, b.payment_status, c.cust_id, c.cust_name, s.service_id, s.description FROM booking b, customer c, service s WHERE b.cust_id = c.cust_id AND b.service_id = s.service_id AND b.booking_id = '$booking_id'");

                   while ($row = mysqli_fetch_array($hoi)){
                   
                   ?>
  <div class="col-lg-2 col-xs-6 mb-4">
    <button type="button" class="btn" onclick="printContent('div1')">Print Content</button>
  </div>

  <div class="col-lg-3 col-xs-6 mb-4">
   <form method="post" action="test_function.php">
    <input type="hidden" name="booking_id" value="<?php echo $booking_id;?>">
    
    <input type="hidden" name="payment_status">
      <button type="submit" name="update" class="btn">Main Menu</button>  
  </form> 
  </div>
  <?php }
                   ?>
  
  
</div>
</div>

  



</body> 
</html>