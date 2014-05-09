<?php
include('admin/connect.php');
include('session.php');
$get_id=$_GET['id'];

			
						function createRandomPassword() {
					$chars = "abcdefghijkmnopqrstuvwxyz023456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 7) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				$confirmation = createRandomPassword();
						

mysql_query("update order_details set status='Pending',transaction_code='$confirmation',modeofpayment='Online' where MemberID='$get_id'")or die(mysql_error());
?>

<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
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
                    
                     <ul class="nav pull-right">
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">Login <b class="caret"></b></a>
							<div class="dropdown-menu">
							<form class="form-horizontal loginFrm">
							  <div class="control-group">								
								<input type="text" class="span2" id="inputEmail" placeholder="Email">
							  </div>
							  <div class="control-group">
								<input type="password" class="span2" id="inputPassword" placeholder="Password">
							  </div>
							  <div class="control-group">
								<button type="submit" class="btn pull-right">Sign in</button>
							  </div>
							</form>					
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="container">
			<h3>Payment</h3>
			<div class="hero-unit-table">

		
			<form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
				<input type="hidden" name="cmd" value="_xclick" />
				<input type="hidden" name="business" value="vero@pinkie.com" />
				<input type="hidden" name="item_name" value="Shoes" />
					
				   <?php
						$cart_table = mysql_query("select  * from order_details where memberID='$ses_id'") or die(mysql_error());
						$cart_count = mysql_num_rows($cart_table);
						while ($cart_row = mysql_fetch_array($cart_table)) {
							$order_id = $cart_row['orderid'];
							$product_id = $cart_row['productID'];
							$product_query = mysql_query("select * from tb_products where productID='$product_id'") or die(mysql_error());
							$product_row = mysql_fetch_array($product_query);
							?>
				
			   <input type="hidden" name="item_number" value="<?php $confirmation; ?>" />

			   <?php } ?>
			   
				<?php
				if ($cart_count != 0) {
					$result = mysql_query("SELECT sum(total) FROM order_details WHERE memberID='$ses_id'") or die(mysql_error());
					while ($rows = mysql_fetch_array($result)) {
						?>
						<input type="hidden" name="amount" value="<?php echo $rows['sum(total)']; ?>" />
					<?php }
				} ?>


				<input type="hidden" name="no_shipping" value="<?php echo 2; ?>" />
				<input type="hidden" name="no_note" value="2" />
				<input type="hidden" name="currency_code" value="" />
				<input type="hidden" name="lc" value="ZAR" />
				
				<input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 280px;" class="img-rounded" />
				<img alt="fdff" border="0" src="paypal_button.png" width="1" height="1" />
				<!-- Payment confirmed -->
				<input type="hidden" name="return" value="https://tameraplazainn.x10.mx/savingreservation.php?confirmation<?php echo $confirmation; ?>" />
				<!-- Payment cancelled -->
				<input type="hidden" name="cancel_return" value="http://tameraplazainn.x10.mx/cancel.php" />
				<input type="hidden" name="rm" value="2" />
				<input type="hidden" name="notify_url" value="http://tameraplazainn.x10.mx/ipn.php" />
				<input type="hidden" name="custom" value="any other custom field you want to pass" />
				
		
			</form>
			   
		</div>
		</div>
		<?php include('footer.php'); ?>
	<script src="./js/jquery-1.10.0.min.js"></script>
	<script src="./js/bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/holder.js"></script>
	<script src="./js/script.js"></script>
</body>
</html>