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

//echo "hii".$x;

$vaccine_count = "SELECT * FROM center WHERE center = '$x' ";
$results = mysqli_query($conn, $vaccine_count);
$user = mysqli_fetch_assoc($results);
echo "no. of vaccine at ".$x." is ".$user['v_count'];
?>
