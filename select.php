<!DOCTYPE html>
<html>
<head>
	<title>Select from MySQL</title>
</head>
<body>
	<?php
		$con = mysql_connect("localhost","root","12345678");
		if (!$con) {
			die("Could not connect: " . mysql_error());
		}
		mysql_select_db("my_db",$con);

		$result = mysql_query("select * from Persons where FirstName = 'Peter'");
		while ($row = mysql_fetch_array($result)) {
			echo $row["FirstName"] . " " . $row["LastName"];
		}
		/*$result = mysql_query("select * from Persons");
		echo "<table border='1'>
			  <tr>
			  <th>FirstName</th>
			  <th>LastName</th>
			  <th>Age</th>
			  </tr>";
		while ($row = mysql_fetch_array($result)) {

			//echo $row['FirstName'] . " ". $row['LastName'];
			//echo "<br>";
			
			echo "<tr>";
			echo "<td>" . $row["FirstName"] . "</td>";
			echo "<td>" . $row["LastName"] . "</td>";
			echo "<td>" . $row["Age"] . "</td>";
			echo "</tr>";
		}
		echo "</table>";*/
		mysql_close($con);
	?>
</body>
</html>