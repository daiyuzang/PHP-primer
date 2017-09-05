<!DOCTYPE html>
<html>
<head>
	<title>Ajax xml解析</title>
</head>
<body>
	<form>
	<label name="name">Select a cd:</label>
		<select name="cds" onchange="showCD(this.value)">
			<option value="Bob Dylan">Bob Dylan</option>
			<option value="Bee Gees">Bee Gees</option>
			<option value="Cat Stevens">Cat Stevens</option>
		</select>
	</form>
	<div id="txtHint">Cd info will be listed here.</div>
	<script type="text/javascript">
		var xmlHttp = null;
		function showCD(str){
			console.log("dsds");
			GetHttpRequest();
			if (!xmlHttp) {
				alert("Browser doesn't support HTTP Requst!");
				return;
			}
			var url = "getcd.php";
			url = url + "?q=" + str;
			url = url + "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET",url, true);
			xmlHttp.send(null);
		}

		function stateChange(){
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {//status！！！！
				document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
				console.log(xmlHttp.responseText);
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