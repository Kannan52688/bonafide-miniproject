<html>
    <head>
        <title>Students Records</title>
        <style>
            .kk td,.kk th{
                border:1px solid black;
                border-collapse:collapse;
                padding: 8px;
            }
            .kk{
                width: 80%;
                margin: auto;
            }
            .kk tr:nth-child(odd){
                background-color:#22C9FA;
            }
            .kk tr:nth-child(even){
                background-color:#91E6FF;
            }

        </style>
    </head>
    <body>
        <form><center><table border=1 cellpadding=5 class="kk">


<?php



if()

$link=mysqli_connect("localhost","root","","bonafide",) or die("Connection Failed");

$query= "SELECT * FROM student_form year=? And dept=? ";

$result=mysqli_query($link,$query);

$numrow=mysqli_num_rows($result);

if($numrow>0)
{
    echo "<tr><th>Student name</th>";
    echo "<th>Register Number</th>";
    echo "<th>Department</th>";
    echo "<th>Year</th>";
    echo "<th>College name</th></tr>";



while($row=mysqli_fetch_assoc($result))
{   
    echo "<tr><td><center>".$row['stname']."</center></td>";
    echo "<td><center>".$row['regnum']."</center></td>";
    echo "<td><center>".$row['dept']."</center></td>";
    echo "<td><center>".$row['year']."</center></td>";
    echo "<td><center>".$row['clgname']."</center></td></tr>";
   // echo "<td><input type="text" placeholder="Accept"><td>";
}
}
else
{
    echo 'No records found';
}

?>

</table></center><form>
</body>