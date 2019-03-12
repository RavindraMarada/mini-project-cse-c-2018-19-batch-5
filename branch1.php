<!DOCTYPE html>
<html>
<head>
	<title>STUDENT DETAILS</title>
	
</head>
<body>
<div align="center">
	<table border="2" width="600">
		<tr>
			<th>REG_NO</th>
			<th>DATE</th>
			<th>TIME</th>
			<th>BRANCH</th>
		</tr>
<?php
  DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'late_system');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }

$date = $_POST['date'];
$branch = $_POST['branch'];
$res = mysqli_query($mysqli, "SELECT REG_NO, DATEs, TIME2, BRANCH FROM ADMIN WHERE DATEs = '$date'  AND BRANCH = '$branch'");
$count = mysqli_num_rows($res);
if(mysqli_num_rows($res)>0){
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	echo "<tr  align='center'><td>". $row['REG_NO'] ."</td><td>". $row['DATEs'] . "</td><td>". $row['TIME2'] ."</td><td>". $row['BRANCH'] . "</td><td>";
}
echo $count;
echo "</table>";
}

$mysqli->close();
?>
	</table>
</div>
</body>
</html>
