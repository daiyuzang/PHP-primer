<!DOCTYPE html>
<html>
<head>
	<title>Update Delete</title>
</head>
<body>
	<?php
		$con = mysql_connect("localhost","root","12345678");
		if (!$con) {
			echo "Couldn't connect: " . mysql_error();
		}

		mysql_select_db("my_db",$con);
		/*$sql = "update Persons set Age = '43' where FirstName = 'Peter' and LastName = 'Griffin'";*/
		/*$sql = "delete from Persons where FirstName = 'Peter'";*/
		$sql = "insert into Persons (FirstName,LastName,Age) values ('Peter','Griffin','34')";
		mysql_query($sql,$con);
		mysql_close($con);
	?>
</body>
</html>