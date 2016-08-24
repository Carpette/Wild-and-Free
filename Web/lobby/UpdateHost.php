<?php
    $db = mysql_connect ("db455820356.db.1and1.com", "dbo455820356", "ccarving");
    if (!mysql_select_db ("db455820356")) {
	echo "Could not select database " . mysql_error ();
	exit;
    }
    $query = "UPDATE MasterServer SET updated = NOW() ".
             "WHERE gameType='".$_REQUEST['gameType']."' ".
	     "AND gameName='".$_REQUEST['gameName']."';";
    $res = mysql_query ($query);
    if (!$res) {
	echo "Could not execute query: " . mysql_error ();
	exit;
    }
    mysql_close ($db);
?>
