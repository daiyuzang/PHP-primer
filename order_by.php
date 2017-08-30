<!DOCTYPE html>
<html>
<head>
	<title>Order By</title>
</head>
<body>
	<?php
		//ORDER BY 关键词，记录集的排序顺序默认是升序
		//DESC 关键词来设定降序排序
		//根据多个列进行排序。当按照多个列进行排序时，只有第一列相同时才使用第二列
		$con = mysql_connect("localhost","root","12345678");
		if (!$con) {
			echo "Could not connect: " . mysql_error();
		}
		mysql_select_db("my_db",$con);

		$result = mysql_query("select * from Persons order by Age");
		while ($row = mysql_fetch_array($result)) {
			echo $row["FirstName"] . " " . $row["LastName"] . " " . $row["Age"];
			echo "<br>";
		}
		mysql_close($con);
	?>
</body>
</html>