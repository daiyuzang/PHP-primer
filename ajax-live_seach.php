<!DOCTYPE html>
<html>
<head>
	<title>Ajax Live Search!</title>
	<style type="text/css">
		#livesearch{
			margin: 0px;
			width: 194px;
		}
		#txt1{
			margin: 0px;
		}
	</style>
</head>
<body>
	<form>
		<input type="text" id="txt1" size="30" onkeyup="showResult(this.value)">
		<div id="livesearch"></div>
	</form>
	<script type="text/javascript">
		var xmlHttp = null;
		function showResult(str){
			if (str.length == 0) {
				document.getElementById("livesearch").innerHTML = "";
				document.getElementById("livesearch").style.border = "0px";
				return ;
			}
			GetHttpRequest();
			if (!xmlHttp) {
				alert("Browser could't support Http Requst!");
				return ;
			}
			var url = "livesearch.php";
			url += "?q=" + str;
			url += "&sid=" + Math.random();
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET",url,true);
			xmlHttp.send();
		}

		function stateChange(){
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				document.getElementById("livesearch").innerHTML = xmlHttp.responseText;
				document.getElementById("livesearch").style.border = "1px solid #a5acb2";
			}
		} 

		function GetHttpRequest(){
			try{
				xmlHttp = new XMLHttpRequest();
			}
			catch(e){
				try{
					xmlHttp = new ActiveOBject("Msxml2.XMLHTTP");
				}
				catch(e){
					xmlHttp = new ActiveOBject("Microsoft.XMLHTTP");
				}
			}
			return xmlHttp;
		}
	</script>
</body>
</html>