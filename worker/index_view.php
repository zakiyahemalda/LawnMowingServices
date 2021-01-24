<?php
include "database.php";
$run = mysqli_query($conn,"SELECT * FROM worker WHERE username = '$username'");
while ($row = mysqli_fetch_array($run)) {
?>

<div class="row">
  <div class="col-lg-6 col-xs-6 mb-4">
    <label>Username</label>
    <div class="input-group-prepend">
      <input type="name" name="username" class="form-control" value="<?php echo $row['username'];?>" readonly>
    </div>
    <!-- /input-group -->
  </div>
  <div class="col-lg-6 col-xs-6 mb-4">
    <label>Name</label>
    <div class="input-group-prepend">
      <input type="name" class="form-control" value="<?php echo $row['workername'];?>" readonly>
    </div>
    <!-- /input-group -->
  </div>
  <!-- /.col-lg-6 -->
  <div class="col-lg-6 col-xs-6 mb-4">
    <label>Telephone Number</label>
    <div class="input-group-prepend">
      <input type="name" name="telno" class="form-control" value="<?php echo $row['telno'];?>" readonly>
    </div>
    <!-- /input-group -->
  </div>
  <!-- /.col-lg-6 -->
  <div class="col-lg-6 col-xs-6 mb-4">
    <label>Email Address</label>
    <div class="input-group-prepend">
      <input type="name" name="email" class="form-control" value="<?php echo $row['email'];?>" readonly>
    </div>
    <!-- /input-group -->
  </div>
  <!-- /.col-lg-6 -->



  <div class="col-lg-6 col-xs-6 mb-4">
    <div class="input-group-prepend">
      <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#lol">Update Profile
      </button>
      <!-- <a  data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
      <!-- Modal -->
      <div class="modal fade" id="lol" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Update Profile
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="index_update.php">
                <div class="row">
                  <input type="hidden" class="form-control" name="worker_id" value="<?php echo $worker_id?>">
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>Username:</label>
                    <div class="input-group-prepend">
                      <input type="name" name="username" class="form-control" placeholder="Username" value="<?php echo $row['username'];?>">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>Name:</label>
                    <div class="input-group-prepend">
                      <input type="name" name="workername" class="form-control" placeholder="Name" value="<?php echo $row['workername'];?>">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>Telephone Number:</label>
                    <div class="input-group-prepend">
                      <input type="name" name="telno" class="form-control" placeholder="Telephone Number" value="<?php echo $row['telno'];?>">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>Email:</label>
                    <div class="input-group-prepend">
                      <input type="name" name="email" class="form-control" placeholder="Email Address" value="<?php echo $row['email'];?>">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button type="submit" id="update" name="update" class="btn btn-primary">Save changes
                </button>
              </form>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /input-group -->
  </div>
  <!-- /.col-lg-6 -->



  <div class="col-lg-6 col-xs-6 mb-4">
    <div class="input-group-prepend">
      <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#pass">Change Password
      </button>
      <!-- <a  data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
      <!-- Modal -->
      <div class="modal fade" id="pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Change Password
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;
                </span>
              </button>
            </div>
            <div class="modal-body">
              <form method="post" action="index_change_password.php">
                <div class="row">
                  <input type="hidden" class="form-control" name="worker_id" value="<?php echo $worker_id?>">
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>Current Password</label>
                    <div class="input-group-prepend">
                      
                      <input type="password" name="oldPass" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>New Password</label>
                    <div class="input-group-prepend">
                      
                      <input type="password" name="newPass" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-lg-12 col-xs-12 mb-4">
                    <label>New Password Confirmation</label>
                    <div class="input-group-prepend">
                      
                      <input type="password" name="renewPass" class="form-control">
                    </div>
                    <!-- /input-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  
                </div>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
                <button type="submit" id="update" name="change" class="btn btn-primary">Save changes
                </button>
              </form>
            </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /input-group -->
  </div>
  <!-- /.col-lg-6 -->
</div>
<?php
}
?>
