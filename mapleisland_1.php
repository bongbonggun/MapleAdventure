<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="楓之谷,楓之谷起源,起源,maplestory,maplestoryorgin,origin" />
		<meta name="description" content="這是一個關於楓之谷的網頁遊戲" />
		<title>菇菇村西入口</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

	<body align="center">		
		<div>
		<h1>菇菇村西入口</h1>
		<table align="center"><tr align="center" valign="bottom"><td>
		<?php
			include ("configure.php");
			
			$link = mysql_connect($hostname, $username, $password) OR die ("Unable to connect to database");
			
			if ($link)
				mysql_select_db($database);
			else
				die("Unable to select database");
					
			mysql_query("SET NAMES utf8");
			
			$query = "SELECT `id`, `sex`, `name`, `level`, `str`, `dex`, `inte`, `luk`, `hp`, `mp`, `exp`, `money`, 
			`monName`, `monLevel`, `monStr`, `monDex`, `monInt`, `monLuk`, `monHp`, `monMp`, `monExp`, `monMoney` FROM `player`, `monster`
			WHERE `id`='".$_GET["id"]."';";
			$result = mysql_query($query) or die("Connect DB Table Error!");
			
			
			while($row=mysql_fetch_array($result))
			{
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
				
				echo "</td><td><img src=\"img/icegolem.gif\"></td></tr>";
				
				if($row["id"]==$_GET["id"])
				{
					echo "<tr><td>暱稱：".$row["name"]."</td><td>名字：".$row["monName"].
					"</td></tr><tr><td>等級：".$row["level"]."</td><td>等級：".$row["monLevel"].
					"</td></tr><tr><td>HP：".$row["hp"].
					"</td></tr><tr><td>MP：".$row["mp"].
					"</td></tr><tr><td>EXP：".$row["exp"].
					"</td></tr><tr><td>楓幣：".$row["money"].
					"</td></tr>";
					
					//怪物
					$monName = $row["monName"];
					$monHp = $row["monHp"];
					$monMp = $row["monMp"];
					$monStr = $row["monStr"];
					$monDex = $row["monDex"];
					$monInt = $row["monInt"];
					$monLuk = $row["monLuk"];
					$monExp = $row["monExp"]; 
					$monMoney = $row["monMoney"];
					
					//玩家
					$name = $row["name"];
					$hp = $row["hp"];
					$mp = $row["mp"];
					$exp = $row["exp"];
					$money = $row["money"];
					$str = $row["str"];
					$dex = $row["dex"];
					$inte = $row["inte"];
					$luk = $row["luk"];
					}
					break;
				}
		?>
		</table>
		<br>
		<?php 
			do
			{
				if($hp<1)
				{
					echo "你已經死了";
					break;
				}
				$atk = rand(1,$str);
				$monAtk = rand(1,$monStr);
				$hp = $hp - $monAtk;
				$monHp = $monHp - $atk;
				echo "<font color=\"blue\">你使用一般攻擊傷了".$monName.$atk."滴血。（".$monName."的HP剩下".$monHp."）</font><br>";
				echo "<font color=\"green\">".$monName."使用一般攻擊傷了你".$monAtk."滴血。（你的HP剩下".$hp."）</font><br>";
				if($monHp<1)
				{
					$m = rand(1,$monMoney);
					echo "<font color=\"red\">".$monName."死亡</font><br>";
					echo "<br>你獲得了".$monExp."經驗值和".$m."楓幣";
				}
				echo "<br>";
			}while($monHp>0);
			
			if($row["hp"]>0)
			{
				$query = "UPDATE `player` SET `hp`= '".$hp.
				"',`exp`='".($row["exp"]+$monExp)."',`money`='".($row["money"]+$monMoney)."' WHERE `id`='".$_GET["id"]."';";
				$result = mysql_query($query) or die("Connect DB Table Error!");
			}		
			//mysql_free_result($result);
			mysql_close($link);
		?>
		<br><br>
		<form action="" method="get">
			<input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
			<input type="submit" value="攻擊其他隻">
		</form>
		<a href="mapleisland.php?id=<?php echo $_GET["id"] ?>"><input type="button" value="點我回地圖"></a>
	</div>
	</body>
</html>