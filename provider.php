<?php
 
$x=$_POST["u"];
$y=$_POST["p"];
 
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
 
$user_validation = "SELECT * FROM provider WHERE p_uname = '$x' && p_password = '$y'";
$results = mysqli_query($conn, $user_validation);
$user = mysqli_fetch_assoc($results);
//echo mysqli_num_rows($results);
 
if(mysqli_num_rows($results) == 1){
 echo "loged in sucess fully";
 
}else{
 echo "incorrect passcode";
}
 
//$user = mysqli_fetch_array($results);
//echo $user['p_username'];
/*
if($user['p_username']==$x && $user['p_passcode']== $y){
echo 'login sucess';
}else{
echo 'login fail';
}
*/
?>