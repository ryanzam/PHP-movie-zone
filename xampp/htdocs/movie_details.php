<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css">
#movie_details{
	width:900px;
	height:405px;
	margin:30px 30px;
	}
#movie_details_left{
	float:left;
	width:
	}
#movie_details_right{
	padding-top:100px;
	padding-left:10px;
	font:"Arial Black", Gadget, sans-serif;
	font-size:20px;
	}
	
#movImg{
	border:5px solid #FF0;
	}
p{
	margin-left:240px;
	}

</style>


<title>Movie Details</title>
</head>

<body>
	
    
	

	<?php include('includes/header.inc.php'); ?>
    
   <?php include('includes/menu.inc.php'); ?>
    
    <div id="content">
    
     <div id="movie_details">
     <div id="movie_details_left">
    <?php include('includes/dbConnect.inc.php');
	
	$movieCode = $_GET['movieCode'];
    
	$sql1= "SELECT movie.title, movie.category, movie.image, movie.movieDesc, artist.firstName, artist.lastName FROM movie
	JOIN roll ON movie.movieCode = roll.movieCode
	JOIN artist ON artist.artistId = roll.artistId
		WHERE movie.movieCode = '$movieCode'";
		
		$result = mysql_query($sql1);
		
		$row1 = (mysql_fetch_array($result));
			
				echo "<h1>".$row1['title']."</h1>";
				echo "<img id=movImg src=images/" .$row1['image'] .">";
				echo "</div>";
				echo "<div id='movie_details_right'>";
				echo "<p>Category : ". $row1['category']."</p>";
				echo "<p>Movie Description : ". $row1['movieDesc']."</p>";
				?>
                <p>Actors :</p>
                <hr color="#0099FF" width="200px;" align="left" />
				<?php
				
				$sql2= "SELECT movie.title, movie.category, movie.image, movie.movieDesc, artist.artistId, artist.firstName, artist.lastName FROM movie
	JOIN roll ON movie.movieCode = roll.movieCode
	JOIN artist ON artist.artistId = roll.artistId
		WHERE movie.movieCode = '$movieCode'";
		
		$result1 = mysql_query($sql2);
			while($row = (mysql_fetch_array($result1))){
				?>
                <p><a  style="color:#FC0;" target="details" href="artist_details.php?artistID=<?php echo $row['artistId']; ?>"> 
                <?php
				
					echo "<p> ".$row['firstName']."  ". $row['lastName']."</p>";
					}
			?>
          </a></p>
            </div>
            </div>
            <a href="index.php" style="text-decoration:none; color:#FF0;"><img src="images/back.png" width="50px" height="50px" />Back to HOme</a>
    </div>
    
    <?php include('includes/footer.inc.php'); ?>
 