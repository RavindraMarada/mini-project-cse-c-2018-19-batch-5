<!DOCTYPE html>
<html>
<head>
	<title>BRANCH DETAILS</title>
	
</head>
<body>
<div align="center">
	<table border="2" width="600">
		<tr>
			<th>REG_NO</th>
			<th>DATE</th>
			<th>TIME</th>
			<th>BRANCH</th>
			<th>YEAR</th>
			<th>SECTION</th>
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
$sql = "SELECT REG_NO, DATEs, TIME2, BRANCH, STU_YEAR, SECTION FROM ADMIN WHERE DATEs = '$date'";
 $res = mysqli_query($mysqli, $sql) or die("died");
 if(mysqli_num_rows($res)>0){
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	echo "<tr  align='center'><td>". $row['REG_NO'] ."</td><td>". $row['DATEs'] . "</td><td>". $row['TIME2'] ."</td><td>" . $row['BRANCH'] . "</td><td>" . $row['STU_YEAR'] . "</td><td>" . $row['SECTION'] . "</td><td>";

}
}
$mysqli->close();
?>
	</table>
</div>
</body>
</html>
