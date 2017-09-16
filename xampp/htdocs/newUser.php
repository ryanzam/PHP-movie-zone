<?php
	session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>New - User</title>
</head>

<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/admin_menu.inc.php'); ?>

	 <div id="content">
    	
        <h2>Create a new user</h2>
        
	
    <table style="margin-left:100px; margin-top:30px;">
	<form method="post" action="" >
    
    	<tr><td>First Name : </td><td><input type="text" id="fname" /></td></tr>
        <tr><td>Last Name : </td><td><input type="text" id="lname" /></td></tr>
        <tr><td>Username : </td><td><input type="text" id="uname" /></td></tr>
        <tr><td>Password : </td><td><input type="password" id="pwd" /></td></tr>
        <tr><td></td><td><input type="submit" id="create" value="Create User" /></td></tr>
    
    </form>
	</table>

 </div>      
           
    
    <?php include('includes/footer.inc.php'); ?>