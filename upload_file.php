<?php
	//添加上传限制
	if ((($_FILES["file"]["type"] == "image/gif")||($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))&&($_FILES["file"]["size"] < 20000)) {
		//使用 PHP 的全局数组 $_FILES，可以从客户计算机向远程服务器上传文件
		//第一个参数是input name，第二个是"name"，"type"……
		if ($_FILES["file"]["error"] > 0) {
			# code...错误代码
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}else{
			//名称
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			//类型
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			//大小：字节计
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br>";
			//服务器临时存储副本名,临时文件，脚本结束时消失
			echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			if (file_exists($_FILES
				["file"]["name"])) {
				# code...
				echo $_FILES["file"]["name"] . " already exists";
			}else{
				move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
				echo "Stroed in:" . $_FILES["file"]["name"];
			}
		}
	}
		
?>