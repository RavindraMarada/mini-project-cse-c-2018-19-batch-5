<?php
DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'late_system');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);


  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

$regno = $_POST['regno'];

$sql = "SELECT REGISTERNUM, IDSTATUS FROM IDdetails WHERE REGISTERNUM='$regno'";
$res = mysqli_query($mysqli, $sql) or die('gone');

if(mysqli_num_rows($res) != 0){
	while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	if($row['IDSTATUS'] == YES){
		echo "<h1>ID IS WITH THE FACULTY</h1>";
	}
	else{
		echo "<h1>ID IS WITH THE STUDENT</h1>";
	}

}
}

?>