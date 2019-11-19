<?php
	include ("configure.php");
		
	if (strlen($_GET["registerid"])==null || strlen($_GET["registerpw"])==null)
	{
		echo "<script>alert(\"欄位不可為空\"); location.href = 'register.html';</script>"; //警告視窗關閉後轉址
	}
	else
	{
		$link = mysql_connect($hostname, $username, $password) OR die ("Unable to connect to database");

		if ($link)
			mysql_select_db($database);
		else
			die("Unable to select database");
		mysql_query("SET NAMES utf8");
				
		$query = "SELECT `id`, `pw`, `logintime` from `player`";
		$result = mysql_query($query);
		
		while($row=mysql_fetch_array($result))
		{
			if($_GET["registerid"] == $row["id"])
			{
				echo "<script>alert(\"此帳號已被註冊\"); location.href = 'register.html';</script>"; 
				mysql_free_result($result);
				mysql_close($link);
				break;
			}
			else
			{
				//新增帳號(註冊)
				$query2 = "INSERT INTO `player` (`id`, `pw`) VALUES ('".$_GET["registerid"]."', '".$_GET["registerpw"]."')";
				$result = mysql_query($query2);
				mysql_free_result($result);
				mysql_close($link);
				$next = true;
				echo "<script>alert(\"註冊成功\"); location.href = 'login.html';</script>";
				break;
			}
		}
	}
?>