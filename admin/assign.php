<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Lawn Mowing Service - Worker Registration</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top"> <a class="navbar-brand mr-1" href="index.html">Welcome 
        <?php echo $username; ?>
      </a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"> <i class="fas fa-bars">
        </i>
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
        <li class="nav-item">
          <a class="nav-link" href="graph.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-chart-area">
            </i>
            <span>Chart Analysis
            </span>
          </a>
        </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="assign.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa-table">
            </i>
          <span>Service Booking
            </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="service_price_update.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa-chart-area">
            </i>
          <span>Available Service
            </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin_form.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa-id-card">
            </i>
          <span>Register
            </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="worker.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa-address-book">
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
          <li class="breadcrumb-item"> <a href="#">Dashboard
              </a>
          </li>
          <li class="breadcrumb-item active">Customer Booking</li>
        </ol>
        <div class="card mb-3">
          <div class="card-header"> <i class="fas fa-table">
              </i>
            Pending Booking</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Payment Status</th>
                    <th>Other Detail</th>
                    <th>Accept/Decline</th>
                  </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                  <?php  include 'database.php'; 

                  $sql = "SELECT * FROM customer";

                  $result=mysqli_query($conn, "SELECT c.cust_id, c.cust_tel, c.cust_name, b.booking_id, b.booking_date, b.booking_time, b.booking_address, b.booking_amount, b.booking_status, b.payment_status, s.description FROM customer c, booking b, service s WHERE b.service_id = s.service_id AND b.cust_id = c.cust_id AND booking_status = 0"); while ($row=mysqli_fetch_array($result)) {
                  	
                   ?>

                  <tr>

                    <td>
                      <?php echo $row['cust_name'];?>
                    </td>
                    <td>
                      <?php echo $row['description'];?>
                    </td>
                    <td>
                      <?php $status=$row ['payment_status']; if ($status==1) { echo "<span class = 'label label-success'>Paid</span>"; }else { echo "<span class = 'label label-danger'>Not Paid</span>"; } ?>
                    </td>
                    <td>
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-placement="top" title="Other Detail" data-target="#oi<?php echo $row['booking_id'];?>"><i class="fas fa-fw fa-eye"></i></button>
                      <?php include 'assign_other_data.php';?>	
                     </div> 
                      
                    </td>
                    <td>
                    <div class="text-center">
                      <form method="post" action="assign_and_booking_status.php">
                       
                        <input type="hidden" name="booking_id" value="<?php echo $row['booking_id'];?>"></input>
                        <input type="hidden" name="booking_status" value="<?php echo $booking_status;?>"></input>
                       <input type="hidden" name="phonenumber" value="<?php echo $row['cust_tel'];?>"></input>
                       <input type="hidden" name="cust_name" value="<?php echo $row['cust_name'];?>"></input>
                       <button type="submit" class="btn btn-success btn btn-sm" data-placement="top" title="Accept" name="success"><i class="fas fa-fw fa-check"></i></button>
                       <button type="submit" class="btn btn-danger btn-sm" data-placement="top" title="Decline" name="unsuccess"><i class="fas fa-fw fa-times"></i></button>
                       <!-- <button name="success" class="btn btn-success btn-sm"><i class="fas fa-fw fa-check" aria-hidden="true"></i>
                        </button>
                        <button name="fail" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-times" aria-hidden="true"></i>
                        </button> -->
                      </form>
                     </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>











        <div class="row">
            <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-check"></i>
                  Accepted Booking</div>
                <div class="card-body">
                  <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Other Detail</th>
                    <th>Assign Worker</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                  <?php  include 'database.php'; 

                  $sql = "SELECT * FROM customer";

                  $result=mysqli_query($conn, "SELECT c.cust_id, c.cust_tel, c.cust_name, b.booking_id, b.booking_date, b.booking_time, b.booking_address, b.booking_amount, b.booking_status, b.payment_status, s.description FROM customer c, booking b, service s WHERE b.service_id = s.service_id AND b.cust_id = c.cust_id AND booking_status = 1"); while ($row=mysqli_fetch_array($result)) {
                    
                   ?>

                  <tr>

                    <td>
                      <?php echo $row['cust_name'];?>
                    </td>
                    <td>
                      <?php echo $row['description'];?>
                    </td>
                    <td>
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-placement="top" title="Other Detail" data-target="#cha<?php echo $row['booking_id'];?>"><i class="fas fa-fw fa-eye"></i></button>
                      <?php include 'assign_other_data2.php';?>  
                     </div> 
                      
                    </td>
                    
                    <td>
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"data-placement="top" title="Assign Worker" data-target="#pass<?php echo $row['booking_id'];?>"><i class="fas fa-fw fa-address-card"></i></button>
                      
                      <?php include 'assign_modal.php';?> 
                    </td>
                  </div>
                    <td>
                      <input type="hidden" name="booking_id" value="<?php echo $row['booking_id'];?>">
                      <a href="assign_delete_function.php?booking_id=<?php echo $row['booking_id'];?>">
                        <button>Delete</button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
            </div>





            <div class="col-lg-6">
              <div class="card mb-3">
                <div class="card-header">
                  <i class="fas fa-times"></i>
                  Declined Booking</div>
                <div class="card-body">
                  <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Customer</th>
                    <th>Service</th>
                    <th>Other Detail</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                  <?php  include 'database.php'; 

                  $sql = "SELECT * FROM customer";

                  $result=mysqli_query($conn, "SELECT c.cust_id, c.cust_tel, c.cust_name, b.booking_id, b.booking_date, b.booking_time, b.booking_address, b.booking_amount, b.booking_status, b.payment_status, s.description FROM customer c, booking b, service s WHERE b.service_id = s.service_id AND b.cust_id = c.cust_id AND booking_status = 2"); while ($row=mysqli_fetch_array($result)) {
                    
                   ?>

                  <tr>

                    <td>
                      <?php echo $row['cust_name'];?>
                    </td>
                    <td>
                      <?php echo $row['description'];?>
                    </td>
                    
                    <td>
                    <div class="text-center">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-placement="top" title="Other Detail" data-target="#cha<?php echo $row['booking_id'];?>"><i class="fas fa-fw fa-eye"></i></button>
                      <?php include 'assign_other_data2.php';?>  
                     </div> 
                      
                    </td>
                    
                    
                  </div>
                    <td>
                      <input type="hidden" name="booking_id" value="<?php echo $row['booking_id'];?>">
                      <a href="assign_delete_function.php?booking_id=<?php echo $row['booking_id'];?>">
                        <button>Delete</button>
                      </a>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
                </div>
                <div class="card-footer small text-muted"></div>
              </div>
            </div>
          </div>
      </div>








      <!-- /.container-fluid -->
      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto"> <span>Copyright © Your Website 2018
      </span>
          </div>
        </div>
      </footer>
    </div>
    <
    <!-- /.content-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up">
  </i>
  </a>
  <!-- Logout Modal-->
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js">
  </script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js">
  </script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js">
  </script>
  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js">
  </script>
</body>

</html>