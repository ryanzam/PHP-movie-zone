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
<title>New - User</title>
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

<?php include('includes/admin_header.inc.php'); ?>
    
   <?php include('includes/admin_menu.inc.php'); ?>

	 <div id="content">
   
    <?php 
		
		 include('includes/dbConnect.inc.php');
		 
		 
		 //updating
		 if(isset($_POST['edit'])){
			 $sql = "UPDATE user SET userId = '$_POST[userId]', firstName='$_POST[firstName]', lastName = '$_POST[lastName]', username = '$_POST[username]', password = '$_POST[password]' WHERE userId = '$_POST[hidden_userId]'";			 
			 mysql_query($sql);	
			 echo "successfully Edited!!";		 
			 
			 }
			 
			 //deleting
			 
			 if(isset($_POST['delete'])){
			 $sql = "DELETE FROM user WHERE userId = '$_POST[hidden_userId]'";			 
			 mysql_query($sql);	
			 echo "<p>Successfully deleted!!</p>";
			}
			 
			 //adding 
			 
					
			 
			 if(isset($_POST['add_admin'])){
				 if(!empty($_POST['add_username']) && !empty($_POST['add_password'])){		 
				 
				 $sql = "INSERT INTO user VALUES ('$_POST[add_userId]', '$_POST[add_firstName]', '$_POST[add_lastName]', '$_POST[add_username]', '$_POST[add_password]')";
				 mysql_query($sql);
				 echo "<p>New admin added!</p>";
				 }
				 else 
				 echo "<p><font color='#FF3300'>* Username/Password missing!</p>";
				
			 }
		 	
		 
		 
		 
		 //query the database
		 $sql = mysql_query('Select * from user');
		 //fetching array
		 echo '<table border="1" cellspacing="0" align="center" width="960px"><tr><th>First Name</th><th>Last Name</th><th>UserName *</th><th>Password *</th></tr>';
		 while ($rows =mysql_fetch_array($sql)){	
		  
			 	
				//display the value				
				echo "<form action='admin_add.php' method='post'>";
				echo "<tr>";
		
				//echo '<td width="5">'.'<input type="number" size="5" name="userId" value="'.$rows['userId'].'" </td>';
				echo "<td width=20>"."<input type=text size=20 maxlength=30 name=firstName value=".$rows['firstName'].">"." </td>";
				echo "<td width=20>"."<input type=text size=20 maxlength=30 name=lastName value=".$rows['lastName'].">"." </td>";
				echo "<td width=20>"."<input type=text size=20 maxlength=30 name=username value=".$rows['username'].">" ." </td>";
				echo "<td width=20>"."<input type=password size=20 maxlength=20 name=password value=".$rows['password'].">". " </td>";
				//echo '<td width="20">'.'<input type="text" size="20" name="usertype" value="'.$rows['usertype'].'" </td>';
				echo "<td>"."<input type=hidden name = hidden_userId value=".$rows['userId']. ">" ."</td>";
				
				//echo '<td>'.'<input type="submit" name="edit" value="Edit"'.'</td>';
				//echo '<td>'.'<input type="button" name="delete" value="Delete"'.'</td>';	
				?>			
				<form action="" method="post">	
				 <td><input type="submit" name="edit" value="Edit" onclick="return confirm('Are you sure you want to update this?')" /></td>
				 <td><input type="submit" name="delete" value="Delete" onclick="return confirm('Are you sure you want to delete this?')"  /></td>	
                 </form>
				
                <?php
				echo "</tr>";
				echo "</form>"; 
				
				}
				echo "<form action='admin_add.php' method='post'>";
				echo "<tr>";
				//echo '<td width="5"><input type="number" size="5" name = "add_userId"></td>';
				echo "<td width=20><input type=text size=20 maxlength=20 name =add_firstName></td>";
				echo "<td width=20><input type=text size=20 maxlength=20 name =add_lastName></td>";
				echo "<td width=20><input type=text size=20 maxlength=20 name =add_username></td>";
				echo "<td width=20><input type=password size=20 maxlength=20 name =add_password></td>";
				//echo '<td width="20"><input type="text" size="20" name = "add_usertype"></td>';
				
				echo "<td colspan=3 size=25><input type=submit size=25  name=add_admin value='Add a new Admin'></td>";
				echo "</tr>";
				echo "</form>";
				
				echo "</table>";
			?>
		
	   
	
    

 </div>      
           
    
    <?php include('includes/footer.inc.php'); ?>