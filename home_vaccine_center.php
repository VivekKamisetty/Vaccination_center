<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<style>
body {
  font-family: Arial;
  background: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-2044837-jpeg.jpg") center center no-repeat;
}

input[type=text], input[type=num], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=chk]{ 
  width: 10%;
  
  padding: 12px 20px;
  margin: 8px 0;
  display: block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
   }

input[type=submit] {
  width: 30%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


</style>
<body>

<h3>Vaccination Center Home of <?php echo $_SESSION['username']; ?> </h3>



<div class="container">

<form action="center_logout.php" method="POST">
  
  <button type="chk" > Logout</button>
</form>

<form action="vaccine_count.php" method="POST">
  <button type="submit" value="vacci"> Check Vaccine Count</button>
</form>

<br>

<form action="vaccinate_people.php" method="POST">
    <label>Vaccinate People : </label> 
    <input type="num" name="a" placeholder="Enter Number of People To Vaccinate" required="">
    <button type="submit" value="vacci">Submit</button>
    </form>
    <br>
  <form action="vaccine_occ.php" method="POST">
    <label>Vaccinate People According to Occupation</label>
    <select name="b">
        <option value="Health Care Workers">Health Care Workers</option>
        <option value="Frontline Workers">Frontline Workers</option>
        <option value="Other essential Workers">Other essential Workers</option>
    </select>
    
    <input type="num" id="count" name="c" placeholder="Count" required="">
    <!-- <input type="submit" name=b1 value="Submit"> -->
    <button type="submit"  value="occu">Submit</button>
  </form>



  <form action="vaccine_age.php" method="POST">
    <p>List People According to Age:</p>
    <input type="num" id="age" name="d" placeholder="Enter Age" required="">
    <input type="num" id="count" name="e" placeholder="Enter Count" required="">
    <button type="submit" value="Age">Submit</button>
    </form>
<br>


<form action="verify.php" method="POST">
    <p>Check Specific Person Status: </p>
    <label>Enter Aadhar</label>
    <input type="num" id="aadhar" name="aadhar" placeholder="Aadhar Number">
    <button type="submit" class="btn btn-primary btn-block btn-large">Submit</button>
    </form>

<form action="vaccinated_list.php" method="POST">    
    <p>Check User List:</p>
    <button type="submit">Vaccinated List</button>
</form>
<form action="waiting_list.php" method="POST">
    <button type="submit">Waiting List</button>
</form>
</div>

</body>
</html>

