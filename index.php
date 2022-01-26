<?php 
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Latest Product</h2>
					</div>
					<div class="col-md-12">
						<div class="row">
							<div id="shop-mason" class="shop-mason-4col">
							<?php 
								$sql = "SELECT * FROM products";
								if(isset($_GET['id']) & !empty($_GET['id'])){
									$id = $_GET['id'];
									$sql .= " WHERE catid=$id";
								}
								$res = mysqli_query($connection, $sql);
								while($r = mysqli_fetch_assoc($res)){
							?>
								<div class="sm-item isotope-item">
									<div class="product">
										<div class="product-thumb">
											<a href="single.php?id=<?php echo $r['id']; ?>"><img src="admin/<?php echo $r['thumb']; ?>" class="img-responsive" width="250px" alt=""></a>
										</div>
										<h2 class="product-title"><a href="single.php?id=<?php echo $r['id']; ?>"><?php echo substr($r['name'],0,16); ?></a></h2>
										<div class="product-price">Rs. <?php echo $r['price']; ?><span></span></div>
									</div>
								</div>
							<?php } ?>	
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include 'inc/footer.php' ?>
