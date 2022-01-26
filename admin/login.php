<?php 
session_start();
require_once '../config/connect.php'; 
if(isset($_POST) & !empty($_POST)){
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
	$count = mysqli_num_rows($result);
	if($count == 1){
		//echo "User exits, create session";
		$_SESSION['email'] = $email;
		header("location: products.php");
	}else{
		$fmsg = "Invalid Email and Password";
	}
}

?>
<!DOCTYPE html>
<html>
<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Hip-Hop Collection - Admin Panel</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.png">

	<!-- CSS -->
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../js/isotope/isotope.css">
	<link rel="stylesheet" href="../js/flexslider/flexslider.css">
	<link rel="stylesheet" href="../js/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="../js/owl-carousel/owl.theme.css">
	<link rel="stylesheet" href="../js/owl-carousel/owl.transitions.css">
	<link rel="stylesheet" href="../js/superfish/css/megafish.css" media="screen">
	<link rel="stylesheet" href="../js/superfish/css/superfish.css" media="screen">
	<link rel="stylesheet" href="../js/pikaday/pikaday.css">
	<link rel="stylesheet" href="../css/settings-panel.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/light.css">
	<link rel="stylesheet" href=".//css/responsive.css">

	<script src="http://use.edgefonts.net/bebas-neue.js"></script>

	<script src="js/modernizr.custom.js"></script>

</head>
<body class="multi-page">

<div id="wrapper" class="wrapper">
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<img src="../images/hip-hop.jpg" alt="Hip-Hop" style="height: 80px; width: 80px;">
					<div class="page_header text-center">
						<h2>Admin Login</h2>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6 col-md-offset-3">
				<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
					<div class="box-content">
						<!-- <h3 class="heading text-center">I'm a Returning Customer</h3> -->
						<div class="clearfix space40"></div>
						<form class="logregform" method="post">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address</label>
										<input type="email" name="email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>Password</label>
										<input type="password" name="password" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-12">
									<button type="submit" class="button btn-md pull-right">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>


							
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<div class="clearfix space70"></div>
	<!-- FOOTER -->
	<footer id="footer2">
		
		<div class="footer-bottom container">
			<div class="row">
				<div class="col-md-6">
					<p>&copy; Copyright @ Hip-Hop Collection</p>
				</div>
				<div class="col-md-6">
					
				</div>
			</div>
		</div>
	</footer>
	<!-- FOOTER -->
</div>






<!-- Javascript -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dialogFx.js"></script>
<script src="../js/dialog-js.js"></script>
<script src="../js/navigation/jquery.easing.js"></script>
<script src="../js/flexslider/jquery.flexslider.js"></script>
<script src="../js/navigation/scroll.js"></script>
<script src="../js/navigation/jquery.sticky.js"></script>
<script src="../js/owl-carousel/owl.carousel.min.js"></script>
<script src="../js/isotope/isotope.pkgd.js"></script>
<script src="../js/superfish/js/hoverIntent.js"></script>
<script src="../js/superfish/js/superfish.js"></script>
<script src="../js/tweecool.js"></script>
<script src="../js/jquery.bpopup.js"></script>
<script src="../js/pikaday/pikaday.js"></script>
<script src="../js/classie.js"></script>
<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="../js/rs-plugin/js/jquery.themepunch.tools.min.js"></script>   
<script src="../js/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="../js/jquery.prettyphoto.js"></script>
<script src="../js/script.js"></script>
<script src="../js/booking.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="../js/gmap.js"></script>
<script src="../js/gmap2.js"></script>


</body>
</html>
