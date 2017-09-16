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
        <form meth>
         <input type="text" name="search_artist" size="80" placeholder="Search for artists..."/><input type="submit" name="but_search_artist" value="Search"/>
         </form>
     <?php 
		 include('includes/dbConnect.inc.php'); ?>
		 
         <?php
		 if(isset($_REQUEST['but_search_artist']) == "Search"){
			 $sql_search = "SELECT * from artist where firstName like '$_REQUEST[search_artist]%' OR lastName like '$_REQUEST[search_artist]%' OR nationality like '$_REQUEST[search_artist]%'";
			 $sql_row = mysql_query($sql_search);
			 $num = @mysql_num_rows(($sql_row));
			 if($num>0)
			 {
				 echo "<table border=1>";
				 ?>
				 
                 <?php while ($result = @mysql_fetch_assoc($sql_row))
				 { ?>
                 <tr><td><?php echo $result['artistId']; ?></td><td><?php echo $result['firstName']; ?></td><td><?php echo $result['lastName']; ?></td><td><?php echo $result['dateOfBirth']; ?></td><td><?php echo $result['nationality']; ?></td><td><?php echo $result['otherInfo']; ?></td></tr>				
                 <?php
				 }
                 echo "</table>"; 
				 }
				 else
				 echo "No result found!";
                 }
				 ?>
			 
		 
			
			<?php
			//updating
		 if(isset($_POST['update'])){
			 $Upd = "UPDATE artist SET firstName='$_POST[firstName]', lastName = '$_POST[lastName]', dateOfBirth= '$_POST[dateOfBirth]', nationality= '$_POST[nationality]', otherInfo= '$_POST[otherInfo]' WHERE artistId = '$_POST[hidden_artistId]'";			 
			 mysql_query($Upd);	
			 echo "<p>Updated Successfully</p>";
		 }
			 
			 //deleting
			 
			 if(isset($_POST['delete'])){
			 $Del = "DELETE FROM artist WHERE artistId = '$_POST[hidden_artistId]'";			 
			 mysql_query($Del);
			 mysql_query("DELETE FROM roll WHERE artistId = '$_POST[hidden_artistId]' ");
			 echo "<p>Deleted Successfully</p>";	
			}
			 
		 	
				 
		 
		 
		 
		 //query the database
		 $sql = mysql_query('Select * from artist');
		 //fetching array
		 echo '<table border="1" cellspacing="0" align="center" width="960px"><tr><th>First Name</th><th>Last Name</th><th>DOB</th><th>Nationality</th><th>Other Info</th></tr>';
		 while ($rows =mysql_fetch_assoc($sql)){	
		  
			 	
				//display the value				
				 echo "<form action=admin_artist_list.php method=post>";
				 echo "<tr>";
				 //echo "<td width=5>" . "<input type=number size=5 name=artistId value=" . $rows['artistId'] .">" . " </td>";
				 echo "<td width=15>" . "<input type=text size=15 maxlength=20 name=firstName value=" . $rows['firstName'] .">" . " </td>";
				 echo "<td width=15>" . "<input type=text size=15 maxlength=20 name=lastName value=" . $rows['lastName'] .">" . " </td>";
				 echo "<td width=15>" . "<input type=date size=15 name=dateOfBirth value=" . $rows['dateOfBirth'] .">" . " </td>";
				 echo "<td width=15>" . "<input type=text size=15 maxlength=15 name=nationality value=" . $rows['nationality'] .">" . " </td>";
				 echo "<td width=35>" . "<input type=text size=35 maxlength=250 name=otherInfo value='" . $rows['otherInfo'] ."'>" . " </td>";
				 
				 echo "<td>" . "<input type=hidden name=hidden_artistId value=" . $rows['artistId'] .">" . " </td>";
				?>
                <form action="admin_artist_list.php" method="post">	
				 <td><input type="submit" name="update" value="Update" onclick="return confirm('Are you sure you want to update this?')" /></td>
				 <td><input type="submit" name="delete" value="delete" onclick="return confirm('Are you sure you want to delete this?')"  /></td>	
                 </form>
                <?php	
				echo "</form>"; 
				}
				
				echo "</table>";
				mysql_close();
				
				
				 
			?>
            <p><a href="admin_artist.php">« Back to artists</a></p>
            
           
         </div>
         </div>

<?php include('includes/footer.inc.php'); ?>
         
		 