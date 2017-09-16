<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css" />

<title>Contact - Movie Gallery</title>
</head>

<body>

	<?php include('includes/header.inc.php'); ?>
    
	<?php include('includes/menu.inc.php'); ?>
    
    <div id="content">
    
    <h2>Contact Us</h2>
    <div id="form">
    
      <?php 
	
	if(isset($_POST['submit'])){
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = 'Name:' .$name . "\n"
					.'Email:' . $email. "\n"
					.'Message:' . $_POST['message'];
		
		$to = "ryanzam2005@yahoo.com";
		$sub = "Movie Gallery";
		
		if($name){
			
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == TRUE){
				
				if($message){
					
					mail($to, $sub, $message);
						header('Location:thankyou.php');
						}
						else{
							echo '<h5 style="color:red">*Please enter message</h5>';
					} }
					else {
						echo '<h5 style="color:red">*Please enter a valid email</h5>';
					} }
					else {
						echo '<h5 style="color:red">*Please enter your name!</h5>';
					
					}				
						
			
		
			}
?>
    <form action="" method="post">
    	
        <label>Name :  </label><br />
        <input type="text" name="name" width="200px"/><br />
        
        <label>Email : </label><br />
        <input type="text" name="email" width="200px"/><br />
        
        <label>Message: <br />
        <textarea name="message" rows="10" cols="40"></textarea><br /><br />
        
        <input type="submit" name="submit" value="Send"/>
    	
    </form>
    </div> 
    
    </div>
    
    	<?php include('includes/footer.inc.php'); ?>
