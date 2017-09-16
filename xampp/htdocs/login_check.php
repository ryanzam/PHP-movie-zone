<?php 
	session_start();
	include('includes/dbConnect.inc.php');
	

	//store username and password from the form
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	
	//protecting the mysql injection
	$uname = stripslashes($uname);
	$uname = mysql_real_escape_string($uname);
	
	$pwd = stripslashes($pwd);
	$pwd = mysql_real_escape_string($pwd);
	
	
	
	$sql = "Select * from user where username = '$uname' and password = '$pwd'";
	
	$result = mysql_query($sql);
	
	$count = mysql_num_rows($result);
	
	//if username and password exists, result must match a single row 
	if($count == 1){	
		session_start();	
		$_SESSION['name'] = $uname;	
		header('location:login_successful.php');
		
		}
		else {	
				echo "<h1><font color=red>Username/Password incorrect!!</h1>";	
				header('location:login.php');
			}
?>