<?php
	ob_start();
	session_start();
	require_once 'config/connect.php';
	if(!isset($_SESSION['customer']) & empty($_SESSION['customer'])){
		header('location: login.php');
	}
include 'inc/header.php'; 
include 'inc/nav.php'; 
$uid = $_SESSION['customerid'];

if(isset($_POST) & !empty($_POST)){
	if($_POST['agree'] == true){
		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$address1 = filter_var($_POST['address1'], FILTER_SANITIZE_STRING);
		$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
		$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
		$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);

		$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
		$res = mysqli_query($connection, $sql);
		$r = mysqli_fetch_assoc($res);
		$count = mysqli_num_rows($res);
		if($count == 1){
			//update data in usersmeta table
			$usql = "UPDATE usersmeta SET firstname='$fname', lastname='$lname', address1='$address1', city='$city', mobile='$phone' WHERE uid=$uid";
			$ures = mysqli_query($connection, $usql) or die(mysqli_error($connection));
			if($ures){

				$total = 0;
				foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM products WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);
					$pid = $ordr['id']; 
					$quantity = $value['quantity'];
					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, pid,quantity, totalprice, orderstatus, paymentmode) VALUES ('$uid', '$pid','$quantity' ,'$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						$ordsql = "SELECT * FROM products WHERE id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);

						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];


						$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
					}
				}
				unset($_SESSION['cart']);
				header("location: my-account.php");
			}
		}else{
			$isql = "INSERT INTO usersmeta (firstname, lastname, address1, city, mobile, uid) VALUES ('$fname', '$lname', '$address1', '$city', '$phone', '$uid')";
			$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
			if($ires){

				$total = 0;
				foreach ($cart as $key => $value) {
					//echo $key . " : " . $value['quantity'] ."<br>";
					$ordsql = "SELECT * FROM products WHERE id=$key";
					$ordres = mysqli_query($connection, $ordsql);
					$ordr = mysqli_fetch_assoc($ordres);
					$pid = $ordr['id'];
					$quantity = $value['quantity'];
					$total = $total + ($ordr['price']*$value['quantity']);
				}

				echo $iosql = "INSERT INTO orders (uid, pid,quantity,  totalprice, orderstatus, paymentmode) VALUES ('$uid','$pid','$quantity', '$total', 'Order Placed', '$payment')";
				$iores = mysqli_query($connection, $iosql) or die(mysqli_error($connection));
				if($iores){
					$orderid = mysqli_insert_id($connection);
					foreach ($cart as $key => $value) {
						$ordsql = "SELECT * FROM products WHERE id=$key";
						$ordres = mysqli_query($connection, $ordsql);
						$ordr = mysqli_fetch_assoc($ordres);
						$pid = $ordr['id'];
						$productprice = $ordr['price'];
						$quantity = $value['quantity'];
						$orditmsql = "INSERT INTO orderitems (pid, orderid, productprice, pquantity) VALUES ('$pid', '$orderid', '$productprice', '$quantity')";
						$orditmres = mysqli_query($connection, $orditmsql) or die(mysqli_error($connection));
					}
				}
				unset($_SESSION['cart']);
				header("location: my-account.php");
			}
		}
	}
}

$sql = "SELECT * FROM usersmeta WHERE uid=$uid";
$res = mysqli_query($connection, $sql);
$r = mysqli_fetch_assoc($res);
?>

	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
		<form method="post" name="personal" onsubmit="return personalInfo()">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="billing-details">
						<h3 class="uppercase">Billing Details</h3>
						<div class="space30"></div>
							<div class="row">
								<div class="col-md-6">
									<label>First Name </label>
									<input name="fname" id="fname" class="form-control" placeholder="" value="<?php if(!empty($r['firstname'])){ echo $r['firstname']; } elseif(isset($fname)){ echo $fname; } ?>" type="text">
								</div>
								<div class="col-md-6">
									<label>Last Name </label>
									<input name="lname" id="lname" class="form-control" placeholder="" value="<?php if(!empty($r['lastname'])){ echo $r['lastname']; }elseif(isset($lname)){ echo $lname; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Address </label>
							<input name="address1" id="address1" class="form-control" placeholder="Street address" value="<?php if(!empty($r['address1'])){ echo $r['address1']; } elseif(isset($address1)){ echo $address1; } ?>" type="text">
							<div class="clearfix space20"></div>
							<div class="row">
								<div class="col-md-12">
									<label>City </label>
									<input name="city" id="city" class="form-control" placeholder="City" value="<?php if(!empty($r['city'])){ echo $r['city']; }elseif(isset($city)){ echo $city; } ?>" type="text">
								</div>
							</div>
							<div class="clearfix space20"></div>
							<label>Phone </label>
							<input name="phone" id="phone" class="form-control" id="billing_phone" placeholder="" value="<?php if(!empty($r['mobile'])){ echo $r['mobile']; }elseif(isset($phone)){ echo $phone; } ?>" type="text">	
					</div>
				</div>
			</div>
			<div class="clearfix space30"></div>
			<h4 class="heading">Payment Method</h4>
			<div class="clearfix space20"></div>
			
			<div class="payment-method">
				<div class="row">
						<div class="col-md-4">
							<input name="payment" id="radio1" class="css-checkbox" type="radio" value="cod"><span>Cash On Delivery</span>
						</div>
				</div>
				<div class="space30"></div>
					<input name="agree" id="checkboxG2" class="css-checkbox" type="checkbox" value="true"><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
				<div class="space30"></div>
				<input type="submit" name="submit" id="submit" class="button btn-lg" value="Pay Now">
			</div>
		</div>		
		</form>		
		</div>
	</section>

	<script type="text/javascript">
		var fname = document.forms["personal"]["fname"];
		var lname = document.forms["personal"]["lname"];
		var address1 = document.forms["personal"]["address1"];
		var city = document.forms["personal"]["city"];
		var phone = document.forms["personal"]["phone"];

		function personalInfo() {
			if (fname.value == "") {
    			alert("Firstname is required!");
    		return false;
  			}

  			if (lname.value == "") {
    			alert("Lastname is required!");
    		return false;
  			}

  			if (city.value == "") {
    			alert("City Address is required!");
    			return false;
  			}

  			if (address1.value == "") {
    			alert("Address is required!");
    			return false;
  			}

  			if(phone.value == "") {
  				alert("Phone number is required");
  			}
	

  			var name = /^[A-Za-z]\w{3,14}$/;
  			if(!fname.value.match(name)) {
  				alert("First Name is invalid");
  				return false;
  			}

  			var name2 = /^[A-Za-z]\w{3,14}$/;
  			if(!lname.value.match(name2)) {
  				alert("First Name is invalid");
  				return false;
  			}

  			var address = /^[A-Za-z]\w{3,14}$/;
  			if (!address1.value.match(address)) {
    			alert("Address is invalid");
    			return false;
  			}

  			var cityadd = /^[A-Za-z]\w{3,14}$/;
  			if (!city.value.match(cityadd)) {
    			alert("City Address is invalid");
    			return false;
  			}

  			var num = "/^[9][8][0-9]{8}/";
  			if (phone.value.match(num)) {
    			alert("Phone number should only contain numeric value");
    			return false;
  			}
		}
	</script>
	
<?php include 'inc/footer.php' ?>



