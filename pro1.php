<?php
$a=$_POST["u"];
$b=$_POST["p"];
 
$c=$_POST["ua"];
 
 
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


    $update_value = "UPDATE center SET v_count = v_count +'$b' where center='$a'";
    $result = mysqli_query($conn, $update_value);
        echo "Vaccines Successfully Updated";
    //$user = mysqli_fetch_assoc($result);
    $conn->close();
    }
else
{   
    
    $user_validation2 = "SELECT v_count FROM center WHERE center = '$c' "; //update vacc
    $results2 = mysqli_query($conn, $user_validation2);
    $user2 = mysqli_fetch_assoc($results2);

    if (mysqli_num_rows($results2) == 0) {
     echo "wrong details entered2";
     $conn->close();
    }

    echo "Number of Vaccines available at ".$c." "; echo $user2['v_count'];

}

 
?>
