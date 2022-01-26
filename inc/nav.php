			<div class="menu-wrap">
				<div id="mobnav-btn">Menu <i class="fa fa-bars"></i></div>
				<ul class="sf-menu">
					<li>
						<a href="http://localhost/summer_project/index.php">Home</a>
					</li>
					<li>
						<a href="#">Categories</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
						<?php
							$catsql = "SELECT * FROM category";
							$catres = mysqli_query($connection, $catsql);
							while($catr = mysqli_fetch_assoc($catres)){
						?>
							<li><a href="index.php?id=<?php echo $catr['id']; ?>"><?php echo $catr['name']; ?></a></li>
						<?php } ?>
						</ul>
					</li>
					<li>
						<?php if (isset($_SESSION['customer'])) { ?>  
 						<a href="#">My Account</a>
						<div class="mobnav-subarrow"><i class="fa fa-plus"></i></div>
						<ul>
							<li><a href="http://localhost/summer_project/my-account.php">My Orders</a></li>
							<li><a href="http://localhost/summer_project/edit-address.php">Update Profile</a></li>
							<li><a href="http://localhost/summer_project/logout.php">Logout</a></li>
						</ul>
						<?php }else{ ?> 
						<a href="http://localhost/summer_project/login.php">Login</a>
						<?php } ?>	
					</li>
				</ul>
				<?php if(isset($_SESSION['cart'])){ ?>
				<div class="header-xtra">
				<?php $cart = $_SESSION['cart']; ?>
					<div class="s-cart">
						<div class="sc-ico"><a href="cart.php"><i class="fa fa-shopping-cart"></i></a><em><?php
						echo count($cart); ?></em></div>
				 
						<div class="cart-info">
						<?php
						//print_r($cart);
						$total = 0;
						foreach ($cart as $key => $value) {
						//echo $key . " : " . $value['quantity'] ."<br>";
						$navcartsql = "SELECT * FROM products WHERE id=$key";
						$navcartres = mysqli_query($connection, $navcartsql);
						$navcartr = mysqli_fetch_assoc($navcartres);
					 	?>
						<div class="ci-item">
						<img src="admin/<?php echo $navcartr['thumb']; ?>" width="70" alt=""/>
						<div class="ci-item-info">
						<h5><a href="single.php?id=<?php echo $navcartr['id']; ?>"><?php echo substr($navcartr['name'], 0 , 20); ?></a></h5>
						<p><?php echo $value['quantity']; ?> x Rs. <?php echo $navcartr['price']; ?></p>
						<div class="ci-edit">
						<!-- <a href="#" class="edit fa fa-edit"></a> -->
						<a href="delcart.php?id=<?php echo $key; ?>" class="edit fa fa-trash"></a>
						</div>
						</div>
						</div>
						<?php 
						$total = $total + ($navcartr['price']*$value['quantity']);
						} ?>
						<div class="cart-btn">
						<a href="cart.php">View Cart</a>
						</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</header>