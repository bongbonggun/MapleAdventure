<html>
	<head>
		<meta http-equiv=refresh content="0;url=login.html">
	</head>
</html>

<?php
	include ("configure.php");
	
	$next = 0;
	
	$link = mysql_connect($hostname, $username, $password) OR die ("Unable to connect to database");

	if ($link)
		mysql_select_db($database);
	else
		die("Unable to select database");
		
	mysql_query("SET NAMES utf8");
		
	$query = "SELECT `id`, `pw`, `logintime`, `sex` from `player`";
	$result = mysql_query($query);
	
	while($row=mysql_fetch_array($result))
	{
		if ($_GET["loginid"] == $row["id"])
		{
			if ($_GET["loginpw"] == $row["pw"])
			{
				$next = 1;
				$logintime = $row["logintime"]+1; //登入次數加一
				$query="UPDATE `player` SET `logintime` = ' ".$logintime." 'WHERE `id` ='".$_GET["loginid"]."'";	//登入次數存進資料庫
				mysql_query($query);
				break;
			}
		}
	}

	mysql_free_result($result);
	mysql_close($link);
	
	if($next==1)
	{
		if($row["sex"]==null)
		{
			$url = "character_sex.php?id=".$_GET["loginid"];
			header("Location: $url"); //到選性別頁
		}
		else
		{
			$url = "introduction.php?id=".$_GET["loginid"];
			header("Location: $url"); //到主頁
		}	
	}	
	else if($next==0)
	{
		echo "<script>alert(\"無此帳號或密碼錯誤\");</script>";
	}
		

?>