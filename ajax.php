<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>leetcode</title>
</head>
<body>
	<p id="demo">点击这个按钮，获得您的坐标：</p>
	<button onclick="getLocation()">试一下</button>
	<script type="text/javascript">
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