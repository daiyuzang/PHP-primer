<!DOCTYPE html>
<html>
<head>
	<title>filter</title>
</head>
<body>
	<form method="get" action="Validating.php">
		<label>E-mail</label>
		<input type="text" name="email"></input>
		<input type="text" name="name"></input>
		<input type="text" name="age"></input>
		<input type="submit"></input>
	</form>
	<?php
		//PHP 过滤器用于验证和过滤来自非安全来源的数据，比如用户的输入
		
		//外部数据：来自表单的输入数据
		//Cookies
		//服务器变量
		//数据库查询结果
		//filter_var() - 通过一个指定的过滤器来过滤单一的变量
		//filter_var_array() - 通过相同的或不同的过滤器来过滤多个变量
		//filter_input - 获取一个输入变量，并对它进行过滤
		//filter_input_array - 获取多个输入变量，并通过相同的或不同的过滤器对它们进行过滤
		$int = 123.0;
		if(filter_var($int,FILTER_VALIDATE_INT)){
			echo "Integer";
		}else{
			echo "not integer";
		}
		//两类过滤器：验证型（验证用户输入、严格的格式规则（比如 URL 或 E-Mail 验证）、成功则返回预期的类型，如果失败则返回 FALSE）、清洁型（允许或禁止字符串中指定的字符、无格式规则、返回字符串）
		//选项和标志用于向指定的过滤器添加额外的过滤选项。
		//不同的过滤器有不同的选项和标志。
		$var = 200.4;
		$var_option = array("options"=>array("min_range"=>0,"max_range"=>300));//最好都取“options”
		if (filter_var($var, FILTER_VALIDATE_INT,$var_option)) {
			echo "ok";
		}else{
			echo "no";
		}
		
		function convertSpace($string){
			return str_replace("_", " ", $string);
		}
		$string = "Peter_is_a_great_guy!";

		echo filter_var($string, FILTER_CALLBACK, array("options"=>"convertSpace"));
		echo $string;
		

?>
</body>
</html>