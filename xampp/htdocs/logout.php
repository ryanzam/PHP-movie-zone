<?php 
	session_start();
	if (!(isset($_SESSION['name']) && $_SESSION['name'] != '')) {

		header ("Location: index.php");
	}
	// destroy the session
	session_destroy();
	session_unset();
	
	header('Location:index.php');
	
?>