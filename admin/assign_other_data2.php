
      
      <!-- <a  data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
      <!-- Modal -->
      <div class="modal fade" id="cha<?php echo $row['booking_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                       <?php $booking_id = $row['booking_id'];?>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Address</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Amount</th>
                      <th>Payment Status</th>
                      </tr>
                    </thead>
                    <tbody>
                       <?php
          include 'database.php';

          $result2 = mysqli_query($conn, "SELECT booking_id, booking_address, booking_date, booking_time, booking_amount, payment_status FROM booking WHERE booking_id = '$booking_id'");
          while($row1 = mysqli_fetch_array($result2)) {
            
      ?>

                      <tr>
                       <td>
                        <?php echo $row1['booking_address'];?>
                      </td>
                      <td>
                        <?php echo $row1['booking_date'];?>
                      </td>
                      <td>
                        <?php echo $row1['booking_time'];?>
                      </td>
                      <td>
                        <?php echo 'RM', $row1['booking_amount'];?>
                      </td>
                      <td>
                      <?php $status=$row1 ['payment_status']; if ($status==1) { echo "<span class = 'label label-success'>Paid</span>"; }else { echo "<span class = 'label label-danger'>Not Paid</span>"; } ?>
                    </td>
                      </tr>
                      <?php }
?>
                    </tbody>
                  </table>
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