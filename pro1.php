<?php
session_start();
 // $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="pro1.css">
<form action="pro2.php" method="POST">
<head>
 <title>P_Home</title>
</head>
<center><h1 style="background-color:DodgerBlue;"> Vaccine Provider Home Page of <?php echo $_SESSION['username'];?> 
</h1></center>
<center><body>
<div class="login">
<h1>Update Vaccine Count</h1>
<form method="post">
<input type="text" name="u" placeholder="Center Code" required="required" />
<input type="num" name="p" placeholder="Vaccine Number" required="required" />
<button type="submit" class="btn btn-primary btn-block btn-large">Update</button>
</form>
 
<h1>Check Center Vaccine Count</h1>
 <form action="pro2.php" method="post"> 
 <input type="text" name="ua" placeholder="Center Code" required="required" />
 <button type="submit" class="btn btn-primary btn-block btn-large">Check</button>
 </form> 
</div>
</body></center>
</form>
</html>