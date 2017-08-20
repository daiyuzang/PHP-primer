<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>form-test</title>
</head>
<body>

	<?php
	//运行内嵌PHP文件同样要将文件名后缀改为.php
		$nameErr = $emailErr = $genderErr = $websiteErr = "";
		$name = $email = $gender = $comment = $website = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		   if (empty($_POST["name"])) {
		     $nameErr = "姓名是必填的";
		   } else {
		     $name = test_input($_POST["name"]);
		   }
		   
		   if (empty($_POST["email"])) {
		     $emailErr = "电邮是必填的";
		   } else {
		     $email = test_input($_POST["email"]);
		   }
		     
		   if (empty($_POST["website"])) {
		     $website = "";
		   } else {
		     $website = test_input($_POST["website"]);
		   }

		   if (empty($_POST["comment"])) {
		     $comment = "";
		   } else {
		     $comment = test_input($_POST["comment"]);
		   }

		   if (empty($_POST["gender"])) {
		     $genderErr = "性别是必选的";
		   } else {
		     $gender = test_input($_POST["gender"]);
		   }
		}

		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
	?>
	<h2>PHP 验证实例</h2>
	<p><span class="error">* 必需的字段</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> 
	   姓名：<input type="text" name="name" value="<?php echo $name;?>">
	   <span class="error">* <?php echo $nameErr;?></span>
	   <br><br>
	   电邮：<input type="text" name="email" value="<?php echo $email;?>">
	   <span class="error">* <?php echo $emailErr;?></span>
	   <br><br>
	   网址：<input type="text" name="website" value="<?php echo $website;?>">
	   <span class="error"><?php echo $websiteErr;?></span>
	   <br><br>
	   评论：<textarea name="comment" rows="5" cols="40" ><?php echo $comment;?></textarea>
	   <br><br>
	   性别：
	   <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="female") echo "checked";?> value="female" id="female"><label for="female">女性</label>
	   <input type="radio" name="gender" <?php if(isset($gender)&&$gender=="male") echo "checked";?> value="male" id="male"><label for="male">男性</label>
	   <span class="error">* <?php echo $genderErr;?></span>
	   <br><br>
	   <input type="submit" name="submit" value="提交"> 
	</form>

	<?php
		echo "<h2>您的输入：</h2>";
		echo $name;
		echo "<br>";
		echo $email;
		echo "<br>";
		echo $website;
		echo "<br>";
		echo $comment;
		echo "<br>";
		echo $gender;
		include "test.php";
		echo date("Y-m-d h:i:sa",$d);
	?>
	<a href="test.php?subject=PHP&web=W3school.com.cn">测试GET</a>
</body>
</html>