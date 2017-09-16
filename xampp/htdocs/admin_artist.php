<?php
	session_start();
	if (!(isset($_SESSION['name']) && $_SESSION['name'] != '')) {

		header ("Location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Admin-Artist</title>
<style type="text/css">
#header{
	background-image:url(images/admin-banner.jpg) !important  ;
	}
#logInfo{
	float:right;
	color:#F09;
	}
	table{
	margin-left:100px !important;
	}
#content{
	background-color:#0C0 !important;
	color:#000 !important;
	}
#menu{
	background-color:#0CF !important;
	}
#footer{
	background-color:#09C !important;
	}

</style>
</head>

<?php include('includes/admin_header.inc.php'); ?>
    
   <?php include('includes/admin_menu.inc.php'); ?>
    
    <div id="content">
    	<div>
     <?php 
		 include('includes/dbConnect.inc.php');
		 
		 
		
			 
			 //adding 
			 if(isset($_POST['add'])){	
			 	if(!empty($_POST['add_firstName']) || !empty($_POST['add_lastName'])){
				$add_info = mysql_real_escape_string($_POST['add_otherInfo']);	
				 
				 $Add = "INSERT INTO artist VALUES ('', '$_POST[add_firstName]', '$_POST[add_lastName]', '$_POST[add_dateOfBirth]', '$_POST[add_nationality]', '$add_info')";
				 
				 mysql_query($Add);
				 echo "<p>Sucessfully Added!!</p>";
				}
				else{
					echo "<p><font color='red'>*Required field(s) missing!!</p>";
				}
					 
				
				
			 }
		 	
	?>			 
		 
		<form action="admin_artist.php" method="post">
        <table border="1" cellspacing="0" >
            	
                 
				 <tr><th>First Name *</th><td><input type="text" maxlength=20 name="add_firstName" /> </td></tr>
				 <tr><th>Last Name *</th><td><input type="text" maxlength=20 name="add_lastName" /> </td></tr>
				 <tr><th>DOB</th><td><input type="date" name="add_dateOfBirth" /> </td></tr>
				 <tr><th>Nationality</th><td><input type="text" maxlength=15 name="add_nationality"  /></td></tr>
				 <tr><th>Other Info</th><td><textarea name="add_otherInfo" ></textarea></td></tr>
				 
			 
				<td colspan=3><input type=submit name=add value='Add a record'/></td></tr>
            </table>
        </form> 
		 
		
	
				
				<p><a href="admin_artist_list.php">View Artists>></a></p>
				
			
            
         </div>
         </div>

<?php include('includes/footer.inc.php'); ?>
         
		 