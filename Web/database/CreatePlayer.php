<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$name = mysql_real_escape_string($_GET['name'], $db); 
	$pass = mysql_real_escape_string($_GET['pass'], $db); 
	$hashfullkey = mysql_real_escape_string($_GET['hashfullkey'], $db); 
	
	$query = "SELECT id FROM Players WHERE alias='$name';";
	$resu = mysql_query($query) or die('Query failed: ' . mysql_error()); 


	$nbrows = mysql_num_rows ($resu);
	if ($nbrows > 0) 
	{
		echo "-1,0,";
		exit;
	}

	$query = "insert into Players values (NULL, '$name', '$pass',0);"; 
	$re = mysql_query($query) or die('Query failed: ' . mysql_error()); 
	$query = "SELECT id FROM Players WHERE alias='$name';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error());
	$nbrows = mysql_num_rows ($res);	
	if ($nbrows == 0) 
	{
		echo "-1,0,";
		exit;
	}	
    
    
    //check key
    
    $secretKey="flikosplu4012"; 
    
	$row = mysql_fetch_row($res);	
	$playerid = $row[0];
	
	$query = "SELECT playerid FROM FullKeys WHERE hashFullKey = '$hashfullkey';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error());
	$keyrow = mysql_fetch_row($res);
	$nbrows = mysql_num_rows ($res);

	//key not found
	if ($nbrows == 0) 
	{
		print "-2,0";
		exit;
	}
	//key not taken
	else if(strcmp("", $keyrow[0]) == 0)
	{
	    $query = "UPDATE FullKeys ".
        "SET playerid='$playerid' ".
        "WHERE hashFullKey='$hashfullkey';";	
        $res = mysql_query($query) or die('Query failed: ' . mysql_error());
        print $playerid.','.md5($secretKey.$hashfullkey.$name).','; 
	}
	//key taken by other player
	elseif( strcmp($playerid, $keyrow[0]) !== 0 )
	{
		print "-2,0,";
		exit;
	}
	//we just created player so key should not be already given to him
	else
	{
		print "-2,0,";
		exit;
	}
	
    mysql_free_result ($res);
    mysql_close ($db);
?>
