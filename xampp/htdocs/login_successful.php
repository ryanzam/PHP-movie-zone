<?php 
	//initialize session
	session_start();	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Admin-arena</title>
<style type="text/css">
#header{
	background-image:url(images/admin-banner.jpg) !important  ;
	}
	
#logInfo{
	float:right;
	color:#F09;
	}
#content{
	background-color:#0C0 !important;
	}
#menu{
	background-color:#0CF !important;
	}
#footer{
	background-color:#09C !important;
	}

</style>
</head>

<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/admin_menu.inc.php'); ?>
    
    <div id="content">
    	
        <h2>Welcome, <?php echo $_SESSION['name']?>!</h2>
        
        
        
    
    </div>
    
    <?php include('includes/footer.inc.php'); ?>