<?php

session_start();
DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'late_system');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }
  $email = $_POST['email'];
  $password = $_POST['password'];

$res = mysqli_query($mysqli, "SELECT email,password FROM passwordcheck WHERE email='$email' AND password='$password'") or die("not done");
if(mysqli_num_rows($res)>0){
  $_SESSION['email'] = $email;
	header("Location: payment.php");
}
else{
  header("Location: login.php");
}
?>
