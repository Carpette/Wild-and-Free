<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	$secretKey="flikosplu4012"; 
	$checkKey="pitawitoutoutegru"; 
	
	// Strings must be escaped to prevent SQL injection attack. 
	$seed = mysql_real_escape_string($_GET['seed'], $db); 
	$hash = $_GET['hash']; 

	$real_hash = md5($checkKey.$seed); 
	 
	if($real_hash == $hash) { 
		// Send variables for the MySQL database class. 
		$fullKey = $seed.'-'.$hash;
		$hashfullkey = md5($secretKey.$fullKey);
		$query = "insert into FullKeys values (NULL,'$seed','$hash','$hashfullkey',NULL,NULL);"; 
		$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		mysql_free_result ($res);
	} 
	else
	{
		echo "invalid key";
	}	
	
    mysql_close ($db);
?>
