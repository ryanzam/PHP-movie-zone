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
table{
	margin-left:100px !important;
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
		 
			 
			 //adding 			 
			 if(isset($_POST['add_record'])){
				if(!empty($_POST['add_title']) && !empty($_POST['add_category']) && !empty($_POST['add_movieDesc'])){
					
					$place = "images/";
				//return file component of the path
				$place = $place.basename($_FILES['add_image']['name']);	
				
				$add_image = $_FILES['add_image']['name'];
				
				// checking for the extension of the file
				$fileExt = strtolower(substr($add_image, strrpos($add_image, '.') +1 ));
				
				if(!($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "png" )){
					echo "<font color='red'><p>Choose an image file</p>";
					}
					
					else{	
				 
				 $sql = "INSERT INTO movie VALUES ('$_POST[add_movieCode]', '$_POST[add_title]', '$add_image', '$_POST[add_category]', '$_POST[add_movieDesc]','','','')";
				 mysql_query($sql);
				 
				 
				 $actors = $_POST['actors'];
				 $num_actors = count($actors);
				 
				 for ($i=0; $i<$num_actors; $i++){
					 mysql_query("INSERT INTO roll VALUES ('$_POST[add_movieCode]','$actors[$i]')");
					 }
				 
				 
				 move_uploaded_file($_FILES['add_image']['tmp_name'],$place);
				 echo "<p>New row added!!</p>";
				
				 }
			 
					
					}				 
				 else{
					 echo "<font color='red'><p>*Required field(s) missing!!</p>";
					 }
			 
			 }
		 	
?>		 
		
	<h2>Please fill out all the fields to add!</h2>	 
	<form action="admin_movie.php" method="post" enctype="multipart/form-data">
    	<table  border="1" cellspacing="0">
        	<tr><th>Movie Code *</th><td><input type="number" maxlength=10  name="add_movieCode" /></td></tr>
        	<tr><th>Title *</th><td><input type="text" maxlength=50 name="add_title" /></td></tr>
            <tr><th>Image *</th><td><input type="file" maxlength=50 name="add_image" /></td></tr>
            <tr><th>Category *</th>
            <td><select name="add_category" >
            	<option value="">--Select--</option>
      			<option value="action">Action</option>
                <option value="adventure">Adventure</option>
                <option value="animation">Animation</option>
				<option value="biography">Biography</option>
                <option value="comedy">Comedy</option>
                <option value="crime">Crime</option>
                <option value="drama">Drama</option>
                <option value="fantasy">Fantasy</option>
                <option value="history">History</option>
                <option value="horror">Horror</option>
                <option value="mystery">Mystery</option>
                <option value="romance">Romance</option>
                <option value="sci">Sci-Fi</option>
                <option value="thr">Thriller</option>
                <option value="war">War</option>
                <option value="wes">Western</option>
            </select></td></tr>
            <tr><th>Movie Description * </th><td><input type="text" maxlength=200 name="add_movieDesc"></td></tr>
            <tr><th>Actors</th>
            <td><select multiple="multiple" name="actors[]">
            	<?php
				$sql="SELECT * FROM artist ORDER BY firstName ASC";
				$result = mysql_query($sql);
				while ($row=mysql_fetch_array($result)){
					echo "<option value=". $row['artistId'].">".$row['firstName']." ".$row['lastName']."</option>";
					}
					
				 ?>
                </select></td>
            <tr><th><input type="submit" name="add_record" value="Add" /></th><td><a href="admin_movie_list.php"><input type="button" value="View movies"/></a></td></tr>
            
        </table>
    </form>
    	<p><a href="admin_movie_list.php">View movies>></a></p>
            
         </div>
         </div>      
           
    
    <?php include('includes/footer.inc.php'); ?>