<?php
	include('login.php'); // Include Login Script

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Account</title>

<style>
body
{
	margin: 0;
	padding: 0;
	background-color:#FFF;
}

.loginBox
{
	width:650px;
	height:600px;
	border:5px solid #000;
	border-radius:100px;	
	padding: 10px 40px 25px;
}


.loginBox h3
{
	background-color:#black;
	color:#FF1;
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
</style>
</head>

<body>

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Create Account</h3>
    <br><br>
    <form method="post" action="">
        <label style="color:#000">Username:</label><br>
        <input type="text" name="username" placeholder="username" /><br><br>
        <label style="color:#000">Password:</label><br>
        <input type="password" name="password" placeholder="password" />  <br><br>
		<label style="color:#000">Confirm Password:</label><br>
        <input type="password" name="confirm_password" placeholder="password" />  <br><br>
		<label style="color:#000">Type of user:</label><br>
		<select name="stf" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;"> 
			<option  value="Student/Faculty">student/faculty</option>
			<option  value="Employee">employee</option>
		</select>
        
		<br>
		
		<input type="submit" name="submit1" value="Register" /> 
        
		  
    </form>
    
	<a href="index.php"><input type="submit" name="submit2" value="Cancel" /></a>
<?php
		if(isset($_REQUEST['submit1']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$c_password=$_POST['confirm_password'];
			if($_POST['stf']== "Student/Faculty")
				$utype=3;
			else
				$utype=2;
			
			
			if($password==$c_password && $password!=null)
			{
				$q1="insert into userr(username, pasword, uflag) values('$username','$password', '$utype')"	;
			    $q2="select username from userr where username='$username' ";
			    $result=mysqli_query($db,$q2);
			    $row=mysqli_fetch_assoc($result);
				
				if(mysqli_query($db, $q1))
				{
					echo "registered";
					header("location: index.php");
				}
		
				else if($row > 0)
				{	
					echo "User already Exists";
			    }
				else
					echo "Password fields do not match";
		}
		}
?>
</div>
</div>
</body>
</html>