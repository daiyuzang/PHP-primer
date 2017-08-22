<?php 
	//Session 的工作机制是：为每个访问者创建一个唯一的 id (UID)，并基于这个 UID 来存储变量。UID 存储在 cookie 中，亦或通过 URL 进行传导。
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Session</title>
</head>
<body>
	<?php 
		if (isset($_SESSION["view"])) {
			$_SESSION["view"] = $_SESSION["view"] + 1;
		}else{
			$_SESSION["view"] = 1;
		}
		echo "Session: " . $_SESSION["view"];
		//删除指定session
		unset($_SESSION["view"]);
		//session_destroy();重置所有session数据，失去所有存储的session数据
	?>
</body>
</html>