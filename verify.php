<?php
$y=$_POST['aadhar'];
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname="vaccine";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if (mysqli_connect_error())
 {
 die("Connection Failed:" . $conn->connect_error);
 }
 
 $user_check = "SELECT * FROM register WHERE aadhar = '$y' LIMIT 1";
 //echo $user_check;
 $results = mysqli_query($conn, $user_check);
 $user = mysqli_fetch_assoc($results);
 
 
 
 if (mysqli_num_rows($results) == 0)
 {
 echo "Aadhar not registered";
 $conn->close();
 }


 
 if($user)
 {

    if($user['aadhar'] == $y) //aadhar verfication
    {
    
    echo "Hello "; echo $user['name'];

        if($user['status'] == 0)
            echo ", you are not vaccinated yet";
        else
            echo ", you are vaccinated";
    
    
    $conn->close();
    }
 }




 
?>
