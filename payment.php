<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<style>
  h1{
    color: white;
  }
  h2{
    color: white;
  }
  body{
    background-image: url("goodback2.jpg");
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
  }
		.container {
  position: absolute;
  border-radius: 60px;
  right: 500px;
  margin: 100px;
  max-width: 400px;
  padding: 30px;
  background-color: none;
}
.container3 {
  position: left;
  border-radius: 100px;
  padding: 30px;
  background-color: none;
}
input[type=text], input[type=date], input[type=time] {
  width: 80%;
  padding: 15px;
  margin: 15px 0 30px 0;
  border-style: solid;
  border-color: black;
  background: white;
}

.button {
  background-color: none;
  color: white;
  padding: 16px 10px;
  width: 100%;
}
.button123 {
  width: 100%;
  background: none;
  padding: 10px 10px;
 }
	</style>
</head>
<body>
<h1 style="text-indent: 18em">PAYMENT</h1>
<form method="post" action="pay.php" class="container">
	<h2 for="register_number"><b>Enter Register Number</b></h2>
	<input type="text" placeholder="Enter Register Number" name="regno" required><br>
	<h2 for="payment"><b>Enter The Amount</b></h2>
	<input type="text" placeholder="Enter The Amount" name="amount" required><br>
	<button type="submit" class="button123"><font size="4" color="white">Submit</font></button>
</form>
<form class="container3">
<a href="out2.php" class="button">LOGOUT</a>
</form>
<?php
include("out1.php");
session_start();
  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'late_system');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }
  $reg = $_POST['regno'];
  $num = mysqli_query($mysqli, "SELECT register_num, fine_allocated, fine_paid, fine_to_be_paid FROM fines WHERE register_num = '$regno'") or die('poora');

  if(mysqli_num_rows($num)>0){
    while($row = mysqli_fetch_array($num, MYSQLI_ASSOC)){
      echo  $row['register_num'];
      echo $row['fine_allocated'];
      echo $row['fine_paid'];
      echo $row['fine_to_be_paid'];
    }
  }
?>
</body>
</html>
