<?php
$regnum=$_GET["d"];
$link=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");

$delete = "DELETE FROM hod WHERE regnum='$regnum'";
if($link->query($delete)===TRUE)
{
echo 'deleted successfully';
}
?>