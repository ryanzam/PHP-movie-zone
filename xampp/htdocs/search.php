<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Search-page</title>
</head>

<body>

<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/menu.inc.php'); ?>
   
    <div id="content"> 
    	<div id="seach_item">
    	<h3>Search a movie</h3>
        <form action="search.php" method="get">
        	
            <input type="text" name="search" size="80" autocomplete="on"  placeholder="Type to search..."/>
            <select name="search_type">
            	<option value="movie">By movie</option>
                <option value="artist">By artist</option>
            </select>
            
            <br /><br />
            
            <input size="5" type="submit" name="submit" value="Search" /><input size="5" type="reset" value="Clear" />
            
        </form>
        
 <?php
		include ('includes/dbConnect.inc.php');
		
		if(isset($_GET['submit'])){
			
			$search_text = mysql_real_escape_string((trim($_GET['search'])));
			$pattern = '#[^0-9a-zA-Z]#';
			$search_text = preg_replace($pattern," ",$search_text);
			
			if($_GET['search_type']=='movie'){		
			
			$sql = "SELECT * FROM movie
					WHERE title LIKE '$search_text%' OR title LIKE '%$search_text%'";
			$row = mysql_query($sql);
			$num_row = mysql_num_rows($row);
			echo $num_row." results for <b>'".$search_text."'</b></br>";
			echo "<hr width=500px align=left></hr>";
			if($num_row > 0){
				while($result = mysql_fetch_array($row)){
				
			echo "<a style='color:#FFFF00;' href='movie_details.php?movieCode=".$result['movieCode']."'>".$result['title']."</a><br>";
				}
			}
			}
			elseif($_GET['search_type']=='artist'){		
			
			$sql = "SELECT * FROM artist
					WHERE firstName LIKE '$search_text%' OR lastName LIKE '$search_text%'";
			$row = mysql_query($sql);
			$num_row = mysql_num_rows($row);
			echo $num_row." results for <b>'".$search_text."'</b></br>";
			echo "<hr width=500px align=left></hr>";
			if($num_row > 0){
				while($result = mysql_fetch_array($row)){
				
			echo "<a  style='color:#FC0;' href='artist_details.php?artistID=".$result['artistId']."'>.".$result['firstName']." ".$result['lastName']."</a><br>";
				}
			}
			}
			else
				echo "No Results for <b>'". $search_text."'</b>";
				
				
						
						}
		
		
			
			
			
 ?>
        </div>
    
    </div>

<?php include('includes/footer.inc.php'); ?>