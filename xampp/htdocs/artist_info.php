<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Artist Details</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
#artist_names{
	float:left;
	width:638px;
	height:auto;
	}
#fb{
	float:left;
	margin-right:30px;
	}
</style>

 
</head>

<body>

	<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/menu.inc.php'); ?>
   
   <div id="content"> 
   
   <?php include('includes/dbConnect.inc.php'); 
   
   		$sql = mysql_query("SELECT artistId,firstName,lastName from artist ORDER BY firstName ASC");
		
		$row = mysql_fetch_assoc($sql);	
   ?>
   <div id="artist_names">
   <?php do { ?>
   <h2><a  style="color:#FC0;" href="artist_details.php?artistID=<?php echo $row['artistId']; ?>"><?php echo $row['firstName']." ".$row['lastName'];?></a></h2>
    <?php } while ($row = mysql_fetch_assoc($sql))?>
   </div>
   
   <div id="fb">
   <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fmoviegallerycom%3Ffref%3Dts&amp;width=292&amp;height=558&amp;show_faces=true&amp;colorscheme=light&amp;stream=true&amp;border_color=yellow&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:558px;" allowTransparency="true"></iframe>
   </div>
   
   </div>

<?php include('includes/footer.inc.php'); ?>