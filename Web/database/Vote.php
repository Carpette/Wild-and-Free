<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    mysql_select_db('db455820356') or die('Could not select database');

	// Strings must be escaped to prevent SQL injection attack. 
	$name = mysql_real_escape_string($_GET['name'], $db); 
	$pass = mysql_real_escape_string($_GET['pass'], $db); 
	$voteId = mysql_real_escape_string($_GET['voteId'], $db); 
	$voteAnswer = mysql_real_escape_string($_GET['voteAnswer'], $db);

	
	//check player
	$query = "SELECT lastvote FROM Players WHERE alias='$name' AND password='$pass';";
	$res = mysql_query($query) or die('Query failed: ' . mysql_error()); 

	$nbrows = mysql_num_rows ($res);
	if ($nbrows == 0) 
	{
		echo "-1";
		exit;
	}
    
    //check voteid
    
	$row = mysql_fetch_row($res);	
	$lastvote = $row[0];

	if (intval($voteId) <= intval($lastvote)) 
	{
		echo "-2";
		exit;
	}
    $query = "UPDATE Players ".
    "SET lastvote = '$voteId' ".
    "WHERE alias='$name' AND password='$pass';";	
    $res = mysql_query($query) or die('Query failed: ' . mysql_error());     
           

    $countField = "count".$voteAnswer;

	$query = "UPDATE Votes ".
    "SET $countField =$countField + 1, votestotal = votestotal+1 ".
    "WHERE voteid='$voteId';";	
    $res = mysql_query($query) or die('Query failed: ' . mysql_error());
 
                
                
                                              
    echo "0,";

    mysql_free_result ($res);
    mysql_close ($db);
?>
