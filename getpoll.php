<?php
	$vote = $_GET["q"];
	$filename = "poll_result.txt";
	$content = file($filename);
	$array = explode("||", $content[0]);
	$yes = $array[0];
	$no = $array[1];

	if ($vote == 0) {
	 	$yes++;
	}
	elseif ($vote == 1) {
		$no++;
	}

	$insertvote = $yes . "||" . $no;
	$fp = fopen($filename,"w");
	fputs($fp,$insertvote);
	fclose($fp);
?>

<h2>Result</h2>
<table>
	<tr>
		<td>Yes:</td>
		<td><?php echo (100*round($yes/($yes+$no),2));?>%</td>
	</tr>
	<tr>
		<td>No:</td>
		<td><?php echo (100*round($no/($yes+$no),2));?>%</td>
	</tr>
</table>