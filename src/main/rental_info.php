<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rental Information</title>
<div style="text-align:right; margin-right:30px">
<?php 
include('login.php');
echo "Current User: ". $_SESSION['username']. " ";
?>
</div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>
<style>
.loginBox
{
	width:1000px;
	height:1200px;
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
input[type=text],input[type=password]
{
	width:350px;
	padding:10px;
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:20px;
	margin-top:10px;
}
td
{
	text-align:center;
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
    <h3>Current Reservation</h3>
    <br><br>
    <form method="post" action="">
	<?php
	
	$cur_user= $_SESSION['username'];
	$q5="select date(pickDateTime) as datee, time(pickDateTime) as ptime,retDateTime as rtd, pickDateTime as ptd, time(retDateTime) as rtime, modelName, c.loName as loc, estcost
		 from car as c join reservation as r on c.sNo=r.sNo
		 where retDateTime>current_timestamp() and username='$cur_user'";
		 
	$result=mysqli_query($db, $q5);
	echo "<table border=2 align=center style='font-size:20px' >
			<tr>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Date</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Reservation Time</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Car</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Location</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Amount</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Extend?</td>
			</tr>
			";
	$x=1;	
	while($row=mysqli_fetch_assoc($result))
	{	
		$rtd=$row['rtd'];
		$ptd=$row['ptd'];
		$rtime=$row['rtime'];
		$ptime=$row['ptime'];
		$mname=$row['modelName'];
		$lname=$row['loc'];
		echo  "<tr>" . "<td>" . $row['datee'] . "</td>"; 
		echo  "<td>". $row['ptime'] . " - ". $row['rtime'] .  "</td>"; 
		echo  "<td>". $row['modelName']. "</td>"; 
		echo  "<td>". $row['loc'] . "</td>" ;
		echo  "<td>". "\$". $row['estcost'] . "</td>";
		echo   "<td><input type='radio' name='rr' value='$x'/></td></tr>";
		$x++;
	}
	echo "</table>";

	?>
		 <br>
		 <table >
			<tr><label>Choose Return Time:</label><br>
			<input type="text" name="datee" placeholder="Format:YYYY-MM-DD HH:mm:ss"/></tr>
		</table>
		
		<input type="submit" name="submit1" value="Update" /> 
 
		  
    </form>
	  <h3 style="border-top:1px solid #999">Previous Reservation</h3>
	  
	<?php
	
	$cur_user= $_SESSION['username'];
	$q5="select date(pickDateTime) as datee, time(pickDateTime) as ptime, time(retDateTime) as rtime, modelName, c.loName as loc, estcost, lateBy
		 from car as c join reservation as r on c.sNo=r.sNo
		 where retDateTime<current_timestamp() and username='$cur_user'";
		 
	$result=mysqli_query($db, $q5);
	echo "<br><br><table border=2 align=center style='font-size:20px' >
			<tr>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Date</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Reservation Time</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Car</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Location</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Amount</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Return Status</td>
			</tr>
			";

	while($row = mysqli_fetch_assoc($result))
	{	
		echo  "<tr>" . "<td>" . $row['datee'] . "</td>"; 
		echo  "<td>". $row['ptime'] . " - ". $row['rtime'] .  "</td>"; 
		echo  "<td>". $row['modelName']. "</td>"; 
		echo  "<td>". $row['loc'] . "</td>" ;
		echo  "<td>". "\$". $row['estcost'] . "</td>";
		if($row['lateBy']==null)
			echo  "<td>On time</td>";
		else
			echo "<td>Late by:". $row['lateBy']. "</td>";
	
	}
	echo "</table>";
	?>
  

  
  
<?php
		if(isset($_REQUEST['submit1']))
		{
			$ret_date=$_POST['datee'];
			$username=$_SESSION['username'];
			$q1="update reservation
				 set retDateTime='$ret_date'
				 where username='$username' and '$ptd'=pickDateTime and '$rtd'=retDateTime"	;
		
			$q2="select *
				 from car as c join reservation as r on c.sNo=r.sNo
				 where '$ret_date'>pickDateTime and pickDateTime>current_timestamp() and r.sNo in (select sNo
																								  from car
																								  where '$mname'=modelName and '$lname'=loName
																								  )";
			    
			$result=mysqli_query($db, $q2);
			$row=mysqli_fetch_assoc($result);
				if($row<1)
				{	
					$result=mysqli_query($db,$q1);
					if($result)
						echo "Updated Successfully";
					else
						echo mysqli_error($db);
				}
				else
					echo "Time cannot be Extended";

				
		
		}
?> 

</div>
</div>
</body>
</html>