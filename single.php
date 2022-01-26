<?php 
ob_start();
session_start();
require_once 'config/connect.php';
include 'inc/header.php'; 
include 'inc/nav.php'; 
if(isset($_GET['id']) & !empty($_GET['id'])){
	$id = $_GET['id'];
	$prodsql = "SELECT * FROM products WHERE id=$id";
	$prodres = mysqli_query($connection, $prodsql);
	$prodr = mysqli_fetch_assoc($prodres);
}else{
	header('location: index.php');
}

?>
	
	<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
			<div class="container">
				<div class="row">
					<div class="page_header text-center">
						<h2>Product Detail</h2>
					</div>

				
			<div class="col-md-10 col-md-offset-1">
			<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
			<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
					<div class="row">
						<div class="col-md-5">
							<div class="gal-wrap">
								<div id="gal-slider" class="flexslider">
									<ul class="slides">
										<li><img src="admin/<?php echo $prodr['thumb']; ?>" class="img-responsive" alt=""/></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-7 product-single">
							<h2 class="product-single-title no-margin"><?php echo $prodr['name']; ?></h2>
							<div class="space10"></div>
							<div class="p-price">Rs. <?php echo $prodr['price']; ?></div>
							<div class="product-meta">
								<span>Categories: 
								<?php 
								$prodcatsql = "SELECT * FROM category WHERE id={$prodr['catid']}"; 
								$prodcatres = mysqli_query($connection, $prodcatsql);
								$prodcatr = mysqli_fetch_assoc($prodcatres);
								?>
								<a href="#"><?php echo $prodcatr['name']; ?></a></span><br>
							</div>
							<form method="get" action="addtocart.php">
							<div class="product-quantity">
								<span>Quantity:</span> 
									<input type="hidden" name="id" value="<?php echo $prodr['id']; ?>">
									<input type="text" name="quant" placeholder="1">
							</div>
							<div class="shop-btn-wrap">
								<input type="submit" class="button btn-small" value="Add to Cart">
							</div>
							</form>
						</div>
					</div>
					<div class="clearfix space30"></div>
					<div class="tab-style3">
						<!-- Nav Tabs -->
						<div class="align-center mb-40 mb-xs-30">
							<ul class="nav nav-tabs tpl-minimal-tabs animate">
								<li class="active col-md-12">
									<a aria-expanded="true" href="#mini-one" data-toggle="tab">Product Detail</a>
								</li>
							</ul>
						</div>
						<div style="height: auto;" class="tab-content tpl-minimal-tabs-cont align-center section-text">
							<div style="" class="tab-pane fade active in" id="mini-one">
								<p><?php echo $prodr['description']; ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php include 'inc/footer.php' ?>
