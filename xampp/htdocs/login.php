<?php 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Admin Login - Movie Gallery</title>

<style type="text/css">
	
#login_form{
	width:300px;
	height:300px;
	margin-left:400px;
	margin-top:100px;	
	}
	
#form{
	margin-top:5px;
	border:#000 3px solid;
	}

</style>
</head>

<body>


    
  
    
    	<div id="login_form">
        <h3>Admin login</h3>
        <img src="images/Key.jpg"  border="4px" width="292px"/>        
        <form id="form" method="post" action="login_check.php">
        <table>
        	<tr><td>Username : </td><td><input type="text" id="uname" name="uname" /></td></tr>
            <tr><td>Password : </td><td><input type="password" id="pwd" name="pwd" /></td></tr>
            <tr><td></td><td><input type="submit" id="login" value="Log In" /></td></tr>
        </table>
        </form>
        </div>
  
		
	</body>
    </html>
  
 