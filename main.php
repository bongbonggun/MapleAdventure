<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="楓之谷,楓之谷起源,起源,maplestory,maplestoryorgin,origin" />
		<meta name="description" content="這是一個關於楓之谷的網頁遊戲" />
		<title>玩家畫面</title>
		<link href="style.css" rel="stylesheet" type="text/css" /> <!--rel為關聯 stylesheet為外部樣式表-->

	</head>
	<body id="bgmain">
		<img src="img/logo.png" height="45%" width="45%" align="middle"/>
		<div id="p1">
			<table border=3>
				<tr>
					<td colspan=12>玩家資料</td> <!--列合併-->
				</tr>			
				<?php
					include ("configure.php");
					
					$link = mysql_connect($hostname, $username, $password) OR die ("Unable to connect to database");

					if ($link)
						mysql_select_db($database);
					else
						die("Unable to select database");
						
					mysql_query("SET NAMES utf8");

					$query = "SELECT `id` ,`sex`, `name`, `level`, `class`, `hp`, `mp`, `exp`, `money`, `cplticket` FROM `player` WHERE `id`='".$_GET["id"]."'";
					$result = mysql_query($query) or die("Connect DB Table Error!");

					while($row=mysql_fetch_array($result))
					{
						echo "<tr><td rowspan=2>";
							
							if($row["sex"]=="男")
							{
								echo "<img src=\"img/boy_1.gif\">";
							}
							else if($row["sex"]=="女")
							{
								echo "<img src=\"img/girl_1.gif\">";
							}
							else
							{
								echo "<img src=\"img/googoo.png\">";
							}
							
							echo "</td>
							<td>性別</td>
							<td>暱稱</td>
							<td>等級</td>
							<td>職業</td>
							<td>HP</td>
							<td>MP</td>
							<td>EXP</td>
							<td>楓幣</td>
							<td>轉蛋</td>
							<td>裝備</td>
							<td>物品</td>
						</tr>";
						if($row["id"]==$_GET["id"])
						{
							echo "<td>".$row["sex"].
							"</td><td>".$row["name"].
							"</td><td>".$row["level"].
							"</td><td>".$row["class"].
							"</td><td>".$row["hp"].
							"</td><td>".$row["mp"].
							"</td><td>".$row["exp"].
							"</td><td>".$row["money"].
							"</td><td>".$row["cplticket"].
							"</td></tr>";
						}
						break;
					}

					mysql_free_result($result);
					mysql_close($link);
				?>
			</table>
		</div>
		
		<div id="p2">
			<ul>
			<li><a href="mapleisland.php?id=<?php echo $_GET["id"] ?>">前往楓之島</a></li>
			<li><a href="test.html?id=<?php echo $_GET["id"] ?>">前往維多利亞島</a></li>
			<li><a href="test.html?id=<?php echo $_GET["id"] ?>">前往商城</a></li>
			<li><a href="capsuleland.php?id=<?php echo $_GET["id"] ?>">前往轉蛋樂園</a></li>
			</ul>
		</div>
	</body>
</html>