<?php
	//需要修改配置，暂时搁置
	$to = "2319686775@qq.com";
	$subject = "Test mail";
	$message = "Hello! This is a simple email message.";
	$from = "1824454842@qq.com";
	$headers = "From: " . $from;
	mail($to,$subject,$message,$headers);
	echo "Mail Sent.";

?>