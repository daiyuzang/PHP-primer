<?php
	$con = mysql_connect("localhost","root","12345678");
	if(!$con){
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db("my_db",$con);
	$sql = "insert into Persons (FirstName,LastName,Age) values ('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";
	if(!mysql_query($sql,$con)){
		die("Error: " . mysql_error());
	}
	echo "1 record added";
	mysql_close($con);
?>