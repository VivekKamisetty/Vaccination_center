<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";

$x=$_SESSION['username'];

$f=$_POST['f'];
$g=$_POST['g'];

$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_error())
{
die("Connection Failed:" . $conn->connect_error);
}
if($g != NULL){//name
    $check_person = "SELECT * FROM register WHERE name = '$g'";
    $results = mysqli_query($conn, $check_person);
    $users = mysqli_fetch_assoc($results);
    if(mysqli_num_rows($results) == 1){
($user['status'] == 0)
          echo "not vaccinated";
          else
          echo "vaccinated";
    }else
    echo "user not found";
    


}else if($f != null){//aadhar

    $check_person = "SELECT * FROM register WHERE aadhar = '$f'";
    $results = mysqli_query($conn, $check_person);
    $users = mysqli_fetch_assoc($results);
    if(mysqli_num_rows($results) == 1){
          if($user['status'] == 0)
          echo "not vaccinated";
          else
          echo "vaccinated";
    }else
    echo "user not found";

}
?>
