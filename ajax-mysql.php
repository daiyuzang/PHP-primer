<!DOCTYPE html>
<html>
<head>
	<title>Ajax MySQL</title>
</head>
<body>
	<form>
		<select name="users" onchange="showUser(this.value)">
			<option value="1">Peter Griffin</option>
			<option value="2">Lois Griffin</option>
			<option value="3">Glenn Quagmire</option>
			<option value="4">Joseph Swanson</option>
		</select>
	</form>
	<div id="txtHint">Users info will be list here.</div>
	<script type="text/javascript">
		var xmlHttp;
		function showUser(str){
			GetHttpRquest();
			if (!xmlHttp) {
				alert("Browser dosen't support Http Request!");
				return;
			}
			var url = "";
			url = url + "?q=" + str;
			url = url + "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET", url, true);
			xmlHttp.send();
		}

		function stateChange(){
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
			}
		}

		function GetHttpRquest(){
			try{
				xmlHttp = new XMLHttpRequest();
			}catch(e){
				try{
					xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
				}catch(e){
					xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
			}
			return xmlHttp;
		}
	</script>
</body>
</html>