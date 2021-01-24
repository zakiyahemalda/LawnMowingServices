<?php

  if(isset($_POST['login']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];

    if ($username!='' && $password!='') 
    {
      include 'database.php';
      $query = mysqli_query($conn,"SELECT * FROM customer WHERE username='$username' and password='$password'");
      
      /*$result = mysqli_query($conn,$query);*/
      $row = mysqli_fetch_row($query);

      if ($row) {
        session_start();
        $_SESSION['cust_id']=true;
        $_SESSION['customer']="customer";
        $_SESSION['username']=$username;

        mysqli_close($conn);

        	echo '<script language = "javascript">';
            echo 'alert ("Successful Login To Customer");';
            echo 'window.location.href = "../cust_profile/index.php?username=$username"';
            echo '</script>';
      } else {
      	
        include 'database.php';

        $bot = mysqli_query($conn, "SELECT * FROM worker WHERE username = '$username' and password = '$password'");

        $table = mysqli_fetch_assoc($bot);
        if ($table['staff_role'] == 'admin'){
        	session_start();
        	$_SESSION['worker_id'] = true;
        	$_SESSION['worker'] = "admin";
        	$_SESSION['username'] = $username;
        	
        	mysqli_close($conn);

        	echo '<script language = "javascript">';
            echo 'alert ("Successful Login To Admin");';
            echo 'window.location.href = "../admin/map.php?username=$username"';
            echo '</script>';

        } else if($table['staff_role'] == 'mower') {
        	session_start();
        	$_SESSION['worker_id'] = true;
        	$_SESSION['worker'] = "mower";
        	$_SESSION['username'] = $username;
        	
        	mysqli_close($conn);

        	echo '<script language = "javascript">';
            echo 'alert ("Successful Login To Worker");';
            echo 'window.location.href = "../worker/map.php?username=$username"';
            echo '</script>';
        }  else{
  	 echo '<script language =  "javascript">';
          echo 'alert ("Wrong username or password");';
          echo 'window.location.href = "login.php"';
          echo '</script>';
    
  }

    }
  }
 
  } 
  ?>



