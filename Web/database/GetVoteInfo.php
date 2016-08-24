<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$id = mysql_real_escape_string($_GET['id'], $db); 
	
	$query = "SELECT lastvote FROM Players WHERE id='$id'";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	$row = mysql_fetch_row($res);
	$lastvote = $row[0];
	$hasVoted = "0";
	
	$query = "SELECT * FROM Votes WHERE voteId>'$lastvote' AND ended = '0' ORDER BY voteId LIMIT 1";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	$nbrows = mysql_num_rows ($res);
	
	if ($nbrows == 0) 
	{
		$query = "SELECT * FROM Votes WHERE voteId>='$lastvote' ORDER BY voteId DESC LIMIT 1 ";
		$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
		$nbrows = mysql_num_rows ($res);
		$hasVoted = "1";
    } 

	if ($nbrows == 0) 
	{
		echo "-1,-1";
		exit;
    }

	$row = mysql_fetch_row($res);
	print $row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6].",".$row[7].",".$row[8].",".$row[9].",".$row[10].",".$row[11].",".$hasVoted.",";	
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
