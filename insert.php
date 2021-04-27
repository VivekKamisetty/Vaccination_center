<?php

$x=$_POST['patientName'];
$y=$_POST['aadharNumber'];
$z=$_POST['patientGender'];
$a=$_POST['vcenter'];
$b=$_POST['Occupation'];
$c=$_POST['patientEmail'];
$d=$_POST['patientPhone'];
$e=$_POST['patientAge'];
$f=$_POST['techno'];


$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";

$conn = new mysqli($servername, $username, $password, $dbname);

if (mysqli_connect_error())
	{
        die("Connection Failed:" . $conn->connect_error);
	}

//echo "Connected Successfully";
$user_check = "SELECT * FROM register WHERE aadhar = '$y' LIMIT 1";
$results = mysqli_query($conn, $user_check);
$user = mysqli_fetch_assoc($results);
 
if($user)
{
if($user['aadhar']===$y) //aadhar verfication
    {
    echo "aadhar already exists and cant register with this aadhar";
 
    $conn->close();
    }
 
}
$v=0;
$checkbox1=$_POST['techno'];
$chk="";
foreach($checkbox1 as $chk1)
   {
      $chk .= $chk1.", ";
   }
 

$g = 0;
$h = 0;
$sql = "INSERT INTO register (name, aadhar, gender, center, occupation, email, phone, age, medical_cond, score, status)
VALUES ('$x', '$y', '$z', '$a', '$b', '$c', $d, $e, '$chk', $g, $h)";

if ($conn->query($sql) == TRUE)
{
    echo "New record created successfully";
}

else
{
    echo "error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
