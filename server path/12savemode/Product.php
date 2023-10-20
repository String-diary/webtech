<?php
ob_start();
session_start();
$link=mysqli_connect("localhost", "root", "") or die("Cannot connect mysql
software");
mysqli_select_db($link, "bca") or die("cannot select 15bca database");
if(isset($_REQUEST["mode"])=="save"){
mysqli_query($link, "insert into tbl_product values(
". $_REQUEST['txt_pid'] .",
'". $_REQUEST['txt_pname'] ."',
'". $_REQUEST["cmb_qtype"] ."',
'". $_REQUEST["txt_price"] ."')");
if(mysqli_affected_rows($link)){
$_SESSION["msg"]="Saved Successfully";
}
header("location:product.php");
}
if(isset($_REQUEST["mode"])==""){
?>
<html><head><title>Product Master</title>
<script language="javascript">
function valid(){
var a=/^[0-9]$/;
if(!a.test(document.frm.txt_pid.value)){
alert("Enter the Product Id Properly...");
document.frm.txt_pid.value="";
document.frm.txt_pid.focus();
return false;
}
}</script></head><body>
<h3>PRODUCT DETAILS</h3>
<form name="frm" method="post" action="product.php?mode=save"
onSubmit="return valid();">
<table border="0" cellpadding="0" cellspacing="0" width="300">
<tr height="40">
<td>Product Id *</td>
<td>:&nbsp;<input type="text" name="txt_pid" value=""></td></tr><tr height="40">
<td>Product Name</td>
<td>:&nbsp;<input type="text" name="txt_pname"
value=""></td>
</tr><tr height="40">
<td>Qty Type</td>
<td>:&nbsp;<select name="cmb_qtype">
<option value="1">--Select--</option>
<option value="Kgs">Kgs</option>
<option value="Lts">Lts</option>
<option value="Nos">Nos</option>
</select></td>
</tr><tr height="40">
<td>Price</td>
<td>:&nbsp;<input type="text" name="txt_price" value=""></td></tr><tr height="60">
<td colspan="2" align="center"><input type="submit"
value="Save">&nbsp;&nbsp;<input type="reset" value="Reset"></td></tr></table>
<?php
if(isset($_SESSION["msg"])!=""){
echo $_SESSION["msg"];
$_SESSION["msg"]="";
}
?></body></html><?php
}
?>