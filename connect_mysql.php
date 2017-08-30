<!DOCTYPE html>
<html>
<head>
	<title>connect_MySQL</title>
</head>
<body>
	<?php
		$con = mysql_connect("localhost","root","12345678");
		if (!$con) {
			die("Cannot connect: " . mysql_error());
		}else{
			echo "OK";
		}
		/*if (mysql_query("CREATE DATABASE my_db",$con)) {
			echo "Database Created";
		}else{
			echo "error creating database: " . mysql_error();
		}*/
		mysql_select_db("my_db",$con);
		/*$sql = "CREATE TABLE Persons
		(
			personID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(personID),
			FirstName varchar(15),
			LastName varchar(15),
			Age int
		)";
		mysql_query($sql,$con);*/
		mysql_query("insert into Persons (FirstName,LastName,Age) values ('Peter','Griffin','35')");
		mysql_query("insert into Persons (FirstName,LastName,Age) values ('Glenn','Quagmire','33')");
		mysql_close($con);
	?>
</body>
</html>