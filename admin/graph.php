<?php
include 'session.php';
$dbhandle= new mysqli('localhost','root','','mowing');
echo $dbhandle -> connect_error;

//$query = "SELECT service_id, count(booking_id) FROM booking group by service_id";
$query = "select s.description, count(b.booking_id) from booking b, service s where b.service_id = s.service_id group by description";
$resq = $dbhandle->query($query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="" content="">
    <meta name="author" content="">
    <title>Lawn Mowing Service - Worker Registration
    </title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
      <a class="navbar-brand mr-1" href="index.html">Welcome <?php echo $username; ?></a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="map.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-globe">
            </i>
            <span>Map Analysis
            </span>
          </a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="graph.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-chart-area">
            </i>
            <span>Chart Analysis
            </span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="assign.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-table">
            </i>
            <span>Service Booking
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="service_price_update.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-chart-area">
            </i>
            <span>Available Service
            </span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="admin_form.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-id-card">
            </i>
            <span>Register
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="worker.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-address-book">
            </i>
            <span>Resign
            </span>
          </a>
        </li>
        <li class="nav-item">
      <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure?')">
      <i class="fas fa-fw fa fa-share-square"></i>
      <span>Logout</span></a>
    </li>
      </ul>
      <div id="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard
              </a>
            </li>
            <li class="breadcrumb-item active">Report
            </li>
		  </ol>
			
			<!-- Example Pie Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Percentage of Service Booked</div>
            <div class="card-body">
              <div id="piechart" align="center" style="width:800px; height:400px;"></div>
			  <div class="push"></div>
            </div>
			<div class="card-footer small text-muted">Percentage of Service Booked</div>
          </div>		
		</div>
          
      
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
	  
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart()
	   {

        var data = google.visualization.arrayToDataTable([
          ['description', 'booking_id'],
         <?php
		 while($row=$resq -> fetch_assoc())
		 {
			 echo "['".$row['description']."',".$row['count(b.booking_id)'] ."],";
			 
		 }
		 
		 
		 ?>
        ]);

        var options = {
          title: 'The Status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
	  
    </script>
	

<!-- /.container-fluid -->
<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Your Website 2018
      </span>
    </div>
  </div>
</footer>
</div>
<!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up">
  </i>
</a>
<!-- Logout Modal-->
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>
