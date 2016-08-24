<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	$raceid = mysql_real_escape_string($_GET['raceid'], $db); 

	$query = "SELECT p.id, p.alias ,t.raceTime FROM TimeTrial t, Players p WHERE raceid='$raceid' AND p.id=t.playerId ORDER by t.raceTime ASC LIMIT 20 ";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	$num_results = mysql_num_rows($res);  
 
    for($i = 0; $i < $num_results; $i++)
    {
         $row = mysql_fetch_row($res);
         echo $row[0] . "\t" .$row[1] . "\t" . $row[2] . "\n";
    }
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
