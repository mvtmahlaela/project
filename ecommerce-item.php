<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php include('admin/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>Welcome to ShoeYou</title>

	<!-- Included Bootstrap CSS Files -->
	<link rel="stylesheet" href="./js/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./js/bootstrap/css/bootstrap-responsive.min.css" />
	
	<!-- Includes FontAwesome -->
	<link rel="stylesheet" href="./css/font-awesome/css/font-awesome.min.css" />

	<!-- Css -->	
	<link rel="stylesheet" href="./css/style.css" />

</head>
<body>
	<div class="navbar  navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="brand" href="index.php">ShoeYou</a>
				<div class="nav-collapse collapse">
					<ul class="nav">
								<li><a href="index.php">HOME</a></li>
								<li><a href="ecommerce-item.php">PRODUCTS</a></li>
								<li><a href="ecommerce-cart.php">SHOPPING CART</a></li>
								<li><a href="ecommerce-checkout.php">CHECKOUT</a></li>
								<li><a href="contact.php">CONTACT US</a></li>
								<li><a href="about.php">ABOUT US</a></li>
					</ul>
					
				</div>
			</div>
		</div>
		<?php
        include ('navbarfixed.php');
        ?>
	</div>
	 
	<br></br>
	<div class="container">
		<div class="row">
			<div class="span3">

				<div class="well">
					<ul class="nav nav-list">
						<li class="nav-header">CATEGORIES</li>
						<li class="active">
							<a href="ecommerce-item.php">BOOTS</a>
						</li>
						<li>
							<a href="ecommerce-item.php">SNEAKERS</a>
						</li>
						<li>
							<a href="ecommerce-item.php">PUMPS</a>
						</li>
						<li>
							<a href="ecommerce-item.php">OPEN TOES</a>
						</li>
						<li>
							<a href="ecommerce-item.php">SANDALS</a>
						</li>
						<li>
							<a href="ecommerce-item.php">SANDALED HEELS</a>
						</li>
					</ul>
				</div>
			</div>	
			<div class="span9">
			<ul class="thumbnails">
				<?php
				$query = mysql_query("select * from tb_products") or die(mysql_error());
				while ($row = mysql_fetch_array($query)) {
					$id = $row['productID'];
					?>
					<li class="span3">
						<div class="thumbnail">
							<div class="alert alert-danger"><div class="font1"><?php echo $row['name']; ?></div></div>
							<hr>
							
                                        <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


                                        <p>
                                            <a> Price: R<?php echo $row['price']; ?></a>
                                        </p>
                                        <a href="#add<?php echo $id; ?>"   data-toggle="modal" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i>&nbsp;Add to Cart</a>

                                        <?php include('order_modal.php'); ?>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['order'])) {
                                        $member_id = $_POST['member_id'];
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $product_id = $_POST['product_id'];
                                        $total = $quantity * $price;
                                        mysql_query("insert into order_details (memberID,qty,productID,price,total) values('$member_id','$quantity','$product_id','$price','$total')") or die(mysql_query);
                                      
                                    }
                                    ?>
					</ul>
				</div>
		</div>			
	</div>	
</div>	
	<hr />
	<?php include("footer.php")?>	

	<script src="./js/jquery-1.10.0.min.js"></script>
	<script src="./js/bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/holder.js"></script>
	<script src="./js/script.js"></script>
</body>
</html>