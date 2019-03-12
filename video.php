<!DOCTYPE html>
<html>
<head>
  <title>LATE ENTRY</title>
  <style >
    body  {
  background-image: url("busstop.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
 
}
.button {
  background-color: green;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
ul {
  list-style-type: none;
  border-radius: 500px;
  margin: 80px;
  padding: 10px;
  overflow: hidden;
  background-color: darkslategrey;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
h1{
  font-style: oblique;
}

  </style>
</head>
<body method="post" action="video.php">
  <form>
  <ul>
  <li><a class="active" href="video.php">Home</a></li>
  <li><a href="admin_dup.php">ADMIN</a></li>
  <li><a href="faculty.html">Faculty</a></li>
  <li><a href="student.html">Student</a></li>
  <li><a href="timetable.html">Time-Table</a></li>
  <li><a href="login.php">Pay And Take Your ID</a></li>
</ul>
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
  
$curday = date("D");
$res = mysqli_query($mysqli, "SELECT FACULTY1, FACULTY2 FROM TIME_TABLE WHERE DAY = '$curday'");
if(mysqli_num_rows($res)>0){
while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
  echo "<p> <font color=black size='6pt'>".$row['FACULTY1']."</p>";
  echo $row['FACULTY2'];
}
}
$mysqli->close();

?>
<marquee direction="right">
  <br><br><br><br>
  <img src="boy1.gif">
  <img src="bus-animation.gif">
</marquee>
</form>

</body>
</html>