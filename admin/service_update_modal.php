<div class="col-lg-6 col-xs-6 mb-4">
    <div class="input-group-prepend">
      
      <!-- <a  data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a> -->
      <!-- Modal -->
      <div class="modal fade" id="pass<?php echo $roar['service_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

                  <form action="service_update_modal2.php" method="post">
                      <div class="form-group">
                        <label>Price:</label>
                        <input type="text" class="form-control" name="price">
                      </div>

                      <input type="hidden" name="service_id" value="<?php echo $roar['service_id'];?>">
                      
                     
                      <button type="submit" class="btn btn-default" name="update">Submit</button>
                    </form> 
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


