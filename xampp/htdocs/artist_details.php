<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Artist Details</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">

#fb{
	float:right;
	margin-right:30px;
	margin-top:-350px;
	}
</style>

 
</head>

<body>

	<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/menu.inc.php'); ?>
   
<div id="content" style="color:#FF0;">
	
    <div id="profile" style="width:660; float:left; padding-right:100px;">
		<h2>Artist Profile :</h2>
        <hr width="500px" align="left" color="#2E878B"/>
    	<?php
			
			
			include('includes/dbConnect.inc.php'); 
			
			$artistID = $_GET['artistID'];
			
			$sql = mysql_query("SELECT * FROM artist WHERE artistId = $artistID");	
			
			$details = mysql_fetch_assoc($sql);	
			
			
			
		?>
        
        <h2>Name          :<?php echo " ".$details['firstName']; ?> <?php echo " ".$details['lastName']; ?></h2>
        <h2>Date of Birth :<?php echo " ".$details['dateOfBirth']; ?></h2>
        <h2>Nationality   :<?php echo " ".$details['nationality']; ?></h2>
        <h2 style="text-decoration:underline;">Other Info    :</h2><h2><?php echo " ".$details['otherInfo']; ?></h2>
        
        
        <?php mysql_close();?>
    	</div>
        <p><a href="artist_info.php"><img src="images/back.png" width="50px" height="50px" /></a></p>
    </div>
    		
 <?php include('includes/footer.inc.php'); ?>

