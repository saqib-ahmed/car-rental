<?php
	include('login.php'); // Include Login Script

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>


<style>
.loginBox
{
	width:340px;
	height:380px;
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

label
{
	font-size:20px;
	color:#000;
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

body
{
	margin: 0;
	padding: 0;
	background-color:#FFF;
}

</style>
</head>

<body>
<title>Member Home</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Home Page</h3>
    <br><br><br>
	<form method="post" action="">
    <table style=""width:100%">
        
	<td>
	<input type="radio" name="radio1" value="rent"><label >Rent a car</label></input><br><br>
	<input type="radio" name="radio1" value="person"><label >Enter/View Personal Information</label></input></a><br><br>
	<input type="radio" name="radio1" value="rentinfo"><label >View Rental Information</label></input><br><br><br><br>
	<input type="submit" class="abc" name="submit" value="Next>>"/>
	</td>
    </table>
	</form>
	<?php
		if(isset($_POST['radio1']) && ($_POST['radio1']) == "rent")
			header("location: rent_a_car.php");
		else if(isset($_POST['radio1']) && ($_POST['radio1']) == "person")
			header("location: personal_information.php");
		else if(isset($_POST['radio1']) && ($_POST['radio1']) == "rentinfo")
			header("location: rental_info.php");
	?>
</div>
</div>
</body>
</html>
