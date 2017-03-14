<html>
<head>
	<title>P2W 產生中...</title>
	<meta charset="UTF-8">
</head>
<body>
<?php
$error=true;
if($_POST["link"]==""){
	$source="檔案";
	if($_FILES["file"]["error"] != 0){
		echo "上傳失敗<br>";
		echo "Error: " . $_FILES["file"]["error"];
		$error=false;
		?><script>document.title="P2W 上傳失敗"</script><?php
	}else {
		echo "上傳成功<br>";
		echo "檔案名稱: " . $_FILES["file"]["name"]."<br>";
		echo "檔案類型: " . $_FILES["file"]["type"]."<br>";
		echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br>";
		$exname=pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
		$file=$_FILES["file"]["tmp_name"];
	}
}else {
	$source="連結";
	$file=$_POST["link"];
	echo "檔案連結: ".$file."<br>";
	$exname=pathinfo($file, PATHINFO_EXTENSION);
}
function tohex($i){
	return ($i<16?"0":"").dechex($i);
}
function hexcolor($r,$g,$b){
	return tohex($r).tohex($g).tohex($b);
}
if($error){
	if(preg_match("/png/i",$exname))$im = imagecreatefrompng($file);
	else if(preg_match("/jpg/i",$exname))$im = imagecreatefromjpeg($file);
	else if(preg_match("/jpeg/i",$exname))$im = imagecreatefromjpeg($file);
	else if(preg_match("/gif/i",$exname))$im = imagecreatefromgif($file);
	else {
		echo $source."類型錯誤";
		$error=false;
		?><script>document.title="P2W <?php echo $source; ?>錯誤";</script><?php
	}
}
if($error){
	echo "類型: ".$exname."<br>";
	$w=imagesx($im);
	$h=imagesy($im);
	$nw=$_POST["width"];
	$nh=$_POST["height"];
	echo $w." x ".$h." to ".$nw." x ".$nh;
	if($_POST["text"]==""){
		$text=array(0,1,2,3,4,5,6,7,8,9);
	}
	else {
		$text = array();
		$str=str_replace("\r\n","",$_POST["text"]);
		$strLen = mb_strlen($str, 'UTF-8');
		for ($i = 0; $i < $strLen; $i++){
			$text[] = mb_substr($str, $i, 1, 'UTF-8');
		}
	}
	$length=count($text);
?>
<hr>
<div style="font-size: 1px; line-height: 1px;">
	<?php
	$count=0;
	for($i=0;$i<$h;$i+=$h/$nh){
		?>
		<?php
		for($j=0;$j<$w;$j+=$w/$nw){
			$rgb = ImageColorAt($im, floor($j), floor($i));
			$r = ($rgb >> 16) & 0xFF;
			$g = ($rgb >> 8) & 0xFF;
			$b = $rgb & 0xFF;
		?><span class="out" style="color: #<?php echo hexcolor($r,$g,$b); ?>"><?php
			if($r+$g+$b>$_POST["white"]){
				echo str_replace(" ","&nbsp;",$_POST["replace"]);
			}
			else {
				echo $text[$count++]; 
			}
		?></span><?php
		if($count>=$length)$count=0;
		}
		?>
		<br>
		<script>
		document.title="P2W 完成<?php echo floor($i/$h*100); ?>%";
		</script>
		<?php
	}
	?>
</div>
<hr>
<?php
	imagedestroy($im);
	?><script>document.title="P2W 產生完成"</script><?php
}
if($source=="檔案")unlink($file);
?>
</body>
</html>