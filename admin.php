<?php
include("out.php");
?>
<html>
<head>
	<title>ADMIN</title>
	<style >
.container {
  position: absolute;
  border-radius: 100px;
  right: 500px;
  margin: 300px;
  max-width: 400px;
  padding: 30px;
  background-color: white;
}
.dropdown{
  right: 10px;
  margin: 10px;
  max-width: 500px;
  width: 100px;
  height: 28px;
  padding: 0px;
  background-color: white;
}
.container1 {
  position: absolute;
  border-radius: 100px;
  right: 300px;
  margin: 190px;
  max-width: 400px;
  padding: 30px;
  background-color: white;
}
.container2 {
  position: absolute;
  border-radius: 100px;
  right: 10px;
  margin: 190px;
  max-width: 400px;
  padding: 30px;
  background-color: white;
}
.container3 {
  position: absolute;
  border-radius: 100px;
  right: -180px;
  margin: 190px;
  max-width: 400px;
  padding: 30px;
  background-color: darkslategrey;
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
  background-color: green;
  color: white;
  padding: 16px 10px;
  width: 100%;
}
#details{
    display: none;
  }
  #IDdetails{
    display: none;
  }

.button1 {
  position: absolute;
  margin: 300px;
  right: 0px;
  background-color: green;
  color: white;
  padding: 16px 10px;
  width: 5%;
}
ul {
  list-style-type: none;
  border-radius: 1500px;
  width: 500px;
  margin: -300px;
  margin-left: 350px;
  padding: 10px;
  overflow: hidden;
  background-color: darkslategrey;
}

li {
  float: right;
}

li a {
  font-size: 30px; 
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}


	</style>
</head>

<body style= "background-color: darkslategrey">

    <canvas id="canvas" width="300" height="300"
style="background-color:darkslategrey">
</canvas>

<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}  
    
        function showFrame(){
          document.getElementById("details").style.display = "block";
          document.getElementById("IDdetails").style.display = "none";
          document.getElementById("checkIDdetails").style.display = "none";
        }
        function showFrame2(){
          document.getElementById("IDdetails").style.display = "block";
          document.getElementById("details").style.display = "none";
          document.getElementById("checkIDdetails").style.display = "none";
        }
        function showFrame3(){
          document.getElementById("checkIDdetails").style.display = "block";
          document.getElementById("details").style.display = "none";
          document.getElementById("IDdetails").style.display = "none";
        }

</script>
 <ul>
  <li><a class="active" href="video.php">Home</a></li>
  <li><a href="admin_dup.html">ADMIN</a></li>
  <li><a href="faculty.html">Faculty</a></li>
  <li><a href="student.html">Student</a></li>
</ul>
<form action="admin1.php" method="post" class="container">
	
  <button onclick="showFrame()" class="button">DETAILS</button>
   <div id="details">

  <h1>Enter The Details</h1><br>
  <label for="register number"><b>Register Num</b></label>
  <input type="text" placeholder="Enter Register Num" name="reg_no" required><br>
  <label for="year"><b>Year</b></label>
  <div>
  <select name="year" class="dropdown">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
  </div>
  <label for="section"><b>Section</b></label>
  <div>
  <select name="section" class="dropdown">
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option>
  </select>
  </div>
  <label for="idcard"><b>ID CARD status</b></label><br>
  <input type="radio" name="idcard" value="YES">YES<br><br>
  <input type="radio" name="idcard" value="NO">NO<br><br>
  <input type="submit" class="button" value="Submit">

  </form>
  
</div><br><br><br><br><br><br>

		
<form method="post" action="iddetails.php" class="container1">
	<button onclick="showFrame2()" class="button">ID details</button>
<div id="IDdetails">
  <h1>ID Card Details</h1><br>
  <label for="register number"><b>Register Num</b></label><br>
  <input type="text" placeholder="Enter Register Num" name="regno" required><br>
  <button type="submit" class="button">Submit</button>
</div>
</form>

<form action="idcard.php" method="post" class="container2">
  <button onclick="showFrame3()" class="button">Check Identity</button>
<div id="checkIDdetails">
  <h1>Know Identity</h1><br>
  <label for="register number"><b>Register Num</b></label><br>
  <input type="text" placeholder="Enter Register Num" name="rollno" required><br>
  <button type="submit" class="button">Submit</button>
</div>
</form>
<form class="container3">
<a href="logout.php" class="button">LOGOUT</a>
</form>
</body>
</html>
