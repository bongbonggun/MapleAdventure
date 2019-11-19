<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="楓之谷,楓之谷起源,起源,maplestory,maplestoryorgin,origin" />
		<meta name="description" content="這是一個關於楓之谷的網頁遊戲" />
		<title>初始設定</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<form action="character_sex_2.php" method="get" align="center">
			<h1>初始設定</h1>	
			性別：
			<input type="radio" name="sex" value="男" />男
			<input type="radio" name="sex" value="女" />女
			<input type="radio" name="sex" value="其他" />其他
			<br><br>
			暱稱：<input type="text" name="nickname">
			<br><br>
			<font color="red">暱稱上限為12個英文字元(6個中文字元)</font>
			<input type="hidden" name="idd" value="<?php echo $_GET["id"] ?>" />
			<br><br>
			<input type="image" src="img/btn_ok.png" onClick="document.form1.submit()">
		</form>
	</body>
	
</html>
