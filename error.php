<!DOCTYPE html>
<html>
<head>
	<title>error</title>
</head>
<body>
	<?php
		//不同的错误处理方法：
			//简单的 "die()" 语句
			//自定义错误和错误触发器
			//错误报告
		//PHP 的默认错误处理程序是内建的错误处理程序。
		
		//1、自定义错误
		function customError($errno, $errstr)
		{ 
			echo "<b>Error:</b> [$errno] $errstr<br />";
			echo "Ending Script";
			//error_log("Error: [$errno] $errstr",1,
 //"someone@example.com","From: webmaster@example.com");
			die();
		}
		//我们的自定义函数来处理所有错误，set_error_handler() 仅需要一个参数，可以添加第二个参数来规定错误级别
		set_error_handler("customError");
		//echo $text;
		//2、错误触发器
		$text = 2;
		if ($text > 1) {
			# code...
			trigger_error("fff");//会在customError内错误内容显示出来
		}
	?>
</body>
</html>