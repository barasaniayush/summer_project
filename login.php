<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav.php'; ?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Login or Register</h2>
					</div>
					<div class="col-md-12">
				<div class="row shop-login">
				<div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">Login Here</h3>
						<div class="clearfix space40"></div>
						<?php if(isset($_GET['message'])){
								if($_GET['message'] == 1){
						 ?><div class="alert alert-danger" role="alert"> <?php echo "Invalid Email and Password"; ?> </div>

						 <?php } }?>
						<form class="logregform" method="post" action="loginprocess.php">
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
								<div class="col-md-6">
								</div>
								<div class="col-md-6">
									<button type="submit" name="submit" class="button btn-md pull-right">Login</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="box-content">
						<h3 class="heading text-center">Register Here</h3>
						<div class="clearfix space40"></div>
						<?php if(isset($_GET['message'])){ 
								if($_GET['message'] == 2){
							?><div class="alert alert-danger" role="alert"> <?php echo "Failed to Register"; ?> </div>
							<?php } } ?>
						<form class="logregform" onsubmit="return personalInfo()" name="personal" method="post" action="registerprocess.php">
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">
										<label>E-mail Address</label>
										<input type="email" name="email" id="email" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-6">
										<label>Password</label>
										<input type="password" name="password" id="password" value="" class="form-control">
									</div>
									<div class="col-md-6">
										<label>Re-enter Password</label>
										<input type="password" name="passwordagain" id="passwordagain" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="space20"></div>
								<input type="submit" value="Register" name="submit" class="button btn-md pull-right">
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

	<script type="text/javascript">
		var pasword = document.forms["personal"]["password"];
  		var passwordagain = document.forms["personal"]["passwordagain"];

		function personalInfo() {
		if(email.value == "") {
			alert("Email is required!");
			return false;
		}
   		if (password.value == "") {
    		alert("Password is required!");
    		return false;
  		}
  		if (passwordagain.value == "") {
    	alert("Password is required!");
    	return false;
  		}

  		if(password.value != passwordagain.value) {
  		alert("Password does not match");
  		return false;
  		}

  		var passw = /^[A-Za-z0-9]\w{7,14}$/;
  		if (!password.value.match(passw)) {
    		alert(" Password must be atleast 8 to 15 characters");
    		return false;
  		}

  		var pass = /^[A-Za-z0-9]\w{7,14}$/;
  		if (!passwordagain.value.match(pass)) {
    		alert(" Password must be atleast 8 to 15 characters");
    		return false;
  		}
	}
	</script>
	
<?php include 'inc/footer.php' ?>


