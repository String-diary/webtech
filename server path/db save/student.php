<?php
ob_start();
session_start();
// Create connection
$conn = mysqli_connect("localhost", "root", "") or die("Cannot Connect MySql");
mysqli_select_db($conn, "bca") or die("Cannot select bca database");
//----------------------------------Save Mode Starts Here---------------------------------
if(isset($_REQUEST["mode"])=="save")
{
//echo "insert into tblStudent values('". $_POST["txt_regno"] ."','". 
$_POST["txt_sname"] ."','". $_REQUEST["cmb_dept"] ."','". 
$_POST["cmb_year"] ."','". $_POST["cmb_sem"] ."')";
//die();
mysqli_query($conn, "insert into tblStudent values('". 
$_POST["txt_regno"] ."','". $_POST["txt_sname"] ."','". 
$_REQUEST["cmb_dept"] ."','". $_POST["cmb_year"] ."','". 
$_POST["cmb_sem"] ."')");
if(mysqli_affected_rows($conn)){
$_SESSION['msg']="Saved Successfully";
}
header("location:student.php");
die();
}
//----------------------------------Save Mode Ends Here----------------------------------

//----------------------------------Null Mode Starts Here---------------------------------

if(isset($_REQUEST["mode"])==""){
?>
<html>
<head><title>Student Details</title></head>
<body>
<form name="frm" method="post" 
action="student.php?mode=save">
<table border="0" cellpadding="0" cellspacing="0" width="400">
<tr height="40">
<td>Register No</td>
<td>:&nbsp;<input type="text" value="" 
name="txt_regno" /></td>
</tr>
<tr height="40">
<td>Student Name</td>
<td>:&nbsp;<input type="text" value="" 
name="txt_sname" /></td>
</tr>
<tr height="40">
<td>Department</td>
<td>:&nbsp;<select name="cmb_dept">
<option value="1">----Select----</option>
<option value="Computer Application">Computer 
Application</option>
<option value="Computer Science">Computer Science</option>
<option value="Information Technology">Information 
Technology</option>
</select>
</td>
</tr>
<tr height="40">
<td>Year</td>
<td>:&nbsp;<select name="cmb_year">
<option value="1">----Select----</option>
<option value="I">I year</option>
<option value="II">II Year</option>
<option value="III">III Year</option>
</select>
</td>
</tr>
<tr height="40">
<td>Semester</td>
<td>:&nbsp;<select name="cmb_sem">
<option value="1">----Select----</option>
<option value="I">I</option>
<option value="II">II</option>
<option value="III">III</option>
<option value="IV">IV</option>
<option value="V">V</option>
<option value="VI">VI</option>
</td>
</tr>
<tr height="60">
<td colspan="2" align="center"><input type="submit" 
value="Save">&nbsp;&nbsp;<input type="reset" value="Reset"></td>
</tr>
</table>
<?php
if(isset($_SESSION['msg'])){
if($_SESSION['msg']!="")
echo $_SESSION['msg'];
$_SESSION['msg']="";
}
?>
</form>
</body>
</html>
<?php
}
//----------------------------------Null Mode Ends Here----------------------------------

?>
