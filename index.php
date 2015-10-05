<html>
<head>
	<title>P2W</title>
	<meta charset="UTF-8">
</head>
<body>
<center>
<form action="upload.php" method="post" enctype="multipart/form-data">
<table width="0" border="1" cellspacing="0" cellpadding="3">
	<tr>
		<td>項目</td>
		<td>&nbsp;</td>
		<td>備註</td>
	</tr>
	<tr>
		<td>圖片來源</td>
		<td>
			網址:<input name="link" type="text" value=""><br>
			上傳:<input type="file" name="file" id="file"></td>
		<td>二擇一，網址優先</td>
	</tr>
	<tr>
		<td>寬</td>
		<td><input name="width" type="number" value="200"></td>
		<td rowspan="2">建議寬*高50000以下</td>
	</tr>
	<tr>
		<td>高</td>
		<td><input name="height" type="number" value="150"></td>
	</tr>
	<tr>
		<td>自定義文字</td>
		<td><textarea name="text" cols="50" rows="8">0123456789</textarea></td>
		<td>留空則使用0123456789</td>
	</tr>
	<tr>
		<td>白色取代文字</td>
		<td>R+G+B&gt;=
			<input name="white" type="text" id="white" value="765">
			<br>
			以
			<input name="replace" type="text" value="  ">
			代替</td>
		<td>RGB之和高於此值時<br>
			代替成其他文字</td>
	</tr>
	<tr>
		<td colspan="3" align="center"><input type="submit" name="submit" value="產生"></td>
	</tr>
</table>
</form>
<hr>
<?php
@include("../function/developer.php");
?>
</center>
</body>
</html>