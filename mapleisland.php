<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="楓之谷,楓之谷起源,起源,maplestory,maplestoryorgin,origin" />
		<meta name="description" content="這是一個關於楓之谷的網頁遊戲" />
		<title>楓之島</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	<body align="center" background="img/space.png">
		<!--<input type="button" value="GO"	onClick="top.soundframe.location='magic2.html'">-->
		<br><br>
		<font face="微軟正黑體" color="white">請點擊地圖上的小點即可進入該地點。
		<br><br>
		（移到小點上面會顯示該地點的名稱）</font>
		<br><br>
		<img src="img/mapleisland.png" usemap="#mapleisland"> <!--建立影像地圖-->
		<map name="mapleisland">
		<area shape="circle" coords="225,241,7" href="mapleisland_1.php?id=<?php echo $_GET["id"] ?>" title="菇菇村西入口">
		<area shape="circle" coords="312,226,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="菇菇村">
		<area shape="circle" coords="329,285,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="菇菇村東入口">
		<area shape="circle" coords="354,346,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="嫩寶狩獵場I">
		<area shape="circle" coords="429,366,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="嫩寶狩獵場II">
		<area shape="circle" coords="501,375,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="嫩寶狩獵場III">
		<area shape="circle" coords="569,410,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="岔道">
		<area shape="circle" coords="635,377,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="楓葉西郊平原">
		<area shape="circle" coords="614,478,10" href="test.html?id=<?php echo $_GET["id"] ?>" title="楓之港">
		<area shape="circle" coords="734,358,10" href="test.html?id=<?php echo $_GET["id"] ?>" title="楓葉村">
		<area shape="circle" coords="776,426,7" href="test.html?id=<?php echo $_GET["id"] ?>" title="楓葉村東郊平原">
		<area shape=default noref> <!--代表沒有其他區域-->
		</map>
		<br><br>
		<a href="main.php?id=<?php echo $_GET["id"] ?>"><input type="button" name="back" value="回玩家頁面"></a>
	</body>
</html>