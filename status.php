<?php
session_start();
$regnum=$_SESSION['regnum'];
$con=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");
$sql= "SELECT * FROM student_form WHERE regnum= '$regnum' ";
$result = mysqli_query($con,$sql);
$numrow=mysqli_num_rows($result);

$sql1= "SELECT * FROM hod WHERE regnum= '$regnum' ";
$result1 = mysqli_query($con,$sql1);
$numrow1=mysqli_num_rows($result1);

$sql2= "SELECT * FROM office WHERE regnum= '$regnum' ";
$result2 = mysqli_query($con,$sql2);
$numrow2=mysqli_num_rows($result2);

$sql3= "SELECT * FROM admin WHERE regnum= '$regnum' ";
$result3 = mysqli_query($con,$sql3);
$numrow3=mysqli_num_rows($result3);


if($numrow>=1)
{
    echo 'your Application waiting for your Faculty confirmation';
}
elseif($numrow1>=1)
{
    echo 'your Application waiting for your HOD confirmation';
}
elseif($numrow2>=1)
{
    echo 'your Application waiting in Office room';
}
elseif($numrow3>=1)
{
    echo 'your certificate issued';
}
else{
    echo 'rejected';
}
echo '<html><head></head><body>
            <form action="student.html">
              <input type="submit" value="go back">
            </form>      
      </html>';
?>