<?php
 
 
session_start();
$x = $_SESSION['username'];
$a = $_POST['a'];
echo "$x";
$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (mysqli_connect_error())
 {
 die("Connection Failed:" . $conn->connect_error);
 }
 
 
$v_countheck = "SELECT * FROM center WHERE center = '$x' "; //update vacc
$results = mysqli_query($conn, $v_countheck);
$user = mysqli_fetch_assoc($results);

if($a > $user['v_count'])
echo "not enough vaccines";

else{
 $q = "SELECT * FROM register WHERE status = 0 and center = '$x'
 order by score
 limit $a ";
 
 $result = mysqli_query($conn,$q);
 $resultcheck = mysqli_num_rows($result);
echo $resultcheck;

 
 if($resultcheck >0){
     
 while($row = mysqli_fetch_assoc($result)){
    //echo "hi";
    $temp = $row['aadhar'];

 mysqli_query($conn,"UPDATE register SET status = 1 WHERE aadhar = $temp");
 //echo "hello";
 }
 //echo "shit";
 mysqli_query($conn,"UPDATE center SET v_count = v_count - $resultcheck WHERE center = '$x'");
 
 echo "people vaccinated";
 
 }else{
 echo "no people to vaccinate";
 }
 


 
}
 
?>