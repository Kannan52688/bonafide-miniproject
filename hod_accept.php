<?php
$regnum=$_GET["d"];
$link=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");

$query= "SELECT * FROM hod WHERE regnum='$regnum'";

$result=mysqli_query($link,$query);

$numrow=mysqli_num_rows($result);
while($row=mysqli_fetch_assoc($result))
{
    $stname=$row['stname'] ;
    $dept=$row['dept'];
    $year=$row['year'];
    $clgname=$row['clgname'];
}
$INSERT ="INSERT Into office(stname,regnum,dept,year,clgname) values(?,?,?,?,?)";
$stmt = $link->prepare($INSERT);
$stmt->bind_param("sssss", $stname,$regnum,$dept,$year,$clgname);
$stmt->execute();
$delete = "DELETE FROM hod WHERE regnum='$regnum'";
if($link->query($delete)===TRUE)
{
echo 'student accepted';
}
// print "<script>";
// 				print " self.location='teacher.php';";
// 		print "</script>";
?>