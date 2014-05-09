<?php include('admin/connect.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
	
	<!-- Included Bootstrap CSS Files -->
	<link rel="stylesheet" href="./js/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./js/bootstrap/css/bootstrap-responsive.min.css" />
	<link href="./js/google-code-prettify/prettify.css" rel="stylesheet"
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
				</div>
			</div>
		</div>
	</div>
	
<br></br>
<div class="container">
		<div class="row">
			
			<div id="body">
                        <div class="signup pull-right">
                            <a href="register.php" class="btn btn-success"><i class="icon-pencil icon-large"></i>&nbsp;Sign Up</a>
                        </div>
                        <hr>

                        <div class="row-fluid">
                            <div class="span12">

                                <div class="row-fluid">
                                    <div class="span2"></div>
                                    <div class="span8">
                                        <ul class="thumbnails">
                                            <li class="span12">
                                                <div class="thumbnail">
                                                    <form class="form-horizontal" method="post">
                                                        <div class="alert alert-info"><strong>Login</strong></div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputEmail">Email</label>
                                                            <div class="controls">
                                                                <input type="text" id="inputEmail" name="username" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <label class="control-label" for="inputPassword">Password</label>
                                                            <div class="controls">
                                                                <input type="password" id="inputPassword" name="password" placeholder="Password">
                                                            </div>
                                                        </div>
                                                        <div class="control-group">
                                                            <div class="controls">

                                                                <button type="submit" class="btn btn-info" name="login"><i class="icon-signin icon-large"></i>&nbsp;Sign in</button>
                                                            </div>
                                                            <br>
                                                            <?php
                                                            if (isset($_POST['login'])) {
    function clean($str) {
                                        $str = @trim($str);
                                        if (get_magic_quotes_gpc()) {
                                            $str = stripslashes($str);
                                        }
                                        return mysql_real_escape_string($str);
										}
										
                                                                $username = clean($_POST['username']);
                                                                $password = clean($_POST['password']);

                                                                $query = mysql_query("select * from tb_member where Email='$username' and Password='$password' ") or die(mysql_error());
                                                                $count = mysql_num_rows($query);
                                                                $row = mysql_fetch_array($query);
                                                                if ($count > 0) {
                                                                    //session_start();
																	     //session_regenerate_id();
                                                                    $_SESSION['id'] = $row['memberID'];
                                                                    header("Location:ecommerce-item.php");
																	session_write_close();
                                                                } else {
																session_write_close();
                                                                    ?>

                                                                    <div class="alert alert-error">Please check your username and password</div>
                                                                <?php }
                                                            }
                                                            ?>
                                                        </div>
                                                    </form>
                                                </div>
                                            </li>

                                        </ul>





                                    </div>
                                    <div class="span2">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
		</div>
	</div>
	
	<script src="./js/jquery-1.10.0.min.js"></script>
	<script src="./js/bootstrap/js/bootstrap.min.js"></script>
	<script src="./js/holder.js"></script>
	<script src="./js/script.js"></script>
	  <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="./js/jquery.js"></script>
	<script src="./js/google-code-prettify/prettify.js"></script>
    <script src="./js/application.js"></script>
    <script src="./js/bootstrap-transition.js"></script>
    <script src="./js/bootstrap-modal.js"></script>
    <script src="./js/bootstrap-scrollspy.js"></script>
    <script src="./js/bootstrap-alert.js"></script>
    <script src="./js/bootstrap-dropdown.js"></script>
    <script src="./js/bootstrap-tab.js"></script>
    <script src="./js/bootstrap-tooltip.js"></script>
    <script src="./js/bootstrap-popover.js"></script>
    <script src="./js/bootstrap-button.js"></script>
    <script src="./js/bootstrap-collapse.js"></script>
    <script src="./js/bootstrap-carousel.js"></script>
    <script src="./js/bootstrap-typeahead.js"></script>
    <script src="./js/bootstrap-affix.js"></script>
    <script src="./js/jquery.lightbox-0.5.js"></script>
	<script src="./js/bootsshoptgl.js"></script>
	 <script type="text/javascript">
</body>
</html>