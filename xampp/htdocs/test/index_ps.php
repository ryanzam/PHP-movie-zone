<?php 
	session_start();

?>
<?php include('./includes/title.inc.php'); 
		include('./includes/random_image.php');
?>

<head>
	 <link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
<div id="header">
<h1>Japan Journey</h1>
</div>
<div id="wrapper">
    <?php include('./includes/menu.inc.php'); ?>
<div id="maincontent">
    <h2>A journey through Japan with PHP</h2>
    <p>One of the benefits of using PHP . . .</p>
<div id="pictureWrapper">
    <img src="<?php echo $selectedImage; ?>" alt="Random Image" width="350" height="237" class="picBorder">
</div>
    <p>Ut enim ad minim veniam, quis nostrud . . .</p>
    <p>Eu fugiat nulla pariatur. Ut labore et dolore . . .</p>
    <p>Sed do eiusmod tempor incididunt ullamco . . .</p>
    <p>Quis nostrud exercitation eu fugiat nulla . . .</p>
</div>

</div>

<?php include('./includes/footer.inc.php'); ?>
<p>&nbsp;</p>
</body>