<?php
	//keyword大小写不敏感，变量大小写敏感
	echo "fff";
	$X = 12;
	Echo $X;
	//PHP变量
	$x = 4;
	//PHP常量,第三位默认false区分大小写
	define("y","hello world!",flase);
	//echo、print
	//echo - 能够输出一个以上的字符串
	//print - 只能输出一个字符串，并始终返回 1
	echo $x;
	print y;
	//函数之外声明的变量拥有 Global 作用域，只能在函数以外进行访问。
	//函数内部声明的变量拥有 LOCAL 作用域，只能在函数内部进行访问。
	
	//global 关键词用于访问函数内的全局变量。
	$y=10;

	function myTest() {
	  global $x,$y;
	  $y=$x+$y;//$GLOBALS['y']=$GLOBALS['x']+$GLOBALS['y'];
	}

	myTest();
	echo $y; // 输出 14
	// static 关键词 当函数完成/执行后，不会删除所有变量

	//var_dump() 会返回变量的数据类型和值
	$cars=array("Volvo","BMW","SAAB");
	var_dump($cars);

	//strlen() 函数返回字符串的长度
	echo strlen("Hello world!");
	//strpos() 函数用于检索字符串内指定的字符或文本。如果找到匹配，则会返回首个匹配的字符位置。如果未找到匹配，则将返回 FALSE。
	echo strpos("Hello world!","world");
	//.  、  .= 串接值
	$a = "Hello";
	$b = $a . " world!";
	echo $b; // 输出 Hello world!

	$x="Hello";
	$x .= " world!";
	echo $x; // 输出 Hello world!

	//xor异或
	//数组+，为联合，两个数组合并
?>