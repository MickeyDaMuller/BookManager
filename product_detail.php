
<?php
require 'connection.php';
$conn    = Connect();
 include('session.php');

$ref_id = $_GET['id'];



$sql = "SELECT * FROM books WHERE id = $ref_id";
  $res = mysqli_query($conn, $sql);
$r = mysqli_fetch_assoc($res);
//$count = mysqli_num_rows($r);

$password = $_SESSION['password'];
$fullname = $_SESSION['fullname'];
$email = $_SESSION['email'];
$user_id = $_SESSION['id'];
$read_books = $_SESSION['read_book'];
//echo $read_books;

$sql_slider = "SELECT * FROM books ORDER BY id ASC";
$res_slider = mysqli_query($conn, $sql_slider);
//$row = mysqli_fetch_assoc($res_slider);


$sql_read = "SELECT * FROM books ";
$res_read = mysqli_query($conn, $sql_read);
$rows = mysqli_fetch_assoc($res_read);
$book_id = $rows["id"];

      
$id = $r['id'];
$book_name = $r['book_name'];
$book_img = $r['book_img'];
$book_author = $r['book_author'];
$book_available = $r['book_available'];
$date_posted = $r['date_posted'];

$datemade = strftime("%b %d, %Y", strtotime($date_posted));


$sql3 = "SELECT * FROM book_read WHERE user_id = '$user_id' and book_id = $ref_id";
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

	//echo "enter oh";

$sql = "SELECT * FROM `book_read` WHERE user_id = '$user_id' AND book_id = '$ref_id' ";
  $res = mysqli_query($conn, $sql);
  $r = mysqli_fetch_assoc($res);
  $read_book = $r['read_book'];
      $count = mysqli_num_rows($res);
      echo $count;

      if ($count==0) {

      	 $query   = "INSERT into book_read (book_id,user_id) VALUES('" . $ref_id . "','" . $user_id . "')";

$success = $conn->query($query);

         if ($success) {
         	echo '<script>alert("You have successful taken this book from the library.")</script>';
         	//header('Location: index.php');
echo '<script>
  window.location.href = "index.php";
</script>';

       
         }
         

      	
      }

      else{

      	echo '<script>alert("Book is not available")</script>';
       //header('Location: index.php');

       echo '<script>
  window.location.href = "index.php";
</script>';

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
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.css" rel="stylesheet"/>
				
		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					
					<a href="index.php"><h3><font color="red" >BOOK MANAGER</font></h3></a>


					<nav id="menu" class="pull-right">
						<ul>
							<a href="./signout.php"><button class="btn btn-inverse" >Sign Out</button></a>
							
						</ul>
					</nav>
				</div>
			</section>
			<section class="header_text sub">
				<h4><span>Book Detail</span></h4>
			</section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">
								<a href="<?php echo $book_img ?>" class="thumbnail" data-fancybox-group="group1" title="<?php echo $book_name ?>"><img alt="" src="<?php echo $book_img ?>""></a>												
								
							</div>
							<div class="span5">
								<address>
									<strong>Availability:</strong> <span><font color="green"><?php echo $book_available ?></font></span><br>
									<strong>Book Name:</strong> <span><?php echo $book_name ?></span><br>
									<strong>Status:</strong> <span><font color="red"><b><?php
														if ($r3==0) {
															echo "Unread";
														}else{

															echo "Read";
														}
														 ?></b></font>
													</span><br>
									<strong>Created Date:</strong> <span><font color="blue"><?php echo $datemade ?></font></span><br>								
								</address>									
								<h4><strong>Author: <?php echo $book_author ?></strong></h4>
							</div>
							<div class="span5">
								<form class="form-inline" action="product_detail.php" method="post" id="readbutton" name="readbutton">
									<button class="btn btn-inverse" type="submit" id="readbutton" name="readbutton">READ BOOK</button>
								</form>
							</div>							
						</div>
						<div class="row">
													
							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text"><strong>Related</strong> Books</span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">

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
											<ul class="thumbnails listing-products">
												<li class="span3">
													<div class="product-box">
														<span class="sale_tag"></span>												
														<a href="product_detail.html"><img alt="" src="<?php echo $book_img ?>"></a><br/>
														<font color="green"><b><?php echo $book_available ?></b></font><br>
														<a href="product_detail.html"><b>Book Name:</b> <?php echo $book_name ?></a><br/>
														<?php 
														$sql3 = "SELECT * FROM book_read WHERE user_id = '$user_id' and book_id = $id";
  $res3 = mysqli_query($conn, $sql3);
$r4 = mysqli_fetch_assoc($res3);

														?>
													

														<p class="category"><font color="red"><b>Status:</b> <?php
														if ($r4==0) {
															echo "Unread";
														}else{

															echo "Read";
														}
														 ?></font></p>
														<p class="price">Author: <?php echo $book_author ?></p>

														<a href="product_detail.php?id=<?php echo $id ?>"><button class="btn btn-inverse">  READ BOOK</button></a><br>
														<font color="blue"><b><?php echo $datemade ?></b></font>
											
													</div>
														</li>
												       
																							
											</ul>

 <?php        

// Close your database connection

 }

 mysqli_close($conn);

           ?>


										</div>



									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<center><section id="copyright">
				<span>Copyright 2020 All right reserved.</span>
			</section></center>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>