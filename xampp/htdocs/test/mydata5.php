<html>
<head>
</head>
<body>
<?php

include('includes/dbConnect.inc.php');


if(isset($_POST['update'])){
$UpdateQuery = "UPDATE movie SET movieCode='$_POST[movieCode]', title='$_POST[title]' , image='$_POST[image]', category='$_POST[category]', movieDesc='$_POST[movieDesc]' WHERE movieCode='$_POST[hidden]'";               
mysql_query($UpdateQuery);
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM movie WHERE movieCode='$_POST[hidden]'";          
mysql_query($DeleteQuery, $con);
};

if(isset($_POST['add'])){
$AddQuery = "INSERT INTO movie (MovieCode, title, image, category, movieDesc) VALUES ('$_POST[umovieCode]','$_POST[uimage]','$_POST[ucategory]','$_POST[umovieDesc]')";         
mysql_query($AddQuery);
};



$sql = "SELECT * FROM movie";
$myData = mysql_query($sql);
echo "<table border=1>
<tr>
<th>Topic</th>
<th>Name</th>
<th>Attendance</th>
</tr>";
while($record = mysql_fetch_array($myData)){
echo "<form action=mydata5.php method=post>";
echo "<tr>";
echo "<td>" . "<input type=text name=movieCode value=" . $record['movieCode'] . " </td>";
echo "<td>" . "<input type=text name=title value=" . $record['title'] . " </td>";
echo "<td>" . "<input type=text name=image value=" . $record['image'] . " </td>";
echo "<td>" . "<input type=text name=category value=" . $record['category'] . " </td>";
echo "<td>" . "<input type=text name=movieDesc value=" . $record['movieDesc'] . " </td>";

echo "<td>" . "<input type=hidden name=hidden value=" . $record['movieCode'] . " </td>";

echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}
echo "<form action=mydata5.php method=post>";
echo "<tr>";
echo "<td><input type=text name=umovieCode></td>";
echo "<td><input type=text name=utitle></td>";
echo "<td><input type=text name=uimage></td>";
echo "<td><input type=text name=ucategory></td>";
echo "<td><input type=text name=umovieDesc></td>";

echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</form>";
echo "</table>";
mysql_close();

?>

</body>
</html>