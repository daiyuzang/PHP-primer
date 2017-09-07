<?php
	header('Content-Type: text/xml');
	header('Cache-Control: no-cache, must-revalidate');
	header("Expires: Wed, 06 Sep 2017 09:09:47 GMT");

	$q = $_GET["q"];

	$con = mysql_connect("localhost","root","12345678");
	if (!$con) {
		die("Could not connect: " . mysql_error());
	}

	mysql_select_db("ajax-demo",$con);
	$sql = "select * from user where id = '".$q."'";

	$result = mysql_query($sql);
	echo "<?xml version='1.0' encoding='ISO-8859-1'?>
	<person>";
	while ($row = mysql_fetch_array($result)) {
		echo "<firstname>" . $row["FirstName"] . "</firstname>";
		echo "<lastname>" . $row["LastName"] . "</lastname>";
		echo "<age>" . $row["Age"] . "</age>";
		echo "<hometown>" . $row["Hometown"] . "</hometown>";
		echo "<job>" . $row["Job"] . "</job>";
	}
	echo "</person>";
	mysql_close($con);
?>