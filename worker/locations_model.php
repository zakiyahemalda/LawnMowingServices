<?php
require("database.php");

// Gets data from URL parameters.
/*if(isset($_GET['add_location'])) {
    add_location();
}*/


/*function add_location(){
    $con=mysqli_connect ("localhost", 'root', '','test');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
    $lat = $_GET['lat'];
    $lng = $_GET['lng'];
    // Inserts new row with place data.
    $query = sprintf("INSERT INTO locations " .
        " (id, lat, lng) " .
        " VALUES (NULL, '%s', '%s');",
        mysqli_real_escape_string($con,$lat),
        mysqli_real_escape_string($con,$lng));

    $result = mysqli_query($con,$query);
    echo json_encode("Inserted Successfully");
    if (!$result) {
        die('Invalid query: ' . mysqli_error($con));
    }
}*/
function get_saved_locations(){
    $con=mysqli_connect ("localhost", 'root', '','mowing');
    if (!$con) {
        die('Not connected : ' . mysqli_connect_error());
    }
      /*  $_SESSION['username'] = $username;*/
    // update location with location_status if admin location_status.
    //$username = $_GET['username'];
/*    $sqldata1 = mysqli_query($con,"select worker_id from worker where username = '$username'");
    $res = mysqli_fetch_array($sqldata1);
    $worker_id = $res['worker_id'];
*/
    $sqldata = mysqli_query($con,"select lng,lat from booking where worker_id = '4'");

    $rows = array();
    while($r = mysqli_fetch_assoc($sqldata)) {
        $rows[] = $r;

    }
    $indexed = array_map('array_values', $rows);

    //  $array = array_filter($indexed);

    echo json_encode($indexed);
    if (!$rows) {
        return null;
    }
}

?>