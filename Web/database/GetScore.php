<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$id = mysql_real_escape_string($_GET['id'], $db); 
	$raceid = mysql_real_escape_string($_GET['raceid'], $db); 

	
	$query = "SELECT lapTime,raceTime FROM TimeTrial WHERE playerId='$id' AND raceid='$raceid'";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	
	$nbrows = mysql_num_rows ($res);
	if ($nbrows == 0) 
	{
		echo "-1,-1";
		exit;
    } 

	$row = mysql_fetch_row($res);
	print $row[0].",".$row[1];	
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
