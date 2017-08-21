<!DOCTYPE html>
<html>
<head>
	<title>uploadfile</title>
</head>
<body>
	<form action="upload_file.php" method="post"
	enctype="multipart/form-data"><!--multipart/form-data文件内容采用二进制传输-->
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /> 
	<br />
	<input type="submit" name="submit" value="Submit" />
	</form>
</body>
</html>