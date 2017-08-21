<?php
	//cookie 的值会自动进行 URL 编码，在取回时进行自动解码
	setcookie("user","hf",time()+3600);
	//setrawcookie()能防止 URL 编码 
?>
<!DOCTYPE html>
<html>
<head>
	<title>cookie</title>
</head>
<body>
	<?php
	//若遇不支持 cookie 的浏览器，不得不采取其他方法在应用程序中从一张页面向另一张页面传递信息。
	//一种方式是从表单传递数据，form-->post
		if (isset($_COOKIE["user"])) {
			echo "Welcome " . $_COOKIE["user"] . "!<br>";
		}else{
			echo "Welcome guest!<br>";
		}
	?>
</body>
</html>
