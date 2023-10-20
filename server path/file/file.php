<!DOCTYPE html>
<html>
<head>
<title>File Demo</title>
</head>
<body>
<?php 
if(!isset($_GET['mode'])){ 
?>
<form name=frmfile method="post" action="file.php?mode=write">
<label>Type Here : </label>
<textarea name="txa"></textarea><br>
<input type="submit" name="write" value="Write">
</form>
<?php
}
if(isset($_GET['mode']))
{
$mode=$_GET['mode'];
if($mode=='write'){
$file=fopen("hi.txt", "w");
$value=$_POST['txa'];
echo "Written Successfully";
fputs($file,$value);
?>
<form name="frmread" method="post" action="file.php?mode=read">
<input type="submit" name="read" value="Read"/>
</form>
<?php
}
elseif($mode=='read') {
$file=fopen("hi.txt", "r");
$fileValue=fread($file, 10000);
echo "$fileValue";
echo "";
}
}
?>
</body>
</html>
