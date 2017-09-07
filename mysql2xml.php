<!DOCTYPE html>
<html>
<head>
	<title>Data in MySQL to XML</title>
</head>
<body>
	<form>
		<label>Select a User:</label>
		<select name="users" onchange="showUser(this.value)">
			<option value="1">Peter Griffin</option>
			<option value="2">Lois Griffin</option>
			<option value="4">Glenn Quagmire</option>
			<option value="3">Joseph Swanson</option>
		</select>
	</form>
	<h2><span id="firstname"></span>&nbsp;<span id="lastname"></span></h2>
	<div style="text-align: left;">
		<span id="age_text"></span>
		<span id="age"></span>
		<span id="hometown_text"></span>
		<span id="hometown"></span>
		<span id="job"></span>
	</div>

	<script type="text/javascript">
		var xmlHttp = null;
		function showUser(str){
			GetHttpRequest();
			if (!xmlHttp) {
				alert("Browser couldn't support Http Request!");
				return ;
			}
			var url = "responsexml.php";
			url = url + "?q=" + str;
			url = url + "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET",url,true);
			xmlHttp.send();
		}

		function stateChange(){
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				var xmlDoc = createXML(xmlHttp.responseText);
				console.log(xmlDoc);
				document.getElementById("firstname").innerHTML = xmlDoc.getElementsByTagName("firstname")[0].childNodes[0].nodeValue;
				document.getElementById("lastname").innerHTML = xmlDoc.getElementsByTagName("lastname")[0].childNodes[0].nodeValue;
				document.getElementById("job").innerHTML = xmlDoc.getElementsByTagName("job")[0].childNodes[0].nodeValue;
				document.getElementById("age_text").innerHTML = "Age:";
				document.getElementById("age").innerHTML = xmlDoc.getElementsByTagName("age")[0].childNodes[0].nodeValue;
				document.getElementById("hometown_text").innerHTML = "<br>From:";
				document.getElementById("hometown").innerHTML = xmlDoc.getElementsByTagName("hometown")[0].childNodes[0].nodeValue;
			}
		}

		function createXML(str){
			var xmlDoc;
			if (document.all) {
				xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
				xmlDoc.loadXML(str);
				return xmlDoc;
			}
			else{
				xmlDoc = new DOMParser();
				return xmlDoc.parseFromString(str,"text/xml"); 
			}
		}

		function GetHttpRequest(){
			try{
				xmlHttp = new XMLHttpRequest();
			}
			catch(e){
				try{
					xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e){
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			}
			return xmlHttp;
		}
	</script>
</body>
</html>