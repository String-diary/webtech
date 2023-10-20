<html>
<head><title>Student Details - Database Connection</title></head><body>
<?php
ob_start();
session_start();
$conn= mysqli_connect ("localhost","root","","bca") or die("cannot connect mysql");
$rs=mysqli_query($conn,"select * from tblstudent");
if(mysqli_num_rows($rs))
{
?>
<table border="1" cellspacing="1" cellpadding="3" width="400"><?php
while ($arr=mysqli_fetch_array($rs))
{
?>
<tr>
<td><?php echo $arr[0]; ?></td>
<td><?php echo $arr[1]; ?></td>
<td><?php echo $arr[2]; ?></td>
<td><?php echo $arr[3]; ?></td>
<td><?php echo $arr[4]; ?></td>
</tr>
<?php
}
?>
</table>
<?php
}
?>
</body>
</html>