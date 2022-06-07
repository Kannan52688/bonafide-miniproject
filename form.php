<?php

$stname = $_POST['stname'];
$regnum  = $_POST['regnum'];
$dept = $_POST['dept'];
$year = $_POST['year'];
$clgname = $_POST['clgname'];

if (!empty($stname) || !empty($regnum) || !empty($dept) || !empty($year) || !empty($clgname))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bonafide";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{

   $SELECT ="SELECT regnum From student_form Where regnum=? Limit 1";
   $INSERT ="INSERT Into student_form(stname,regnum,dept,year,clgname) values(?,?,?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $regnum);
     $stmt->execute();
     $stmt->bind_result($regnum);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssss", $stname,$regnum,$dept,$year,$clgname);
      $stmt->execute();
      echo "your form was stored successfully";
      

    

     // if(isset($_POST['submit_btn'])){

     //    header("Location:table_creation.php?staus=success");
    
     // }
       
     }  
      else {
      echo "You already registered";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
echo '<html><head></head><body>
            <form action="student.html">
              <input type="submit" value="go back">
            </form>      
      </html>';
?>