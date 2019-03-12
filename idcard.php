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
$rollno = $_POST['rollno'];
$sql1 = "SELECT IDPHOTO FROM IDCardPhotos WHERE NAME = '$rollno'";
$res = mysqli_query($mysqli, $sql1);
while ($row = mysqli_fetch_object($res)) {
  $pic = $row->IDPHOTO;
	echo '<center><img src="'.$pic.'" height="500" width="900"/></center>';
	
}
$mysqli->close();
?>