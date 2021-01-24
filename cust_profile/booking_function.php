<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed in=true&libraries=places"></script>


<form action="booking_function_2.php" method="post">
                  
                  <div class="row">
                      <div class="col-lg-6 col-xs-6 mb-4">
                         <label>Service</label>
                         <?php include 'database.php'; ?>
                          <div class="input-group mb-3">

                              <div class="input-group-prepend">
                                  
                              </div>
                              <?php
                              include 'database.php';
                              $sql = "SELECT service_id, description FROM service";
                              $result = mysqli_query($conn, $sql);
                              ?>
                               <select class="custom-select" id="inputGroupSelect01" name="service_id" required="">
                                  <option selected>Choose...</option>
                                  <?php
                              while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='".$row['service_id']."'>".$row['description']."</option>";
                              }?>
                                </select>
                              
                          </div>
                          
                      </div>

                      <div class="col-lg-6 col-xs-6 mb-4">
                          <label>Quantity</label>
                          <div class="input-group-prepend">
                            
                            <input type="number" class="form-control" name="booking_quantity" required="">
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->

                      <div class="col-lg-6 col-xs-6 mb-4">
                          <label>Date</label>
                          <div class="input-group-prepend">
                            
                            <input type="date" class="form-control" name="booking_date" required="">
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->

                      <div class="col-lg-6 col-xs-6 mb-4">
                          <label>Time</label>
                          <div class="input-group-prepend">
                            
                            <input type="time" class="form-control" name="booking_time" required="">
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->






                      <div class="col-lg-6 col-xs-6 mb-4">
                          <div class="form-group">
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfBHW0Lzg-Pw6dziaxeHjYtClElphMzdc&libraries=places"></script>
  
                        <script type="text/javascript">
                            google.maps.event.addDomListener(window,'load',intilize);
                            function intilize(){
                                var autocomplete = new google.maps.places.Autocomplete(document.getElementById('address'));

                                    google.maps.event.addListener(autocomplete, 'place_changed', function(){

                                        var place = autocomplete.getPlace();
                                        var latitude = place.geometry.location.lat();
                                        document.getElementById("latitude").value = latitude;
                                        var longitude = place.geometry.location.lng();
                                        document.getElementById("longitude").value = longitude;

                                    });

                            };
                            
                          
                            
                            
                        </script>

            <label id="lblAddress" class="loginFormElement">Address:</label>
                <input class="form-control" id="address" name="booking_address" type="address" required>
                       
                    </div>
                      </div><!-- /.col-lg-6 -->


                      <div class="col-lg-6 col-xs-6 mb-4">
                          <label for="lng" class="loginFormElement">Longitude</label>
                          <div class="input-group-prepend">
                            
                            <input class="form-control" id="longitude" name="longitude" type="text" required readonly>
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->


                      <div class="col-lg-6 col-xs-6 mb-4">
                           <label for="lat" class="loginFormElement">Latitude</label>
                          <div class="input-group-prepend">
                            
                            <input class="form-control" margin="match_parent" id="latitude" name="latitude" type="text" required readonly>
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->

                      

                      <input type="hidden" name="cust_id" value="<?php echo $cust_id;?>">
                      <!-- <input type="hidden" name="amount" value=""> -->
                      

                  </div><!-- /.row -->
                  <div class="row">
                    <div class="col-lg-6 col-xs-6 mb-4">
                          <div class="input-group-prepend">
                            <button type="button submit" class="btn btn-primary btn-block" name="booking_la" value="submit">Submit</button>
                          </div><!-- /input-group -->
                      </div><!-- /.col-lg-6 -->
                  </div>
                  
                </form>

              <!--   <script type="text/javascript">
                  $(document).ready(function(){
                    $(#inputGroupSelect01).on('change',funnction(){
                      var inputGroupSelect01 = $(this).val();
                      if (inputGroupSelect01){
                        $.ajax({
                          type:'POST',
                          url:'booking_function_2.php',
                          data: 'service_id='+inputGroupSelect01,
                          success:function(html){

                          }
                        });
                      }
                    });
                  });
                </script> -->