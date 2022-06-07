<?php
    $con=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");
if ($_SERVER['REQUEST_METHOD']=='POST'){
$uname = $_POST['uname'];
$password = $_POST['password'];
//require_once('dbConnect.php');
$sql= "SELECT * FROM teachers WHERE uname = '$uname' AND password = '$password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
echo 'your id has been login successfully';
header("Location:teacher.php?staus=success");


}else{
echo 'Incorrect password or username';
}
}
?>