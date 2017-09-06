<?php
	$q = $_GET["q"];
	$con = mysql_connect("localhost","root","12345678");
	if (!$con) {
		die("Could not connect: " . mysql_error());
	}
	mysql_select_db("ajax-demo",$con);
	$sql = "select * from user where id = '".$q."'";

	$result = mysql_query($sql);

	echo("<table border='1'>
		<tr>
		<th>FirstName</th>
		<th>LastName</th>
		<th>Age</th>
		<th>Job</th>
		<th>Hometown</th>
		</tr>");
	while ($row = mysql_fetch_array($result)) {
		echo "<tr>";
		echo "<td>" . $row["FirstName"] ."</td>";
		echo "<td>" . $row["LastName"] ."</td>";
		echo "<td>" . $row["Age"] ."</td>";
		echo "<td>" . $row["Job"] ."</td>";
		echo "<td>" . $row["Hometown"] ."</td>";
		echo "</tr>";
	}

	echo "</table>";
	mysql_close($con);
?>