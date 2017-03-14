<html>
<head>
	<title>P2W</title>
	<meta charset="UTF-8">
</head>
<body>
<center>
<form action="upload.php" method="post" enctype="multipart/form-data">
<script type="text/javascript">
function cgsource(id) {
	if (id) {
		source_url.checked = true;
		source_url_input.required = true;
		file.required = false;
		file.value = "";
	} else {
		source_upload.checked = true;
		file.required = true;
		source_url_input.required = false;
		source_url_input.value = "";
	}
	console.log("asd");
}
</script>
<table width="0" border="1" cellspacing="0" cellpadding="3">
	<tr>
		<td>項目</td>
		<td>&nbsp;</td>
		<td>備註</td>
	</tr>
	<tr>
		<td>圖片來源</td>
		<td>
			<label>
				<input type="radio" name="source" id="source_url" value="url" checked onchange="cgsource(true)">網址:
			</label>
			<input name="link" type="text" id="source_url_input" onclick="cgsource(true)" required>
			<br>
			<label>
				<input type="radio" name="source" id="source_upload" value="upload" onchange="cgsource(false)">上傳:
			</label>
			<input type="file" name="file" id="file" accept=".png,.jpg,.jpeg,.gif" onchange="cgsource(false)">
		</td>
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