<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	$checkKey="pitawitoutoutegru"; 
	
	// Strings must be escaped to prevent SQL injection attack. 
	$question = mysql_real_escape_string($_GET['question'], $db); 
	$answer1 = mysql_real_escape_string($_GET['answer1'], $db); 
	$answer2 = mysql_real_escape_string($_GET['answer2'], $db);
	$answer3 = mysql_real_escape_string($_GET['answer3'], $db);
	$answer4 = mysql_real_escape_string($_GET['answer4'], $db);
	$hash = $_GET['hash']; 

	$qr = $_GET['question'];

	$q_hash = md5($checkKey.$qr); 
	 
	if(strcmp($q_hash, $hash) == 0) { 
		// Send variables for the MySQL database class. 
		$query = "insert into Votes values (NULL,'$question','$answer1','$answer2','$answer3','$answer24',0,0,0,0,0,0);"; 
		$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		mysql_free_result ($res);
	} 
	else
	{
		echo "check failed";
	}	
	
    mysql_close ($db);
?>
