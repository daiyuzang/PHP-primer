<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Test</title>
</head>
<body>
	<form>
		<label>First Name:</label>
		<input type="text" id="text" onkeyup="showHint(this.value)"></input>
	</form>
	<p>Suggestions: <span id="txtHint"></span></p>
	<script type="text/javascript">

		var xmlHttp = null;
		function showHint(str){
			if (str.length === 0) {
				document.getElementById("txtHint").innerHTML = "";
				return ;
			}
			GetXmlHttpRequest();
			if (!xmlHttp) {
				alert("Browser doesn't support HTTP request!")
				return ;
			}
			var url = "ajax.php";
			url = url+"?q="+str;
			url = url+"&sid="+Math.random();//添加一个随机数，以防服务器使用缓存文件
			xmlHttp.onreadystatechange = stateChange;
			xmlHttp.open("GET",url,true);
			xmlHttp.send(null);
		}
		function GetXmlHttpRequest(){
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
		function stateChange(){
			if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
				document.getElementById("txtHint").innerHTML = xmlHttp.responseText;
				console.log(xmlHttp.responseText);
			}
		}



		function AjaxDoc(){
			var xmlHttp; 
			if (window.XMLHttpRequest) {
				xmlHttp = new XMLHttpRequest();
			}else{
				xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlHttp.onreadystatechange = function(){
				if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
					alert(xmlHttp.responseText);
				}
			}
			xmlHttp.open("GET","",true);
			xmlHttp.send();
		}
		
	</script>
</body>
</html>