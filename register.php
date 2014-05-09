<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	<title>Register to get account</title>

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
					<form action="#" class="navbar-search pull-left">
                     <input id="srchFld" type="text" placeholder="I'm looking for ..." class="search-query span3"/>
                    </form>
                    
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
				<div class="hero-unit">
					<h1 class="">Register</h1>
					<p class="">Register with us to get the best shoes in town</p>
				</div>
		<?php  
  
        // check for a successful form post  
        if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
  
        // check for a form error  
        elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";  
  
		?>  		
		<form class="form-horizontal" action='register_contact_form.php' method="POST">
			<fieldset>
				<div id="legend">
					<legend class="">Register</legend>
				</div>
				<div class="control-group">
				<!-- First name -->
					<label class="control-label"  for="Firstname">First Names</label>
						<div class="controls">
							<input type="text" id="Firstname" name="Firstname" placeholder="Vero Phaahla" class="input-xlarge">
							<p class="help-block">First names can contain any letters only</p>
						</div>
				</div><!-- close first name-->
				
				<div class="control-group">
				<!-- Last name -->
					<label class="control-label"  for="Lastname">Last Name</label>
						<div class="controls">
							<input type="text" id="Lastname" name="Lastname" placeholder="Phaahla" class="input-xlarge">
							<p class="help-block">Last name can contain any letters only</p>
						</div>
				</div><!-- close last name-->
				
				<div class="control-group">
				<!-- E-mail -->
					<label class="control-label" for="Email">E-mail</label>
						<div class="controls">
							<input type="email" id="Email" name="Email" placeholder="pinkievero@gmail.com" class="input-xlarge">
							<p class="help-block">Please provide your E-mail</p>
						</div>
				</div><!-- close email-->
				
				<div class="control-group">
				<!-- Password-->
					<label class="control-label" for="Password">Password</label>
						<div class="controls">
							<input type="password" id="Password" name="Password" placeholder="" class="input-xlarge">
							<p class="help-block">Password should be at least 4 characters</p>
						</div>
				</div><!-- close password-->
				
				<div class="control-group">
				<!-- Password comfirm-->
					<label class="control-label"  for="password_confirm">Password (Confirm)</label>
						<div class="controls">
							<input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
							<p class="help-block">Please confirm password</p>
						</div>
				</div><!-- close password comfirm-->
				
				<div class="control-group">
				<!-- Contact Number-->
					<label class="control-label"  for="Contact_Number">Contact Number</label>
						<div class="controls">
							<input type="text" id="Contact_Number" name="Contact_Number" placeholder="073 452 9630" class="input-xlarge">
							<p class="help-block">Please enter your contact number</p>
						</div>
				</div><!-- close contact number-->
				
				<div class="control-group">
				<!-- Password comfirm-->
					<label class="control-label"  for="Address">Address</label>
						<div class="controls">
							<input type="text" id="Address" name="Address" placeholder="Shoshanguve Main Street" class="input-xlarge">
							<p class="help-block">Please enter your address</p>
						</div>
				</div><!-- close password comfirm-->
				
			<div class="control-group">
			<!-- Button -->
				<div class="controls">
					<input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-primary">Register</button>
				</div>
			</div>
		</fieldset>
	</form>

			</div>
		</div>
	</div>
	
	<hr />
	<?php include("footer.php");?>
	<script src="./js/jquery-1.10.0.min.js"></script>
	<script src="./js/bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/holder.js"></script>
	<script src="./js/script.js"></script>
</body>
</html>