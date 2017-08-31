<!DOCTYPE html>
<html>
<head>
	<title>Exl Expat</title>
</head>
<body>
	<?php
		$parser = xml_parser_create();
		function start(){
			
		}
		$fp = fopen("note.xml","r");
		while ($data = fgetc($fp)) {
			xml_parse($parser,$data,feof($fp)) or die(sprintf("XML error: %s at line %d",xml_error_string(xml_get_error_code($parser)),xml_get_current_line_number($parser)));
		}
		xml_parser_free($parser);
	?>
</body>
</html>