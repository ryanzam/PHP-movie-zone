<?php 
 	function dbConnect($usertype, $connectionType = 'mysqli'){
		$host = 'localhost';
		$db = 'phpsols';
		if ($usertype == 'read') {
			$user = 'psread';
			$pwd = 'localhost';
			echo 'connected as reader';
		} elseif ($usertype == 'write') {
			$user = 'pswrite';
			$pwd = 'localhost';
		} else {
			exit('Unrecognized connection type');
		}
		if ( $connectionType == 'mysqli') {
			return new MySQLi($host, $user, $pwd, $db) or die ('Cannot open database');			
		} else {
				try {
						return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
					} catch (PDOException $e) {
						echo 'Cannot connect to Database';
						exit;
					}
			}
	}
?>