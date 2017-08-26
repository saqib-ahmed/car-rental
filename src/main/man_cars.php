<?php
	include('login.php'); // Include Login Script

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Add Cars</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>
<style>
.loginBox
{
	width:500px;
	height:1201px;
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
	color:#FFF;
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
input[type=text],input[type=password]
{
	width:350px;
	padding:10px;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:20px;
	margin-top:10px;
}
select
{
	width:370px;
	padding:10px;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:20px;
	margin-top:10px;
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

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Add a Car</h3>
    <br><br>
    <form method="post" action="">
        <label style="color:#000">Vehicle S. No.:</label><br>
        <input type="text" name="vsNo" /><br><br>
        <label style="color:#000">Car Model:</label><br>
        <input type="text" name="car_m" />  <br><br>
		<label style="color:#000">Car Type</label><br>
        <select name="ctype" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;"> 
		    <?php
				$q7="select distinct cType from car";
				$res=mysqli_query($db, $q7);
				if($res)
				{
					while($row=mysqli_fetch_assoc($res))
					{
						echo "<option value=\"". $row['cType']. "\">" . $row['cType']. "</option>";
					}
				}
			?>
		</select>
		
		<br>
		<label style="color:#000">Location:</label><br>
		<select name="loc" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;">    
		   <?php
				$q7="select loName from location";
				$res=mysqli_query($db, $q7);
				
				while($row=mysqli_fetch_assoc($res))
				{
					echo "<option value=\"". $row['loName']. "\">" . $row['loName']. "</option>";
				}
			?>

		</select>
		<br>
        <label style="color:#000">Color</label><br>
        <input type="text" name="color"  />  <br><br>
				<label style="color:#000">Hourly Rate</label><br>
        <input type="text" name="hourly_rate" />  <br><br>
				<label style="color:#000">Daily Rate</label><br>
        <input type="text" name="daily_rate"  />  <br><br>
				<label style="color:#000">Seating Capacity</label><br>
        <input type="text" name="seating_capacity"  />  <br><br>
				<label style="color:#000">Transmission Type</label><br>
       <select name="tt" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;"> 
			<option  value="Automatic">Automatic</option>
			<option  value="Manual">Manual</option>
		</select> <br><br>
				<label style="color:#000">Auxiliary Cable</label><br>
       <select name="ac" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;"> 
			<option  value="yes">Yes</option>
			<option  value="no">No</option>
		</select> <br><br>  <br><br>
		<br>
		<input type="submit" name="submit1" value="Add" /> 
 
		  
    </form>

  
<?php
		if(isset($_REQUEST['submit1']))
		{
			$sNo=$_POST['vsNo'];
			$auxCable=$_POST['ac'];
		
			$modelName=$_POST['car_m'];
			$cType=$_POST['ctype'];
			$color=$_POST['color'];
			$hourlyDate=$_POST['hourly_rate'];
			$dailyRate=$_POST['daily_rate'];
			$seatingCap=$_POST['seating_capacity'];
			$loName=$_POST['loc'];
			
			if($_POST['tt']== "Automatic")
				$transType="Auto";
			else
				$transType="Manual";
			
			if($_POST['ac']== "yes")
				$auxCable=1;
		     else
				$auxCable=0;
				$q1="insert into car(sNo,auxCable, modelName,cType,color,hourlyRate,dailyRate,seatingCap,transType,loName) 
				values('$sNo','$auxCable','$modelName','$cType','$color','$hourlyDate','$dailyRate','$seatingCap','$transType','$loName')"	;
				

				$q2="select modelName
					 from car 
					 where modelName='$modelName' and loName='$loName'";
				
				
			  
				$result1=mysqli_query($db,$q2);
				$row=mysqli_fetch_assoc($result1);
				
				if($row<1)
				{
					if(mysqli_query($db,$q1))
						echo "Database Updated";
					else
						echo "Yakki: ". mysqli_error($db);
				}	
				else
					echo "The car model already exists on specified location.";
		}
?> 

</div>
</div>
</body>
</html>