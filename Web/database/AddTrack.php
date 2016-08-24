<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	$secretKey="flikosplu4012"; 
	
	// Strings must be escaped to prevent SQL injection attack. 

	$raceid = mysql_real_escape_string($_GET['raceid'], $db); 
	$hash = $_GET['hash']; 

	$real_hash = md5($secretKey . $raceid ); 
	if($real_hash == $hash) { 
		// Send variables for the MySQL database class. 
		$query = "insert into Tracks values ('$raceid', '0', '0','0');"; 
		$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	} 	
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
