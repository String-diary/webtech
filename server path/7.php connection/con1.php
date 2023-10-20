<?php
$conn=mysqli_connect('localhost','root','','tbl_students');
if(!$conn)
{
    die('cannot connect mysql');
}
else
{
    echo"Connected Successfully";
}
?>