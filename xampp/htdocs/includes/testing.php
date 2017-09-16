<html>
<body>
</body>
</html>

<?php 
	include ('dbConnect.inc.php');
	
	$sql = mysql_query("INSERT INTO movie (id, movieCode, title, image, category, movieDesc) VALUES ('','Ranjam','','Suspense','Starring ranjam' ");
	echo "data inserted";
?>