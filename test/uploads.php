<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件上传</title>
</head>
<body>
	<form action="upload2.php" method="post" enctype="multipart/form-data">
		<input type="file" name="myFile[]"><br>
		<input type="file" name="myFile[]"><br>
		<input type="file" name="myFile[]"><br>
		<input type="submit">
	</form>
</body>
</html>