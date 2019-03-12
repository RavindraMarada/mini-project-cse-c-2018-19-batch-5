<!doctype html>
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
			<th>TOTAL COUNT</th>
			<th>FINE</th>
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

  $regno = $_POST['regno'];

$res = mysqli_query($mysqli, "SELECT REG_NO, DATEs, TIME2, BRANCH FROM ADMIN WHERE REG_NO = $regno");
$count = mysqli_num_rows($res);
if(mysqli_num_rows($res)>0){
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	echo "<tr  align='center'><td>". $row['REG_NO'] ."</td><td>". $row['DATEs'] . "</td><td>". $row['TIME2'] ."</td><td>" . $row['BRANCH'] . "</td><td>";

}
echo $count;

$fine = ($count - 2)*10;

$all = "SELECT Amount FROM IDdetails WHERE REGISTERNUM='$regno'";
$allu = mysqli_query($mysqli, $all) or die('pooya mosam');

echo "<td>".$fine. "</td>";

echo "</table>";
}
$mysqli->close();
?>
	</table>
</div>
</body>
</html>
