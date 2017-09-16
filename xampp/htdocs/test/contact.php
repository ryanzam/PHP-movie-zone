<?php 
	include('./includes/title.inc.php');
	$errors = array();
	$missing = array();
	if(isset($_POST['send'])){
		$to = 'ryanzam2005@yahoo.com';
		$subject = 'Feedback';
	}
	?>
     <?php if($missing || $errors){ ?>
				<p class="warning">Please fix the items</p> <?php }?>

<title>Japan Journey<?php echo "&#8212:{$title}"; ?></title>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="header">
	<h1>Japan Journey</h1>
</div>
<?php include('./includes/menu.inc.php'); ?>
	
    <div id="wrapper">
		
	<div id="maincontent">
    
    	<h1> Contact Us </h1>
        <?php if($missing || $errors){ ?>
				<p class="warning">Please fix the items</p> <?php }?>
        <h2>Please leave your comments </h2>
	<form id="feedback" method="post" action="">
    	<p>
        	<label for="name">Name : <?php if($missing && in_array('name', $missing)) {?>
            <span class="warning">Please enter name</span> <?php } ?>
            </label><br />
            
            
            <input name="name" id="name" type="text" class="formbox" />
        </p>
        <p>
        	<label for="email">Email :<?php if($missing && in_array('email', $missing)) {?>
            <span class="warning">Please enter email</span> <?php } ?>
            </label><br />
            
            
            <input name="email" id="email" type="text" class="formbox" />
        </p>
    	<p>
        	<label for="comments">Comments :
            <?php if($missing && in_array('comments', $missing)) {?>
            <span class="warning">Please enter comments</span> <?php } ?>
            </label><br />
            
            <textarea name="comments" id="comments" cols="60" rows="8"></textarea>
        </p>
        <p>
        	<input name="send" id="send" type="submit" value="Send Message" />
        </p>
    </form>
    
    </div>
	</div>
<?php include('./includes/footer.inc.php'); ?>

	
    
	
</body>
</html>