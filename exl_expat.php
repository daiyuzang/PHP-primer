<!DOCTYPE html>
<html>
<head>
	<title>XML Expat XML DOM</title>
</head>
<body>
	<?php
		/*$parser = xml_parser_create();
		function start($parser,$elment_name,$element_attrs){
			switch ($elment_name) {//case内的值均为大写！！！
				case 'NOTE':
					echo "-- NOTE --<br>";
					break;
				case 'TO':
					echo "To: ";
					break;
				case 'FROM':
					echo "From: ";
					break;
				case 'HEADING':
					echo "Heading: ";
					break;
				case 'BODY':
					echo "Message: ";
					break;
			}
		}

		function stop($parser,$elment_name){
			echo "<br>";
		}

		function char($parser,$data){
			echo $data;
		}

		xml_set_element_handler($parser,"start","stop");

		xml_set_character_data_handler($parser,"char");
		$fp = fopen("note.xml","r");
		while ($data = fread($fp,4096)) {
			xml_parse($parser,$data,feof($fp)) or die(sprintf("XML error: %s at line %d",xml_error_string(xml_get_error_code($parser)),xml_get_current_line_number($parser)));
		}
		xml_parser_free($parser);*/

		//XML DOM
		/*$xmlDoc = new DOMDocument();
		$xmlDoc->load("note.xml");
		//print $xmlDoc->saveXML();

		$x = $xmlDoc->documentElement;
		foreach ($x->childNodes as $item) {
			print $item->nodeName . "=" . $item->nodeValue . "<br>";
		}*/

		//SimpleXML
		$xml = simplexml_load_file("note.xml");
		echo $xml->getName() . "<br>";

		foreach ($xml->children() as $child) {
			echo $child->getName() . ": " . $child . "<br>";
		}
		
	?>
</body>
</html>