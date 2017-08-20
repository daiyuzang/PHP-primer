<?php 
	$name = $_GET['subject']; 
	$email = $_GET['web'];
	echo $name . " " . $email;
	//d天，m月，Y年，l周内的天，h小时，i分钟，s秒，a午前、午后 
	echo date("Y-m-d");
	//mktime()创建时间
	$d = mktime(13,21,55,4,22,2016);
	echo date("Y-m-d h:i:sa", $d);
	//strtotime()字符串转时间
	$t = strtotime("tomorrow");
	echo date("Y-m-d",$t);

	// require：当文件被应用程序请求时
	// include：当文件不是必需，且应用程序在文件未找到时应该继续运行时
	// readfile() 函数读取文件，并把它写入输出缓冲
	echo readfile("webdictionary.txt");
	//fopen() 的第一个参数包含被打开的文件名，第二个参数规定打开文件的模式
	$myfile = fopen("webdictionary.txt","r") or die("unable open file");
	//fgets()从文件读取单行
	//调用 fgets() 函数之后，文件指针会移动到下一行。
	echo fgets($myfile);
	echo fread($myfile, filesize("webdictionary.txt"));
	//所以不会出现两行第一排！！！！
	fclose($myfile);
?>
