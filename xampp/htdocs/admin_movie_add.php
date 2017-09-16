<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
#imgDiv{
width:217px;
height:317px;
float:left;
border:2px solid #FFFF00;
}
#movDes{
	margin-left:225px;
	font-size:16px;
	}
#rate_form{
	padding-top:80px;
	}
	
</style>


<title>Movie Gallery</title>
</head>

<body>
	
    
	

	<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/menu.inc.php'); ?>
    
    <div id="content">
    	
        
        
        <table border=1 cellspacing="10">
        
        <?php include('includes/dbConnect.inc.php'); 
		
			$pics = mysql_query("SELECT * FROM movie ");
			
			$i = 0; $num_per_line = 2;
			
			while ($row = mysql_fetch_array($pics))
			{
				if ($i%$num_per_line == 0) 
				
				echo "<tr>";			
				
				echo "<td width=480px height=317px>";
				
				echo "<div id='imgDiv'><img src=images/" .$row['image'] ."></div>";
				
				echo "<div id='movDes'><h1>".$row['title']."</h1>";
        		
				echo "Category : ".$row['category']."</br>"."</br>";
				
				echo $row['movieDesc']."</div>";
				
				
				
				echo "<form id='rate_form' action='' method=get >";
				
				echo "<input type=hidden name=hidden_movieCode value=" . $row['movieCode'] .">";
				
				echo "<input type=radio name=rating value=1>1";
				echo "<input type=radio name=rating value=2>2";
				echo "<input type=radio name=rating value=3>3";
				echo "<input type=radio name=rating value=4>4";
				echo "<input type=radio name=rating value=5>5";
				echo "<input type=submit name=rate value=Rate>";
				echo " < ".$row['Ratings']." >";
				
				echo "</form>";
				
				echo "</td>";
				$i++;
				 
        		 if($i%$num_per_line == 0) echo "</tr>";
				
				}
				
				if(isset($_GET['rate']) && !empty($_GET['rating'])){
										
					
					$sql = mysql_query("SELECT Ratings, times_rated, total_rates from movie WHERE movieCode = '$_GET[hidden_movieCode]'");
					while ($rows = mysql_fetch_array($sql)){
						$current_ratings = $rows['Ratings'];
						
						$total_rates = $rows['total_rates'];
						
						$current_times_rated = $rows['times_rated'];					
						$new_times_rated = $current_times_rated + 1;
						
						mysql_query("UPDATE movie SET times_rated = '$new_times_rated' WHERE movieCode = '$_GET[hidden_movieCode]'");
						
						$user_ratings = $_GET['rating'];
						$new_total_rates = $total_rates + $user_ratings;
						mysql_query("UPDATE movie SET total_rates = '$new_total_rates' WHERE movieCode = '$_GET[hidden_movieCode]'");	
						
						$new_ratings = round(($new_total_rates / $new_times_rated),1);
						mysql_query("UPDATE movie SET Ratings = '$new_ratings' WHERE movieCode = '$_GET[hidden_movieCode]'");
										
						header('Location:index.php');
						}
						
				}
				
			mysql_close();
			
			?>
        	</table>
           
           <br /> 
        <iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fmoviegallerycom&amp;layout=button_count&amp;show_faces=true&amp;colorscheme=light&amp;font&amp;width=200" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px;" allowTransparency="true"></iframe>
        
        
        </div>
    
    </div>
    
    <?php include('includes/footer.inc.php'); ?>
 