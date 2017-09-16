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
<title>Admin-Movie</title>
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
		 
		 
		 //updating
		 
		 if(isset($_POST['update'])){ 
			
			$update = "UPDATE movie SET movieCode='$_POST[movieCode]', title='$_POST[title]' , category='$_POST[category]', movieDesc='$_POST[movieDesc]' WHERE movieCode='$_POST[hidden_movieCode]'";    			 
			 mysql_query($update);	
			 mysql_query("UPDATE roll SET movieCode='$_POST[movieCode]' WHERE movieCode='$_POST[hidden_movieCode]'");
			 echo "<p>Sucessfully updated!!</p>";		 
			 
			 }
			 
			 //deleting
			 
			 if(isset($_POST['delete'])){
			 $delete = "DELETE FROM movie WHERE movieCode = '$_POST[hidden_movieCode]'";			 
			 mysql_query($delete);
			 mysql_query("DELETE FROM roll WHERE movieCode='$_POST[hidden_movieCode]'");
			 echo "<p>Successfully deleted!!</p>";	
			}
			 
			
		 	
?>		 
		 
		 
<?php	 
		 //query the database
		 $sql = mysql_query('Select * from movie');
		 //fetching array
		 echo '<table border="1" cellspacing="0" align="center" width="960px"><tr><th>Movie Code</th><th>Title</th><th>Image</th><th>Category</th><th>Movie Description</th></tr>';
		 while ($rows =mysql_fetch_array($sql)){	
		  
			 	
				//display the value				
				echo "<form action=admin_movie_list.php method=post enctype=multipart/form-data>";
				echo "<tr>";
				echo "<td>" . "<input type=number name=movieCode maxlength=15 value=" . $rows['movieCode'] .">" . " </td>";
				echo "<td>" . "<input type=text name=title maxlength=50 value='" . $rows['title'] . "'>"." </td>";
				echo "<td>" . $rows['image']." </td>";
				echo "<td>" . "<input type=text name=category maxlength=10 value=" . $rows['category'] . ">"." </td>";
				echo "<td>" . "<input type=text name=movieDesc maxlength=200 value='" . $rows['movieDesc'] . "'>"." </td>";

				echo "<td>" . "<input type=hidden name=hidden_movieCode value=" . $rows['movieCode'] . " </td>";
		 
				?>
                <form action="admin_movie_list.php" method="post">	
				 <td><input type="submit" name="update" value="Update" onclick="return confirm('Are you sure you want to update this?')" /></td>
				 <td><input type="submit" name="delete" value="delete" onclick="return confirm('Are you sure you want to delete this?')"  /></td>	
                 </form>
				
                <?php
				echo "</form>";
		 }
				echo "</table>";
				mysql_close();
			?>
            <p><a href="admin_movie.php">« Back to movies</a></p>
         </div>
         </div>      
           
    
    <?php include('includes/footer.inc.php'); ?>