<?php 
include 'session.php'; 
include 'locations_model.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Lawn Mowing Service 
    </title>
    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="js/googlemap.js">
    </script>
  </head>
  <body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top"> 
      <a class="navbar-brand mr-1" href="index.html">Welcome 
        <?php echo $username; ?>
      </a>
      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"> 
        <i class="fas fa-bars">
        </i>
      </button>
    </nav>
    <div id="wrapper">
      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
       
        <li class="nav-item active">
          <a class="nav-link" href="map.php?username=<?php echo $username;?>"> 
            <i class="fas fa-fw fa-globe">
            </i>
            <span>Map
            </span>
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="index.php?username=<?php echo $username;?>">
            <i class="fas fa-fw fa fa-address-card"></i>
            <span>Biodata</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="booking_status.php?username=<?php echo $username;?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Status Booking</span></a>
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
            <li class="breadcrumb-item active">Customer booking place
            </li>
          </ol>
          <style>
            /* Optional: Makes the sample page fill the window. */
            html, body {
              height: 100%;
              margin: 0;
              padding: 0;
            }
            /* Always set the map height explicitly to define the size of the div
            * element that contains the map. */
            #map {
              height: 90%;
              width: : 2000%;
            }
          </style>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
          </script>
          <style>
            
            #map {
              position:absolute;
              left: 245px;
              top:200px;
              bottom:0px;
              height:550px ;
              width:660px;
              width: 83%;
              height: 60%;
            }
            .geocoder {
              position:absolute;
              left: 245px;
              top:145px;
            }
          </style>
          <div class="row">
            <div class="geocoder">
              <div id="geocoder" >
              </div>
            </div>
            <div id="map">
            </div>
            <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'>
            </script>
            <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
            <style>
            </style>
            <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'>
            </script>
            <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
            <script>
              var saved_markers = <?= get_saved_locations() ?>;
              var user_location = [101.975769,4.210484];
              mapboxgl.accessToken = 'pk.eyJ1IjoidmFsbW9ub3gxIiwiYSI6ImNqcGljcmo1azB0MTUzcnBqdDJydWF1M3gifQ.13nOeiNYRHqW1oKn5t8KjQ';
              var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v9',
                center: user_location,
                zoom: 4
              }
                                        );
              //  geocoder here
              var geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                // limit results to Australia
                //country: 'IN',
              }
                                               );
              var marker ;
              // After the map style has loaded on the page, add a source layer and default
              // styling for a single point.
              map.on('load', function() {
                addMarker(user_location,'load');
                add_markers(saved_markers);
                // Listen for the `result` event from the MapboxGeocoder that is triggered when a user
                // makes a selection and add a symbol that matches the result.
                geocoder.on('result', function(ev) {
                  console.log(ev.result.center);
                }
                           );
              }
                    );
              map.on('click', function (e) {
                marker.remove();
                addMarker(e.lngLat,'click');
                //console.log(e.lngLat.lat);
                document.getElementById("lat").value = e.lngLat.lat;
                document.getElementById("lng").value = e.lngLat.lng;
              }
                    );
              function addMarker(ltlng,event) {
                if(event === 'click'){
                  user_location = ltlng;
                }
                marker = new mapboxgl.Marker({
                  draggable: true,color:"#d02922"}
                                            )
                  .setLngLat(user_location)
                  .addTo(map)
                  .on('dragend', onDragEnd);
              }
              function add_markers(coordinates) {
                var geojson = (saved_markers == coordinates ? saved_markers : '');
                console.log(geojson);
                // add markers to map
                geojson.forEach(function (marker) {
                  console.log(marker);
                  // make a marker for each feature and add to the map
                  new mapboxgl.Marker()
                    .setLngLat(marker)
                    .addTo(map);
                }
                               );
              }
              function onDragEnd() {
                var lngLat = marker.getLngLat();
                document.getElementById("lat").value = lngLat.lat;
                document.getElementById("lng").value = lngLat.lng;
                console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
              }
              $('#signupForm').submit(function(event){
                event.preventDefault();
                var lat = $('#lat').val();
                var lng = $('#lng').val();
                var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
                $.ajax({
                  url: url,
                  method: 'GET',
                  dataType: 'json',
                  success: function(data){
                    alert(data);
                    location.reload();
                  }
                }
                      );
              }
                                     );
              document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
            </script>
          </div>
        </div>
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
