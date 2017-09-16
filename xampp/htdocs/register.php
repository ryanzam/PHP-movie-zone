<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Register</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<?php 
	$host = 'localhost';
	$password = 'localhost';
	$database = 'moviegallery';
	$user = 'mg_read';
	
	
	//connection and selection of movie gallery database
	mysql_connect($host , $user, $password) or die("connection to server failed! try again later!");
	mysql_select_db($database) or die("connection to database failed!") ;
	
	//store username and password from the form
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	
	//protecting the mysql injection
	$fname = stripslashes($fname);
	$fname = mysql_real_escape_string($fname);
	
	$lname = stripslashes($lname);
	$lname = mysql_real_escape_string($lname);
	
	$uname = stripslashes($uname);
	$uname = mysql_real_escape_string($uname);
	
	$pwd = stripslashes($pwd);
	$pwd = mysql_real_escape_string($pwd);
	
	
	
	$sql = "INSERT INTO user VALUES firstName = '$uname', lastName = '$uname', username = '$uname' and password = '$pwd', userType=0";
	
	
	
	
	
	//if username and password exists, result must match a single row 
	if(isset($_POST['check'])){
		$username = $_POST['uname'];
		$SELECT = mysql_query("SELECT username FROM user WHERE username='$username'");
		$count = mysql_num_rows($SELECT);
	if($count == 1){	
		echo "Username already exists!";		
		}
		else {		
				echo $username;
			}
	}
?>
<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/menu.inc.php'); ?>
    
    <div id="content">
    
    	<h2>Fill out the information</h2>
        <form id="form" method="post" action="register.php">
        <table>
        	<tr><td>First Name : </td><td><input type="text" id="fname" name="fname" /></td></tr>
            <tr><td>Last Name : </td><td><input type="text" id="lname" name="lname" /></td></tr>
            <tr><td>Username : </td><td><input type="text" id="uname" name="uname" /></td>
            <td><input type="submit" name="check" value="check for availabilty!" /></td></tr>
            <?php //if username and password exists, result must match a single row 
				if(isset($_POST['check'])){
					$username = $_POST['uname'];
					$SELECT = mysql_query("SELECT username FROM user WHERE username='$username'");
					$count = mysql_num_rows($SELECT);
				if($count == 1){	
					echo "Username already exists!";		
					}
					else {		
							echo $username;
						}
	} ?>
            <tr><td>Password : </td><td><input type="password" id="pwd" name="pwd" /></td></tr>
            <tr><td></td><td><input type="submit" name="login" value="Log In" />
        </table>
        </form>
    	
    </div>
    
    <?php include('includes/footer.inc.php'); ?>
</body>
</html>