<?php
	session_start();
	session_destroy();
	header('location:ecommerce-item.php');
?>