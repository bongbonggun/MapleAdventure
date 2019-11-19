<?php
	include ("configure.php");

	$link = mysql_connect($hostname, $username, $password) OR die ("Unable to connect to database");
	if ($link)
		mysql_select_db($database);
	else
			die("Unable to select database");
	mysql_query("SET NAMES utf8");
	
	$query="UPDATE `player` SET `sex`= '".$_GET["sex"]."' , `name`= '".$_GET["nickname"]."' WHERE `id`='".$_GET["idd"]."'";
	$result = mysql_query($query);
	
	mysql_free_result($result);
	mysql_close($link);
	
	$url = "introduction.php?id=".$_GET["idd"];
	header("Location: $url");
	
	?>