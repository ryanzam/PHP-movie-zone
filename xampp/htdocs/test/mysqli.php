<?php
	
	$host= 'localhost';
	$user = 'psread';
	$passwd = 'localhost';
	$database = 'phpsols';
	if ($connect = mysql_connect($host, $user, $passwd)){
		
		}
		else die ("Could not connected to database!");
		
		if(mysql_select_db($database)){
			
			}
			else die ('connectiion to database failed');
	$table_name = 'images';
	
	
	
	$result = mysql_query('select * from images') or die (mysql_error());
	
	
	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<form action="index_ps.php" method="post">
    
    	Username : <input id="username" name="username" type="text" /><br />
        Password : <input id="password" name="password" type="password" /><br />
        <input name="submit" type="submit" value="Log In"/>
    
    </form>

</body>
</html>