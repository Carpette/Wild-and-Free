<?php
    $db = mysql_connect ("wild.game.sql.free.fr", "wild.game", "ccarving");
	mysql_select_db('wild_game') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$id = mysql_real_escape_string($_GET['id'], $db); 
	$mail="";
	
	$query = "SELECT mail FROM Contesters WHERE id='$id';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 


	$nbrows = mysql_num_rows ($res);
	if ($nbrows > 0) 
	{
		$row = mysql_fetch_row($res);
		$mail=$row[0];
	}	
	
	
	$query = "SELECT count(*) FROM Contest WHERE referrerId='$id' OR referrerId='$mail';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 


	$nbrows = mysql_num_rows ($res);
	if ($nbrows > 0) 
	{
		$row = mysql_fetch_row($res);
		echo "Your score is : $row[0] points";
		exit;
	}  
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
