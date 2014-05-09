<?php

// check for form submission - if it doesn't exist then send back to contact form
if (!isset($_POST["save"]) || $_POST["save"] != "contact") {
    header("Location: register.php"); exit;
}
	
// get the posted data
$Firstname = $_POST["Firstname"];
$Lastname = $_POST["Lastname"];
$Email = $_POST["Email"];
$Password = $_POST["Password"];
$password_confirm = $_POST["password_confirm"];
$Contact_Number = $_POST["Contact_Number"];
$Address = $_POST["Address"];
	
// check that a name was entered
if (empty ($Firstname))
    $error = "You must enter your first name(s).";
	
// check that a last name was entered
elseif (empty ($Lastname))
    $error = "You must enter your last name.";
	
// check that an email was entered
elseif (empty ($Email))
    $error = "You must enter your email address.";
	
// check for a valid email address
elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $Email))
    $error = "You must enter a valid email address.";
	
// check that a password was entered
elseif (empty ($Password))
    $error = "You must enter your password.";
	
// check that a password_confirm was entered
elseif (empty ($password_confirm))
    $error = "You must enter your confirm password.";	
elseif($Password != $password_confirm)	
	$error = "Your passwords must match";
	
// check that a contact number was entered
elseif (empty ($Contact_Number))
    $error = "You must enter your contact number.";
	
// check that a company name was entered
elseif (empty ($Address))
    $error = "You must enter your address.";
	
elseif($Firstname && $Lastname && $Email && $Password && $password_confirm && $Contact_Number && $Address)
{		
	include("configure.php");	
	$query = mysql_query("INSERT INTO users VALUES('','$Firstname','$Lastname','$Email','$Password','$Contact_Number','$Address')");
	}
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header("Location: register.php?e=".urlencode($error)); exit;
}
		
	
// send the user back to the form
header("Location: checkout.php?s=".urlencode("Thank you for your message.")); exit;

?>
