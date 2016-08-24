<?php
    $db = mysql_connect ("wild.game.sql.free.fr", "wild.game", "ccarving");
	mysql_select_db('wild_game') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$mail = mysql_real_escape_string($_GET['id'], $db); 
	
	$query = "SELECT id FROM Contesters WHERE mail='$mail';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 


	$nbrows = mysql_num_rows ($res);
	if ($nbrows > 0) 
	{
		$row = mysql_fetch_row($res);
		echo "$row[0]";
		exit;
	}

	$query = "insert into Contesters values (NULL, '$mail');"; 
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	$query = "SELECT id FROM Contesters WHERE mail='$mail';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error());
	$nbrows = mysql_num_rows ($res);	
	if ($nbrows < 1)  
	{
		echo "$mail";
	}	
	$row = mysql_fetch_row($res);
	echo "$row[0]";
	exit;    
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
