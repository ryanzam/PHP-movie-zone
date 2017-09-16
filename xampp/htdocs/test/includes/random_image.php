<?php
$image = array('Photo01', 'Photo02', 'Photo03', 'Photo04');
$i = rand(0 ,count($image)-1);
$selectedImage = "images/{$image[$i]}.jpg";