<?php 
	$host = 'localhost';
	$password = 'localhost';
	$database = 'moviegallery';
	$user = 'mg_write';
	
	
	//connection and selection of movie gallery database
	mysql_connect($host , $user, $password) or die("connection to server failed! try again later!");
	mysql_select_db($database) or die("connection to database failed!") ;
?>