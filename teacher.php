<?php
    $con=mysqli_connect("localhost","root","","bonafide") or die("Connection Failed");
if ($_SERVER['REQUEST_METHOD']=='POST'){
$uname = $_POST['uname'];
$password = $_POST['password'];
//require_once('dbConnect.php');
$sql= "SELECT * FROM teachers WHERE uname = '$uname' AND password = '$password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){

echo '<html><head><title>Students Records</title><style>.kk td,.kk th{border:1px solid black;border-collapse:collapse;padding: 8px;}.kk{width: 80%;margin: auto}.kk tr:nth-child(odd){background-color:#22C9FA;}.kk tr:nth-child(even){background-color:#91E6FF;}#btn1{background:#9BFFB5;}#btn2{background:#FF9B9F;}#btn1:hover{background:#FFFFFF;}#btn2:hover{background:#FFFFFF;}#btn1:checked::before{background:#FFFFFF;}</style></head><body><br><br><form  method="post"><center><table border=1 cellpadding=5 class="kk">';




if($password=="I year"||$password=="II year"||$password=="III year"||$password=="IV year"){
    echo '<center><h1>Welcome Sir/Madam<br>Faculty Advicer of  '.$password.' - '.$uname.' students </h1></center>';

$link=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");

$query= "SELECT * FROM student_form WHERE dept='$uname' AND year='$password' ";

$result=mysqli_query($link,$query);

$numrow=mysqli_num_rows($result);

if($numrow>0)
{
    echo "<tr><th>Student name</th>";
    echo "<th>Register Number</th>";
    echo "<th>Department</th>";
    echo "<th>Year</th>";
    echo "<th>College name</th>";
    echo "<th>Accept</th>";
    echo "<th>Reject</th></tr>";
    session_start();

while($row=mysqli_fetch_assoc($result))
{   
    echo "<tr><td><center>".$row['stname']."</center></td>";
    echo "<td><center>".$row['regnum']."</center></td>";
    echo "<td><center>".$row['dept']."</center></td>";
    echo "<td><center>".$row['year']."</center></td>";
    echo "<td><center>".$row['clgname']."</center></td>";
    echo '<td><button><a href="accept.php?d='.$row["regnum"].'">Accept</a></button></td>';
    echo '<td><button><a href="reject.php?d='.$row["regnum"].'">Reject</a></button></td></tr>';
}
}
else
{
    echo 'No records found';
}



 echo '</table></center></form></body>';


}
elseif($password=="hod")
{
    echo '<center><h1>Welcome HOD Sir/Madam<br>Department of '.$uname.' </h1></center>';
    $link=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");
    
    $query= "SELECT * FROM hod WHERE dept='$uname' ";
    
    $result=mysqli_query($link,$query);
    
    $numrow=mysqli_num_rows($result);
    
    if($numrow>0)
    {
        echo "<tr><th>Student name</th>";
        echo "<th>Register Number</th>";
        echo "<th>Department</th>";
        echo "<th>Year</th>";
        echo "<th>College name</th>";
        echo "<th>Accept</th>";
        echo "<th>Reject</th></tr>";
    
    
    
    while($row=mysqli_fetch_assoc($result))
    {   
        echo "<tr><td><center>".$row['stname']."</center></td>";
        echo "<td><center>".$row['regnum']."</center></td>";
        echo "<td><center>".$row['dept']."</center></td>";
        echo "<td><center>".$row['year']."</center></td>";
        echo "<td><center>".$row['clgname']."</center></td>";
        echo '<td><button><a href="hod_accept.php?d='.$row["regnum"].'">Accept</a></button></td>';
    echo '<td><button><a href="hod_reject.php?d='.$row["regnum"].'">Reject</a></button></td></tr>';
    }
    }
    else
    {
        echo 'No records found';
    }
    
    
    
     echo '</table></center><form></body>';
    
    
    }
    else
    {
        echo '<center><h1>welcome Office Administrater sir/madam </h1></center>';
    $link=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");
    
    $query= "SELECT * FROM office";
    
    $result=mysqli_query($link,$query);
    
    $numrow=mysqli_num_rows($result);
    
    if($numrow>0)
    {
        echo "<tr><th>Student name</th>";
        echo "<th>Register Number</th>";
        echo "<th>Department</th>";
        echo "<th>Year</th>";
        echo "<th>College name</th>";
        echo "<th>issue</th>";
    
    
    
    while($row=mysqli_fetch_assoc($result))
    {   
        echo "<tr><td><center>".$row['stname']."</center></td>";
        echo "<td><center>".$row['regnum']."</center></td>";
        echo "<td><center>".$row['dept']."</center></td>";
        echo "<td><center>".$row['year']."</center></td>";
        echo "<td><center>".$row['clgname']."</center></td>";
        echo '<td><button><a href="issue.php?d='.$row["regnum"].'">Issued</a></button></td>';
    }
    }
    else
    {
        echo 'No records found';
    }
    
    
    
     echo '</table></center><form></body>';
        
    }
}
else{
    echo 'Incorrect password or username';
    }
    }
    ?>