<?php
require 'connection.php';
$conn    = Connect();
 include('session.php');


$password = $_SESSION['password'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];
$user_id = $_SESSION['id'];
$read_books = $_SESSION['read_book'];
//echo $read_books;

$sql_slider = "SELECT * FROM books ";
$res_slider = mysqli_query($conn, $sql_slider);

$sql_sliders = "SELECT * FROM books ";
$res_sliders = mysqli_query($conn, $sql_sliders);
$rows = mysqli_fetch_assoc($res_sliders);
$books_id = $rows["id"];


$sql_read = "SELECT * FROM books ";
$res_read = mysqli_query($conn, $sql_read);
$rows = mysqli_fetch_assoc($res_read);
$book_id = $rows["id"];

$sql3 = "SELECT * FROM book_read WHERE user_id = '$user_id' and book_id = $books_id";
  $res3 = mysqli_query($conn, $sql3);
$r3 = mysqli_fetch_assoc($res3);
//$ip_addre = $r['users_ip'];
//echo $ip_addre;
//echo $r3;


$sql1 = "SELECT * FROM `book_read`";
$res1 = mysqli_query($conn, $sql1);
  $r1 = mysqli_fetch_assoc($res1);
  //$book_id = $r1['book_id'];
      $count = mysqli_num_rows($res1);
//echo $book_id;

 if(isset($_POST['readbutton']))
{
//echo "inside";
//echo $book_id;
//echo $user_id;


$sql = "SELECT * FROM `book_read` WHERE user_id = '$user_id' AND book_id = '$book_id' ";
  $res = mysqli_query($conn, $sql);
  $r = mysqli_fetch_assoc($res);
  $read_book = $r['read_book'];
      $count = mysqli_num_rows($res);
      echo $count;

      if ($count==0) {

      	 $query   = "INSERT into book_read (book_id,user_id) VALUES('" . $book_id . "','" . $user_id . "')";

$success = $conn->query($query);

         if ($success) {
         	echo '<script>alert("Congratulations! You have successfully registered. You can now login.")</script>';
         	
         }
         

      	
      }

      else{

      	echo '<script>alert("You have read it.")</script>';
         	
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
				</div-->
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<!--li><a href="#">My Account</a></li>
							<li><a href="cart.html">Your Cart</a></li>
							<li><a href="checkout.html">Checkout</a></li>					
							<li><a href="signout.php"></a></li-->		
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">	


				<h3><font color="red" >BOOK MANAGER</font></h3>


			
					<!--a href="index.html" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a-->
<center><span class="text"><span class="line">Welcome back <strong><?php echo $fullname ?></strong></span></span></center>
							<nav id="menu" class="pull-right">
						<ul>

							<!--li><a href="./products.html">Woman</a>					
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
							<li><a href="./products.html">Best Seller</a></li-->
							<li><a href="./signout.php">Sign Out</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<!--section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/banner-1.jpg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/banner-2.jpg" alt="" />
							<div class="intro">
								<h1>Mid season sale</h1>
								<p><span>Up to 50% Off</span></p>
								<p><span>On selected items online and in stores</span></p>
							</div>
						</li>
					</ul>
				</div>			
			</section>
			<section class="header_text">
				We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
				<br/>Don't miss to use our cheap abd best bootstrap templates.
			</section-->
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
									<span class="pull-left"><span class="text"><span class="line">Feature <strong>Books</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>

							<?php 

  $i = 1;
 while($r = mysqli_fetch_assoc($res_slider)) {
 $id = $r["id"];
  $book_name = $r["book_name"];
  $book_author = $r["book_author"];
  $book_img = $r["book_img"];
  $book_available = $r["book_available"];
  $date_posted = $r["date_posted"];
  $datemade = strftime("%b %d, %Y", strtotime($date_posted));
?>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">												
												<li class="span3">
													<div class="product-box">
														<p><img style="width: 100%; height: auto;" src="<?php echo $book_img ?>" alt="blog">
														</p><font color="green"><b><?php echo $book_available ?></b></font>
													<br>
														<b><?php echo $book_name ?></b><br/>


														<?php 
														$sql3 = "SELECT * FROM book_read WHERE user_id = '$user_id' and book_id = $id";
  $res3 = mysqli_query($conn, $sql3);
$r4 = mysqli_fetch_assoc($res3);

														?>


														<font color="red"><b><?php
														if ($r4==0) {
															echo "Unread";
														}else{

															echo "Read";
														}
														 ?></b></font>
													
														<p class="price"><?php echo $book_author ?></p>

														
															<a href="product_detail.php?id=<?php echo $id ?>"><button class="btn btn-inverse">  READ BOOK</button></a><br>

															<font color="blue"><b><?php echo $datemade ?></b></font><br>

														
													</div>
												</li>
											</ul>
										</div>
								
									</div>							
								</div>

   <?php        

// Close your database connection

 }

 mysqli_close($conn);

           ?>



							</div>						
						</div>
						<br/>	
					</div>				
				</div>
			</section>
			<section id="copyright">
				<span><center>Copyright 2020  All right reserved.</center></span>
			</section>	</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>