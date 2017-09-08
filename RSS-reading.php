<!DOCTYPE html>
<html>
<head>
	<title>RSS Reading</title>
</head>
<body>
	<form>
		<label>Select an RSS-Feed:</label>
		<select onchange="showRSS(this.value)">
			<option value="Google">Google News</option>
			<option value="MSNBC">MSNBC News</option>
		</select>
	</form>
	<div id="rss-output"></div>
	<b>RSS Feed will be listed here.</b>
	<script type="text/javascript">
		var xmlHttp = null;
		function showRSS(str){
			GetHttpRequest();
			if (!xmlHttp) {
				alert("Browser couldn't support Http Request!");
				return ;
			}
			var url = "getrss.php";
			url += "?q=" + str;
			url += "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET",url,true);
			xmlHttp.send();
		}

		function stateChange(){
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				document.getElementById("rss-output").innerHTML = xmlHttp.responseText;
			}
		}

		function GetHttpRequest(){
			try{
				xmlHttp = new XMLHttpRequest();
			}catch(e){
				try{
					xmlHttp = new ActiveOBject("Msxml2.XMLHTTP");
				}catch(e){
					xmlHttp = new ActiveOBject("Microsoft.XMLHTTP");
				}
			}
			return xmlHttp;
		}
	</script>
</body>
</html>