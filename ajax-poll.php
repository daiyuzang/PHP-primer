<!DOCTYPE html>
<html>
<head>
	<title>Ajax Poll</title>
</head>
<body>
	<div id="poll">
		<h2>Do you like PHP an AJAX so far?</h2>
		<form>
			<label>YES:</label>
			<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
			<label>NO:</label>
			<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
		</form>
	</div>
	<script type="text/javascript">
		var xmlHttp = null;
		function getVote(num){
			GetHttpRequest();
			if (!xmlHttp) {
				alert("Browser doesn't support http request!");
			}
			var url = "getpoll.php";
			url += "?q=" + num;
			url += "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET",url,true);
			xmlHttp.send();
		}
		function stateChange(){
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				document.getElementById("poll").innerHTML = xmlHttp.responseText;
			}
		}
		function GetHttpRequest(){
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