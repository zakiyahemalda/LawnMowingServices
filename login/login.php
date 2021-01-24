<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<!------ Include the above in your HEAD tag ---------->
<?php
/*require 'login_function.php';*/
require 'register_function.php';
require 'database.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        
    </head>
    <body>
        <div class="container">
           
            <header>
                <h1>Login and Registration Form</h1>
                
            </header>
            <section>               
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login_function.php" method="post" autocomplete="on">
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="name" class="uname" > Your email or username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                 <p class="signin button"> 
                                    <input type="submit" value="Log in" name="login" /> 
                                </p>

                                <p class="change_link">
                                    Not a member yet ?
                                    <a href="#toregister" class="to_register">Join us</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="register_function.php" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your name</label>
                                    <input id="usernamesignup" name="cust_name" required="required" type="text" placeholder="eg. Nur Amalina" required=""/>
                                </p>
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="eg. Henshin" required=""/>
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail"  > Your email</label>
                                    <input id="emailsignup" name="cust_email" required="required" type="email" placeholder="mysupermail@mail.com" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="xxx@gmail.com"/> 
                                </p>
                                <p> 
                                    <label for="telephone" class="youmail"  > Your Telephone</label>
                                    <input id="emailsignup" name="cust_tel" required="required" type="tel" placeholder="eg. 6013xxxxxxxx" required="" pattern="[6]{1}[0-9]{3}[0-9]{7,8}"/> 
                                </p>

                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
                                </p>
                                
                                <p class="signin button"> 
                                    <input type="submit" value="Sign up" name="register" /> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>