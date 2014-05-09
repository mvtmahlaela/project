<?php
session_start();
$_SESSION['Username'] = $myusername;

// get the posted data
// username and password sent from form 

$myemail = addslashes($_POST['Email']); 
$mypassword = addslashes($_POST['Password']); 

	include('connect.php'); 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{


		$sql="select * from tb_user where Email='$myemail' and Password='$mypassword'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);

		$count=mysql_num_rows($result);

		
		// If result matched $myusername and $mypassword, table row must be 1 row
		if($count==1)
		{
			$_SESSION['login_user']=$myemail;

			header("Location: ecommerce-item.php");
		}
		else 		
		{
			$error="Your Login Name or Password is invalid";
		}
	}
		
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header("Location: order.php?e=".urlencode($error)); exit;
}
	
// send the user back to the home page
header("Location: ecommerce-item.php?s=".urlencode("You have successfully been logged in")); exit;
//header("Location: ecommerce-cart.php");
?>
