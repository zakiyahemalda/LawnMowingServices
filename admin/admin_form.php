<?php
	include 'session.php';		
?>

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
        <li class="nav-item">
          <a class="nav-link" href="map.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-chart-area">
            </i>
            <span>Chart Analysis
            </span>
          </a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="assign.php?username=<?php echo $username;?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Service Booking</span></a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="service_price_update.php?username=<?php echo $username;?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Available Service</span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="admin_form.php?username=<?php echo $username;?>">
            <i class="fas fa-fw fa-id-card"></i>
            <span>Register</span>
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
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Staff Registration</li>
          </ol>

          <form method="POST" action="admin_insert.php" onsubmit="return validation()">
      
              <div class="form-row">
      <div class="form-group col-md-6">
                  <label for="worker">Worker Name</label>
                    <input type="text" name="workername" class="form-control" id="worker" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="role">Worker Role</label><br>
                  
                  <select id="role" class="form-control" name="staff_role">
                    <option selected>Choose Role</option>
                    <option value="admin">Admin</option>
                    <option value="mower">Worker</option>
                  </select>
                </div>
              </div>
      
        <div class="form-row">
      <div class="form-group col-md-6">
                  <label>Telephone Number</label>
                <input type="tel" name="telno" class="form-control" placeholder="eg. 6013xxxxxxxx" pattern="[6]{1}[0-9]{3}[0-9]{7,8}" required>
              </div>
            <div class="form-group col-md-6">
              <label for="email">Worker Email</label>
                <input type="email" id="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="xxx@gmail.com" required>
            </div>
          </div>
            

      <div class="form-group ">
        <label for="address">Address</label>
                <textarea class="form-control" rows="5" id="address" name="address" id="address" required></textarea>
              
            </div>


              <div class="form-row">
      <div class="form-group col-md-6">
                  <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="pass">Password</label>
                    <input type="password" id="pass" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
                </div>
              </div>

            <input type="hidden" name="worker_id" value="<?php echo $worker_id;?>">


            <div class="row">
                    <div class="col-lg-6 col-xs-6 mb-4">
                          <div class="input-group-prepend">
                            <button type="button submit" class="btn btn-primary btn-block" name="Submit" value="submit">Register</button>
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                  </div>
            
          </form>
          
		  

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
  

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

  </body>

</html>
