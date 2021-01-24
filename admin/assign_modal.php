<div class="col-lg-6 col-xs-6 mb-4">
    <div class="input-group-prepend">
      
      <!-- <a  data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
      <!-- Modal -->
      <div class="modal fade" id="pass<?php echo $row['booking_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <div class="row">
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-border">
                    <thead>
                      <tr>
                          <th>Mower</th>
                          <th>Assign</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                      <?php
                      include 'database.php';

                      $result2 = mysqli_query($conn, "SELECT * FROM worker WHERE staff_role = 'mower'");
                      while($row2 = mysqli_fetch_array($result2)) {
                      ?>
                      <tr>
                          <td><?php echo $row2['workername'];?></td>
                          <td>
                            <form method="post" action="assign_modal2.php">
                  <input type="hidden" name="booking_id" value="<?php echo $row['booking_id'];?>"></input>
                  <input type="hidden" name="worker_id" value="<?php echo $row2['worker_id'];?>"></input>
                  <input type="hidden" name="workername" value="<?php echo $row2['workername'];?>"></input>
                  <input type="hidden" name="telno" value="<?php echo $row2['telno'];?>"></input>
                <button class="btn btn-success" name="success" onclick="document.submit();">Assign</button>
               
                </form>
                          </td>
                      </tr>
                      <?php
                      }?>
                    </tbody>
                  </table>
                  </div>
                  </div> 
                  
                </div>
               
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /input-group -->
  </div>