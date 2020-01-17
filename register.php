<?php
session_start();
require 'connection.php';
$conn    = Connect();

 if(isset($_POST['loginsubmit']))
{

	//echo "enter here";
	$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
  

  
  $sql = "SELECT * FROM `login_book` WHERE email = '$email' AND password = '$password' ";
  $res = mysqli_query($conn, $sql);
  $r = mysqli_fetch_assoc($res);
  $password = $r['password'];
  $user_id = $r['id'];
  $fullname = $r['fullname'];
  $read_book = $r['read_book'];
      $email = $r['email'];
      $count = mysqli_num_rows($res);


  if(!empty($count)){

  $_SESSION['login_user'] = $email;
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['read_book'] = $read_book;
        $_SESSION['id'] = $user_id;
        $_SESSION['password'] = $password;
        $_SESSION['read'] = $password;

header("location: index.php");
echo '<script>
  window.location.href = "index.php";
</script>';


  }

   else{
echo '<script>alert(" Invalid login details.")</script>';

$error = "<center> Invalid login details.</center>";
        

    }

}


if(isset($_POST['registersubmit']))
{

	//echo "enter here register";
	$fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  

  //var_dump($_POST);


  $sql = "SELECT email FROM login_book WHERE email = '$email'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      $count = mysqli_num_rows($result);
        //echo $count;
        if($count == 0){

          $query   = "INSERT into login_book (fullname,email,password) VALUES('" . $fullname . "','" . $email . "','" . $password . "')";



//echo $query;
$success = $conn->query($query);

         if ($success) {
         	echo '<script>alert("Congratulations! You have successfully registered. You can now login.")</script>';
       
         }
         
          
        } else {
          
       echo '<script>alert("Email already exist! Kindly provide another email.")</script>';
        
  
   }

}



?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Book Manager - Website</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<!--div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">My Account</a></li>
							<li><a href="cart.html">Your Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>					
							<li><a href="register.html">Login</a></li>		
						</ul>
					</div>
				</div-->
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left">
<h2><font color="red" >BOOK MANAGER</font></h2>
						<!--img src="themes/images//logo.png" class="site_logo" alt=""-->

					</a>
					<!--nav id="menu" class="pull-right">
						<ul>
							<li><a href="./products.html">Woman</a>					
								<ul>
									<li><a href="./products.html">Lacinia nibh</a></li>									
									<li><a href="./products.html">Eget molestie</a></li>
									<li><a href="./products.html">Varius purus</a></li>									
								</ul>
							</li>															
							<li><a href="./products.html">Man</a></li>			
							<li><a href="./products.html">Sport</a>
								<ul>									
									<li><a href="./products.html">Gifts and Tech</a></li>
									<li><a href="./products.html">Ties and Hats</a></li>
									<li><a href="./products.html">Cold Weather</a></li>
								</ul>
							</li>							
							<li><a href="./products.html">Hangbag</a></li>
							<li><a href="./products.html">Best Seller</a></li>
							<li><a href="./products.html">Top Seller</a></li>
						</ul>
					</nav-->
				</div>
			</section>			
			<section class="header_text sub">
			<!--img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" -->
				<h4><span>Login or Register</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="register.php" class="" name="loginform" id="loginform" method="post" onsubmit="return(validate());">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input type="text" placeholder="Enter your email" name="email" id="email" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password</label>
									<div class="controls">
										<input type="password" name="password" placeholder="Enter your password" id="password" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" id="loginsubmit" name="loginsubmit" value="Sign into your account">
									<hr>
									<!--p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p-->
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="register.php" name="signupform" id="signupform" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Fullname</label>
									<div class="controls">
										<input type="text" id="fullname" name="fullname" placeholder="Enter your fullname" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email address:</label>
									<div class="controls">
										<input type="email" id="email" name="email" placeholder="Enter your email" class="input-xlarge" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" id="password" name="password" placeholder="Enter your password" class="input-xlarge" required>
									</div>
								</div>							                            
								<!--div class="control-group">
									<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
								</div-->
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" id="registersubmit" name="registersubmit" value="Create your account"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>	
			<section id="copyright">
				<span><center>Copyright 2020  All right reserved.</center></span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>