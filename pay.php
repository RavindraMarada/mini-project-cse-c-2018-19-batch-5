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
  $reg = $_POST['regno'];
  $amount = $_POST['amount'];
  $res1 = mysqli_query($mysqli, "SELECT REG_NO, DATEs, TIME2, BRANCH FROM ADMIN WHERE REG_NO = '$reg'");
$count = mysqli_num_rows($res1);
$fine = ($count - 2)*10;
$prev1 = "SELECT Amount FROM IDdetails WHERE REGISTERNUM='$reg'";
$num = mysqli_query($mysqli, $prev1);
if(mysqli_num_rows($num) > 0) {
  while ($row = mysqli_fetch_array($num, MYSQLI_ASSOC)) {
    $prev = $row['Amount'];
  }
}
$present = $prev + $amount;
  mysqli_query($mysqli, "UPDATE IDdetails SET IDSTATUS='NO', Amount = '$present' WHERE REGISTERNUM = '$reg'") or die('pooya mosam');
$res = mysqli_query($mysqli, "SELECT register_num FROM fines WHERE register_num = '$reg'");
$balance = $fine - $present;
if(mysqli_num_rows($res)>0){
  while ($row1 = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
      mysqli_query($mysqli, "UPDATE fines SET fine_allocated = '$fine', fine_paid = '$present', fine_to_be_paid = '$balance' WHERE register_num = '$reg'");
  }
}

header("refresh:0.5; url=payment.php");
$mysqli->close();
?>