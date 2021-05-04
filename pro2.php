<?php
session_start();
?>
 
<!DOCTYPE html>
<head></head>
<body>
<?php


 
$a=$_POST["u"];
$b=$_POST["p"];
 
$c=$_POST["ua"];
 
//echo $_SESSION['username'];
$y=$_SESSION['username'];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (mysqli_connect_error())
 {
 die("Connection Failed:" . $conn->connect_error);
 }
 
if ($c == NULL)
 {
 $user_validation = "SELECT * FROM center WHERE center = '$a' "; //update vacc
 $results = mysqli_query($conn, $user_validation);
 $user = mysqli_fetch_assoc($results);
 
 if (mysqli_num_rows($results) == 0) {
 echo "wrong details entered1";
 $conn->close();
 }
 else{
 
 $q1 = "UPDATE center SET v_count = v_count +'$b' WHERE center = '$a'";
 $q2 = "UPDATE provider SET p_vaccines = p_vaccines+'$b' WHERE p_uname = '$y'";
 //echo $_SESSION['username'];
 if(mysqli_query($conn,$q2) && mysqli_query($conn,$q1)){
 echo "update successful";
 session_unset();
 session_destroy();
 //header('location:provider.html');
 $conn ->close();
 
 }
 
 
 }
 
 }else{
 
 
 $user_validation = "SELECT * FROM center WHERE center = '$c' "; //update vacc
 $results = mysqli_query($conn, $user_validation);
 $user = mysqli_fetch_assoc($results);
 
 if (mysqli_num_rows($results) == 0) {
 echo "wrong details entered1";
 $conn->close();
 }else{
 
 $q2 = "SELECT * FROM center WHERE center = '$c'";
 $r2=mysqli_query($conn,$q2);
 $u2=mysqli_fetch_assoc($r2);
 echo "number of vaccines at ".$c." is ".$u2['v_count'];



 
 }


 
 }
 ?>





 
</body>
 
</html>