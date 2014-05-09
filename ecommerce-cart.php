<?php include('session.php'); ?>
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
	<?php
        include ('navbarfixed.php');
    ?>
	<br>
	<div class="container">		
		<div class="row">
			<div class="span3">
				<div class="well">
					<ul class="nav nav-list">
						<li class="nav-header">CATEGORIES</li>
						<li class="active">
							<a href="index.php">BOOTS</a>
						</li>
						<li>
							<a href="ecommerce-cart.php">SNEAKERS</a>
						</li>
						<li>
							<a href="ecommerce-checkout.php">PUMPS</a>
						</li>
						<li>
							<a href="ecommerce-item.php">OPEN TOES</a>
						</li>
						<li>
							<a href="about.php">SANDALS</a>
						</li>
						<li>
							<a href="contact.php">SANDALED HEELS</a>
						</li>
					</ul>
				</div>
				<div class="well">
					<form class="form login-form" method="POST" action="login.php">
						<h2>Sign in</h2>
						<div>
							<label>E-mail</label>
							<input id="Email" name="Email" type="text" placeholder="pinkie@gmail.com"/>

							<label>Password</label>
							<input id="password" name="Password" type="Password" />

							<br /><br />

							<button type="submit" class="btn btn-success">Login</button>
						</div>
						<br />
						<a href="register.php">register</a>
					</form>
				</div>
			</div>
	
			<div class="span9">
				<h2>Shopping Cart</h2>
				<form>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						 <?php
                                    $cart_table = mysql_query("select  * from order_details where memberID='$ses_id' and status=''") or die(mysql_error());
                                    $cart_count = mysql_num_rows($cart_table);
                                    while ($cart_row = mysql_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $product_query = mysql_query("select * from tb_products where productID='$product_id'") or die(mysql_error());
                                        $product_row = mysql_fetch_array($product_query);
                                        ?>

                                        <tr>
                                            <td><?php echo $product_row['name']; ?></td>
                                            <td><?php echo $cart_row['price']; ?></td>
                                            <td><?php echo $cart_row['qty']; ?></td>
                                            <td><?php echo $cart_row['total']; ?></td>
                                            <td width="100"><a href="#orderdel<?php echo $order_id; ?>" role="button"  data-toggle="modal" class="btn btn-danger"><i class="icon-remove icon-large"></i>&nbsp;Remove</a></td>
                                        </tr>
										
                                    <div id="orderdel<?php echo $order_id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-header">
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger">Are you Sure you Want to <strong>Remove &nbsp;</strong>this item?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="remove_item.php<?php echo '?id=' . $ses_id; ?>" ><i class="icon-check icon-large"></i>&nbsp;Yes</a>
                                            <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;No</button>

                                        </div>
                                    </div>
								<?php } ?>
					</tbody>
				</table>
			</form>

			<dl class="dl-horizontal">
				<?php
					if ($cart_count != 0) {
						$result = mysql_query("SELECT sum(total) FROM order_details WHERE memberID='$ses_id'") or die(mysql_error());
						while ($rows = mysql_fetch_array($result)) {
							?>
							<div class="pull-right">
								<div class="span"><div class="alert alert-success"><i class="icon-credit-card icon-large"></i>&nbsp;Total:&nbsp;<?php echo $rows['sum(total)']; ?></div></div>
							</div>
						<?php }
						?>
						<?php
					}
                ?>
			<div class="clearfix"></div>
			<a href="ecommerce-checkout.php" class="btn btn-success pull-right"><i class="icon-truck icon-large"> </i>Checkout</a>
			<a href="ecommerce-item.php" class="btn btn-primary">Continue Shopping</a>
		</div>
		  <div id="order" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
				</div>
				<div class="modal-body">
				<div class="alert alert-info">Payment</div>
				 <div class="alert alert-danger">By Clicking Paypal Icon you Agree to the&nbsp;<strong>Terms and Condition &nbsp;</strong>of this company</div>
			
				<a class="btn" href="pay.php<?php echo '?id='.$ses_id; ?>">Yes</a>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;No</button>
				</div>
         </div>
	</div>
</div>
	<hr />
	<?php include('footer.php'); ?>

	<script src="./js/jquery-1.10.0.min.js"></script>
	<script src="./js/bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/holder.js"></script>
	<script src="./js/script.js"></script>
</body>
</html>