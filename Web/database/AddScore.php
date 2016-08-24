<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	$secretKey="flikosplu4012"; 
	
	// Strings must be escaped to prevent SQL injection attack. 
	$id = mysql_real_escape_string($_GET['id'], $db); 
	$lapTime = mysql_real_escape_string($_GET['lapTime'], $db); 
	$raceTime = mysql_real_escape_string($_GET['raceTime'], $db);  
	$raceid = mysql_real_escape_string($_GET['raceid'], $db); 
	$hash1 = $_GET['hash1']; 
	$hash2 = $_GET['hash2'];

	$real_hash1 = md5($secretKey . $id . $lapTime); 
	$real_hash2 = md5($secretKey . $id . $raceTime);
	if($real_hash1 == $hash1 && $real_hash2 == $hash2) { 
		// Send variables for the MySQL database class. 
		$query = "insert into TimeTrial values ('$id','$raceid', '$lapTime', '$raceTime');"; 
		$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	} 	
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
