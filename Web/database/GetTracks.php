<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');
	
	$query = "SELECT t.raceid FROM Tracks t ORDER by t.raceid ASC LIMIT 32 ";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	$num_results = mysql_num_rows($res);  
 
    for($i = 0; $i < $num_results; $i++)
    {
         $row = mysql_fetch_row($res);
         echo $row[0] . "\n";
    }
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
