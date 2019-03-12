<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
::placeholder {
  color: white;
}
  body{
  	background-color: black;
    background-image: url("lock.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  }
.login-box{
  width: 280px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  box-shadow: 10px 10px 5px #000000;
}
.login-box h1{
  float: left;
  font-size: 40px;
  border-bottom: 6px solid green;
  margin-bottom: 50px;
  padding: 13px 0;
}
.textbox{
  width: 100%;
  overflow: hidden;
  font-size: 0;
  color: white;
  padding: 8px 0;
  margin: 8px 0;
  border-bottom: 1px solid white;
}
.textbox input{
  border: none;
  outline: none;
  background: none;
  font-size: 18px;
  color: white;
  width: 80%;
  float: left;
  margin: 0 10px;
}
.button {
  width: 100%;
  background: none;
  padding: 10px 10px;
 }
 ul {
  list-style-type: none;
  border-radius: 50px;
  margin: 80px;
  padding: 10px;
  overflow: hidden;
  background-color: none;
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
  background-color: darkslategrey;
}
h1{
  color: white;
  font-style: italic;
}
label{
  color: white;
  font-style: italic;
}
img{
  width:40px;
  height: 40px;
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  top:-30px;
  z-index: 2;
 
}
img:hover{
  background-color:powderblue;
}

  </style>
</head>

<body>
  <ul>
  <li><font size="6px"><a class="active" href="video.php">Home</a></font></li>
  <li><font size="6px"><a href="admin_dup.php">ADMIN</a></font></li>
  <li><font size="6px"><a href="faculty.html">Faculty</a></font></li>
  <li><font size="6px"><a href="student.html">Student</a></font></li>
</ul>
<form method="post" action="newpass.php">
<div class="login-box">
<h1>Login</h1>
<div class="textbox">
  <input type="email" placeholder="email" name="email" required>
</div>
  <div class="textbox">
    
  <input id="pass" type="password" placeholder="password" name="password" required>
</div>
<span><img src="eyeicon.png" onmouseover="mouseoverPass();" onmouseout="mouseoutPass();"></span>
  <button type="submit" class="button"><font size="4" color="white">Sign In</font></button>
</div>
</form>
<script> 
  function mouseoverPass(obj)
  {
    var obj=document.getElementById('pass');
    obj.type="text";

  }
  function mouseoutPass(obj)
  {
    var obj=document.getElementById('pass');
    obj.type="password";
    
  }
</script>
</body>
</html>