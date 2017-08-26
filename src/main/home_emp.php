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
	height:420px;
	border:5px solid #000;
	border-radius:10px;	
	padding: 10px 40px 25px;
}
.loginBox h3
{
	background-color:#black;
	color:#000099;
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
<title>Employee Home</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Home Page</h3>
    <br><br><br>
	<form method="post" action="">
    <table style=""width:100%">
        
	<td><input type="radio" name="r1" value="1"><label >Add Cars</label></input><br><br>
	<input type="radio" name="r1" value="2"><label >Maintenance requests</label></input><br><br>
	<input type="radio" name="r1" value="3"><label >Rental Change Request</label></input><br><br>
	<input type="radio" name="r1" value="4"><label >Change Car Location</label></input><br><br>
	<input type="radio" name="r1" value="5"><label >View Reports</label></input>
	<select name="rep">
	<option value="lpr">Location Prefrence Report</option>
	<option value="fu">Frequent Users</option>
	<option value="mhr">Maintenance History Report</option>
	</select>
	<br><br><br><br>
	<input type="submit" class="abc" name="submit1" value="Next>>"/>
	</td>
    </table>
	</form>
	
	<?php
		if(isset($_REQUEST['submit1']))
		{
			if(isset($_POST['r1']) && ($_POST['r1']) == "1")
				header("location: man_cars.php");
			else if(isset($_POST['r1']) && ($_POST['r1']) == "2")
				header("location: main_req.php");
			else if(isset($_POST['r1']) && ($_POST['r1']) == "3")
				header("location: change_rental_info.php");
			else if(isset($_POST['r1']) && ($_POST['r1']) == "4")
				header("location: change_loc.php");
			else if(isset($_POST['r1']) && ($_POST['r1']) == "5")
			{
				if($_POST['rep']=='lpr')
					header("location: loc_pref.php");
				else if($_POST['rep']=='fu')
					header("location: freq_user.php");
				else if($_POST['rep']=='mhr')
					header("location: man_history.php");
			}
		}
	?>
</div>
</div>
</body>
</html>
