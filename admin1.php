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
$id = $_POST['idcard'];
$year = $_POST['year'];
$sec = $_POST['section'];
$reg_no = $_POST['reg_no'];
$curdate = date('Y-m-d');
date_default_timezone_set('Asia/Kolkata');
$curtime = date("H:i");
$curday = date("D");
$branch1 = $reg_no % pow(10,5);
$branch = floor($branch1 / pow(10,3));
echo $id;
switch ($branch) {
  case 10:
    $dept = 'CSE';
    break;
    case 20:
    $dept = 'MECH';
    break;
    case 02:
    $dept = 'CHEM';
    break;
  
}
if ($branch == 11) {
  $dept = 'IT';
}
if ($branch == 12) {
  $dept = 'ECE'; 
}
if ($branch == 14) {
  $dept = 'EEE';
}
switch ($branch) {
  case 20:
  $dept = 'MECH';
    break;
  
}

mysqli_query($mysqli,"INSERT INTO admin(REG_NO, DATEs, TIME2, BRANCH, STU_YEAR, IDSTATUS, SECTION) VALUES ( '$reg_no','$curdate','$curtime','$dept','$year','$id', '$sec')") or die("chachipora");

if($id == "YES"){
	$sql2 = "SELECT REGISTERNUM FROM IDdetails WHERE REGISTERNUM = '$reg_no'";
  $num = mysqli_query($mysqli, $sql2) or die('pooindi');
  if(mysqli_num_rows($num) > 0) {
       mysqli_query($mysqli, "UPDATE IDdetails SET IDSTATUS='$id' WHERE REGISTERNUM='$reg_no'");
  }
  else{
    
    mysqli_query($mysqli, "INSERT INTO IDdetails(REGISTERNUM, IDSTATUS) VALUES ('$reg_no', '$id')") or die('ikkada pooindi');
  }

}
$res = mysqli_query($mysqli, "SELECT REG_NO, DATEs, TIME2, BRANCH FROM ADMIN WHERE REG_NO = $reg_no");
$count = mysqli_num_rows($res);
$fine = ($count - 2)*10;
echo $fine;

$second = mysqli_query($mysqli, "SELECT REGISTERNUM, IDSTATUS, Amount FROM IDdetails WHERE REGISTERNUM = '$reg_no'");
if(mysqli_num_rows($second)>0){
  while($row = mysqli_fetch_array($second, MYSQLI_ASSOC)){
    $paid = $row['Amount'];
  }
}
echo $paid;
$balance = $fine - $paid;
echo $balance;
$new = mysqli_query($mysqli, "SELECT register_num FROM fines WHERE register_num = '$reg_no'");
if(mysqli_num_rows($new)>0){
  mysqli_query($mysqli, "UPDATE fines SET fine_allocated = '$fine', fine_paid = '$paid',fine_to_be_paid = '$balance' WHERE register_num = '$reg_no'") or die('booooom');
}
else{
  mysqli_query($mysqli, "INSERT INTO fines(register_num, fine_allocated, fine_paid, fine_to_be_paid) VALUES ('$reg_no', '$fine', '$paid', '$balance')") or die('chachanu ra');
}
  echo 'Connected successfully.';
header("refresh:0.5; url=admin.php");

  $mysqli->close();
?>