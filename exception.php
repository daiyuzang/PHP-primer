<!DOCTYPE html>
<html>
<head>
	<title>exception</title>
</head>
<body>
	<?php
		//exception 异常用于在指定的错误发生时改变脚本的正常流程。
		
		//1、异常的基本使用：当异常被抛出时，其后的代码不会继续执行，PHP 会尝试查找匹配的 "catch" 代码块
		//异常没有被捕获，而且又没用使用 set_exception_handler() 作相应的处理的话，那么将发生一个严重的错误（致命错误），并且输出 "Uncaught Exception" （未捕获异常）的错误消息异常没有被捕获，而且又没用使用 set_exception_handler() 作相应的处理的话，那么将发生一个严重的错误（致命错误），并且输出 "Uncaught Exception" （未捕获异常）的错误消息
		
		/*$number = 2;
		if($number>1)
	  	{
	  		throw new Exception("Value must be 1 or below");
	  	}*/

	  	//2、try、throw、catch
	  	//Try - 使用异常的函数应该位于 "try" 代码块内。
	  	//Throw - 这里规定如何触发异常。
	  	//Catch - "catch" 代码块会捕获异常，并创建一个包含异常信息的对象
		/*$number = 3;
		try{
			if($number>1)
		  	{
		  		throw new Exception("Value must be 1 or below");
		  	}
		  	echo "true";
		}
		catch(exception $e){
			echo "Message:" . $e->getMessage();
		}*/

		
		/**
		* 创建了一个专门的类，当 PHP 中发生异常时，可调用其函数。
		*/
		/*class customException extends Exception
		{
			
			public function errorMessage()
			{
				# code...
				$errorMsg = "Error on line:" .$this->getLine() . " in " . $this->getFile() . ": <b>" . $this->getMessage() . "</b> is not a valid E-mail address.";
				return $errorMsg;
			}
		}
		$email = "someone@exmaple...com";
		try {
			if (filter_var($email,FILTER_VALIDATE_EMAIL) === false) {
				throw new customException($email);
			}
		} catch (customException $e) {
			echo $e->errorMessage();
		}*/
		
		//多个异常：使用多个 if..else 代码块，或一个 switch 代码块
		
		/*class customException extends Exception
		{
			public function errorMessage()
			{
				//error message
				$errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
				.': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
				return $errorMsg;
			}
		}

		$email = "someone@example.com";

		try
		{
		 //check if 
		 	if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE)
		  	{
				//throw exception if email is not valid
				throw new customException($email);
		  	}
		 //check for "example" in mail address
		 	if(strpos($email, "example") !== FALSE)
		  	{
		  		throw new Exception("$email is an example e-mail");
		  	}
		}

		catch (customException $e)
		{
			echo $e->errorMessage();
		}

		catch(Exception $e)
		{
			echo $e->getMessage();
		}*/

		//重新抛出异常：可以在一个 "catch" 代码块中再次抛出异常
		
		class customException extends Exception
		{
			public function errorMessage()
			{
				//error message
				$errorMsg = $this->getMessage().' is not a valid E-Mail address.';
				return $errorMsg;
			}
		}

		$email = "someone@example.com";

		try
		{
			try
			{
				//check for "example" in mail address
				if(strpos($email, "example") !== FALSE)
				{
					//throw exception if email is not valid
					throw new Exception($email);
				}
			}
			catch(Exception $e)
			{
				//re-throw exception
				throw new customException($email);
			}
		}

		catch (customException $e)
		{
			//display custom message
			echo $e->errorMessage();
		}
		//设置顶层异常处理器
		//set_exception_handler() 函数可设置处理所有未捕获异常的用户定义函数
		function myException($exception)
		{
			echo "<b>Exception:</b> " , $exception->getMessage();
		}

		set_exception_handler('myException');

		throw new Exception('Uncaught Exception occurred');
		//简而言之：如果抛出了异常，就必须捕获它
	?>

</body>
</html>