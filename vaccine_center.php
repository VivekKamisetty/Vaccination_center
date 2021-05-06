<?php
 
 session_start();

$x=$_POST["username"];
$y=$_POST["password"];
 
$x = stripslashes($x);
$y = stripslashes($y);


 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (mysqli_connect_error())
 {
 die("Connection Failed:" . $conn->connect_error);
 }
 
$user_validation = "SELECT * FROM center WHERE center_uname = '$x' && center_pwd = '$y'";
$results = mysqli_query($conn, $user_validation);
$user = mysqli_fetch_assoc($results);
 
if(mysqli_num_rows($results) == 1){
 //echo "loged in sucess fully";
 $_SESSION['username'] = $user['center'];
 header('location:home_vaccine_center.php');
 
}else{
 echo "incorrect passcode";
}
 

?>