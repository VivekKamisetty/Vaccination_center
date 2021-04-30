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
//foreach($checkbox1 as $chk1)
//   {
//      $chk .= $chk1.", ";
//   }

foreach($checkbox1 as $chk1)
 {
 
switch ($chk1) {
 case "Pregnancy":
 $v=$v+0.5;
 break;
 case "Diabetes":
 $v=$v+1;
 break;
 case "Hypertension":
 $v=$v+0.5;
 break;
 case "Chronic lung diseases":
 $v=$v+1;
 break;
 case "Chronic Kidney diseases":
 $v=$v+1;
 break;
 case "Chronic Liver diseases":
 $v=$v+1;
 break;
 case "Malignancy":
 $v=$v+1;
 break;
 case "Asthma":
 $v=$v+1;
 break;
 case "CVI(Heart strokes)":
 $v=$v+1;
 break;
 case "Myocardial Infraction(Heart Attack)":
 $v=$v+1;
 break;
 case "Hyperthyroidism/Hypothyroidism":
 $v=$v+1;
 break;
 case "Auto Immune diseases(SLE and RE)":
 $v=$v+0.5;
 break;
 default:
 $v=$v+0;
 
}
 
 $chk .= $chk1.", ";
 }

 if($e>=55){ //increasing value acc to age
    $v=$v+2;
   }else if($e >=45){
    $v=$v+1;
   }else{
    $v+$v+0.5;
   }
    
   switch($b){ //increasing value acc to occupation
    case "Health Care Workers" :
    $v=$v+3;
    break;
    case "Frontline Workers" :
    $v=$v+2;
    break;
    case "Other essential Workers" :
    $v=$v+1;
    break;
    default :
    $v=$v+0;
    
   }
 

$g = $v;
$h = 0;
$sql = "INSERT INTO register (name, aadhar, gender, center, occupation, email, phone, age, medical_cond, score, status)
VALUES ('$x', '$y', '$z', '$a', '$b', '$c', $d, $e, '$chk', $g, $h)";

if ($conn->query($sql) == TRUE)
{
    echo "New record inserted succesfully";
}

else
{
    echo "error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
