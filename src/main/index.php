<?php
	include('login.php'); // Include Login Script
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>

<style>
body
{
	margin: 0;
	padding: 0;
	background-color:#FFF;
}

.loginBox
{
	width:300px;
	height:500px;
	border:5px solid #000;
	border-radius:100px;	
	padding: 10px 40px 25px;
}
.loginBox h3
{
	background-color:#black;
	color:#00F;
	text-align:center;
	padding:20px;
	border-radius: 10px 10px 0 0;
	margin: -10px -40px;
	border-bottom:1px solid #999;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:24px;
	font-weight:bold;
}
input[type=text],input[type=password]
{
	width:280px;
	padding:10px;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:20px;
	margin-top:10px;
}
label
{
	font-size:20px;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
}
input[type=submit]
{
	background-color: #0b3b0b;
	width:300px;
	border:0;
	padding:10px;
	color:#FFF;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:20px;
	border-radius:5px;
	margin-top:40px;
	font-weight:bold;
}
.error
{
	color:red;
	margin-top:10px;
	font-size:18px;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
}

</style>
</head>

<body>

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Login Form</h3>
    <br><br>
    <form method="post" action="">
        <label style="color:#red">Username:</label><br>
        <input type="text" name="username" placeholder="username" /><br><br>
        <label style="color:#000">Password:</label><br>
        <input type="password" name="password" placeholder="password" />  <br><br>
        <input type="submit" name="submit" value="Login" /> 
    </form>
	<a href="create_account.php"><input type="submit" name="submit" value="Create Account" /></a>
	
    <div class="error"><?php echo $error;?></div>
</div>
</div>
</body>
</html>