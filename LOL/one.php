<?php
session_start();

$db=mysqli_connect("localhost", "root", "", "authentication");

if(isset($_POST['register_btn']))
{   session_start();
   $username=mysql_real_escape_string($_POST['username']);
  $email=mysql_real_escape_string($_POST['email']);
  $password_1=mysql_real_escape_string($_POST['password']);
  $password_2=mysql_real_escape_string($_POST['password']);
	
	if($password_1==$password_2)
	{ $password_1=md5($password_1);
     $sql="INSERT INTO users(username, email, password_1) VALUE('$username', '$email', '$password_1')";
	 mysqli_query($db, $sql);
		$_SESSION['message']="You are logged in";
        $_SESSION['username']=$username;		
		header("location: linked.php");
	}
    else
    {
     $_SESSION['message']="The two passwords didn't match";
    }
}	
	
?>


<html>
<head>
<title>
Login page
</title>
<head>
<body>
<div class="header">
<center>
<h1>LOGIN PAGE</h1>
</div>
<br/>
<form method="post" action="one.php">
<table>
  <tr>
    <td>Username:</td>
	<td><input type="text" name="username" ></td>
  </tr>
  <tr>
    <td>Email:</td>
	<td><input type="email" name="email" ></td>
  </tr>
  <tr>
    <td>Password:</td>
	<td><input type="password" name="password" ></td>
  </tr>
  <tr>
  <tr>
    <td>Password(again):</td>
	<td><input type="password" name="password" ></td>
  </tr>
    <td></td>
	<td><input type="submit" name="register_btn" value="Register" ></td>
  </tr>
  
</center>
</body>
</html>