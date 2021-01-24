<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>SB Admin - Dashboard</title>
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
      <nav class="navbar navbar-expand navbar-dark bg-dark static-top"> <a class="navbar-brand mr-1" href="index.html">Welcome <?php echo $username; ?></a>
         <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"> <i class="fas fa-bars"></i>
         </button>
      </nav>
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="sidebar navbar-nav">
            <li class="nav-item">
               <a class="nav-link" href="index.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa fa-address-card"></i>
               <span>Biodata</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="booking.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa fa-calendar"></i>
               <span>Booking</span>
               </a>
            </li>
            <li class="nav-item active">
               <a class="nav-link" href="booking_status.php?username=<?php echo $username;?>"> <i class="fas fa-fw fa-table"></i>
               <span>Status Booking</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure?')"> <i class="fas fa-fw fa fa-share-square"></i>
               <span>Logout</span>
               </a>
            </li>
         </ul>
         <div id="content-wrapper">
            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"> <a href="#">Booking Status</a>
                  </li>
                  <li class="breadcrumb-item active">Overview</li>
               </ol>
               <!-- Icon Cards-->
               <!-- Area Chart Example-->
               <!-- DataTables Example -->
               <div class="card mb-3">
                  <div class="card-header"> <i class="fas fa-table"></i>
                     Booking Information
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <?php ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                           <thead>
                              <tr>
                                 <th>Service</th>
                                 <th>Date</th>
                                 <th>Time</th>
                                 <th>Total</th>
                                 <th>Status</th>
                                 <th>Assign Worker</th>
                                 <th>Payment Status</th>
                                 <th>Cancel</th>
                                 <th>Button</th>
                                 <th>Notify Admin</th>
                              </tr>
                           </thead>
                           <tfoot></tfoot>
                           <tbody>
                              <?php
                                 $sql = "SELECT * FROM worker";

                                  $sql2 = "SELECT * FROM customer WHERE username = '$_SESSION[username]'";

                                 $run = mysqli_query($conn,$sql2);
                                 while ($rower = mysqli_fetch_array($run))
                                 {
                                     $cust_name=$rower['cust_name'];
                                 }
                                 
                                 $hye=mysqli_query($conn, "SELECT * FROM booking as t1 LEFT OUTER JOIN worker as t2 ON t1.worker_id = t2.worker_id RIGHT OUTER JOIN service as t3 ON t1.service_id = t3.service_id WHERE t1.cust_id = '$cust_id' UNION ALL SELECT * FROM booking as t1 LEFT OUTER JOIN service as t3 ON t1.service_id = t3.service_id RIGHT OUTER JOIN worker as t2 ON t1.worker_id = t2.worker_id WHERE t2.worker_id IS NULL AND t1.cust_id = '$cust_id'"); while ($row=mysqli_fetch_array($hye)){ if($row['workername']==NULL) { $row['workername']="Pay first" ; } ?>
                              <tr>
                                 <td>
                                    <?php echo $row['description'];?>
                                 </td>
                                 <td>
                                    <?php echo $row['booking_date'];?>
                                 </td>
                                 <td>
                                    <?php echo $row['booking_time'];?>
                                 </td>
                                 <td>
                                    <?php echo 'RM', $row['booking_amount'];?>
                                 </td>
                                 <td>
                                    <?php $status=$row ['booking_status']; if ($status==1) { echo "<span class = 'label label-success'>Accepted</span>"; }elseif ($status==2) { echo "<span class = 'label label-danger'>Declined</span>"; }else { echo "<span class = 'label label-danger'>Pending</span>"; } ?>
                                 </td>
                                 <td>
                                    <?php echo $row[ 'workername'];?>
                                 </td>
                                 <td>
                                    <?php $status=$row ['payment_status']; if ($status==1) { echo "<span class = 'label label-success'>Paid</span>"; }else { echo "<span class = 'label label-danger'>Not Paid</span>"; } ?>
                                 </td>
                                 <td>
                                    <input type="hidden" name="booking_id" value="<?php echo $row['booking_id'];?>">
                                     <a onclick="return confirm('Are you sure?')" href="assign_delete_function.php?booking_id=<?php echo $row['booking_id'];?>">
                                       <button><i class="fas fa-fw fa fa-trash"></i></button>
                                 </td>
                                 <!-- paypal button -->
                                 <td>
                                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                       <!-- Identify your business so that you can collect the payments. -->
                                       <input type="hidden" name="business" value="atan@gmail.com">
                                       <!-- Specify a Buy Now button. -->
                                       <input type="hidden" name="cmd" value="_xclick">
                                       <!-- Specify details about the item that buyers will purchase. -->
                                       <input type="hidden" name="item_name" value="<?php echo $row['description'];?>">
                                       <input type="hidden" name="amount" value="<?php echo $row['booking_amount'];?>">
                                       <input type="hidden" name="currency_code" value="MYR">
                                       <input type="hidden" name="return" value="http://localhost/rumput/rumputgithub/cust_profile/test.php?username=<?php echo $username;?>&booking_id=<?php echo $row['booking_id'];?>">
                                       <!--    <input type="hidden" name="return" value="localhost/rumput/rumputgithub/cust_profile/booking_status.php"> -->
                                       <input type="hidden" name="cancel_return" value="http://192.168.1.108/rumput/rumputgithub/cust_profile/cancel.php">
                                       <input type="hidden" name="notify_url" value="http://192.168.1.108/rumput/rumputgithub/cust_profile/update-record.php">
                                       <!-- Display the payment button. -->
                                       <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="Buy Now">
                                       <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif">
                                    </form>
                                 </td>
                                 
                                 <td>
                                    <form method="post" action="smsfunction1.php">
                                       <input type="hidden" name="phonenumber" value="<?php echo $row['telno'];?>"></input>
                                       <input type="hidden" name="booking_id" value="<?php echo $row['booking_id'];?>"></input>
                                       <input type="hidden" name="cust_name" value="<?php echo $cust_name;?>"></input>
                                       <button type="submit" class="btn btn-success btn-sm" name="success"><i class="fas fa-fw fa fa-envelope"></i></button>
                                    </form>
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
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto"> <span>Copyright © Your Website 2018</span>
                  </div>
               </div>
            </footer>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top"> <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button> <a class="btn btn-primary" href="login.html">Logout</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <script src="vendor/chart.js/Chart.min.js"></script>
      <script src="vendor/datatables/jquery.dataTables.js"></script>
      <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/sb-admin.min.js"></script>
      <!-- Demo scripts for this page-->
      <script src="js/demo/datatables-demo.js"></script>
      <script src="js/demo/chart-area-demo.js"></script>
   </body>
</html>