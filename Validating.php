<?php
	//验证型（validate）
	/*if (!filter_has_var(INPUT_GET,"email")) {
		echo "email not exist ";
	}else{
		if (!filter_input(INPUT_GET,"email",FILTER_VALIDATE_EMAIL)) {
			echo "email not valid ";
		}
		else{
			echo "email valid ";
		}
	}

	if (!filter_has_var(INPUT_GET,"url")) {
		echo "url not exist";
	}else{
		if (!filter_input(INPUT_GET,"url",FILTER_VALIDATE_URL)) {
			echo "url not valid";
		}
		else{
			echo "url valid";
		}
	}*/
	//净化型（sanitize）
	/*if (!filter_has_var(INPUT_GET,"email")) {
		echo "email not exist ";
	}else{
		$email = filter_input(INPUT_GET,"email",FILTER_SANITIZE_EMAIL);//删除非法字符，其他的无法检测
			echo "$email";
	}
	if (!filter_has_var(INPUT_GET,"url")) {
		echo "url not exist ";
	}else{
		$url = filter_input(INPUT_GET,"url",FILTER_SANITIZE_URL);
		//删除非法字符，其他的无法检测
			echo "$url";
	}*/
	$filter = array(
		"name"=>array(
			"filter"=>FILTER_SANITIZE_STRING),
		"age"=>array(
			"filter"=>FILTER_VALIDATE_INT,
			"options"=>array(
				"min_range"=>1,
				"max_range"=>120)
			),
		"email"=>FILTER_VALIDATE_EMAIL
	);
	$result = filter_input_array(INPUT_GET,$filter);
	
	if (!$result["age"]) {
		echo "age must be a number between 1 and 120.";
	}
	if(!$result["email"]){
		echo "email not valid";
	}
	if(!$result["name"]){
		echo "user is not valid";
	}
?>