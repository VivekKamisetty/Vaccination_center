<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";

$x=$_SESSION['username'];

$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_error())
{
die("Connection Failed:" . $conn->connect_error);
}

$vlist = "SELECT * FROM register WHERE center = '$x' && status = 1";
$results = mysqli_query($conn, $vlist);
$check = mysqli_num_rows($results);

if($check>0){
   while($row = mysqli_fetch_assoc($results)){
       echo $row['name']. ", ".$row['aadhar'];
	echo '<br>';
       }

}




?>
