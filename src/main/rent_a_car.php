<?php
	include('login.php'); // Include Login Script


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Rent a Car</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>

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
	height:400px;
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


<script>
function autoPopul() {
	var str=document.getElementById("loc").value;
    if (str == "") 
	{
        document.getElementById("cars").innerHTML = "";
        return;
    } 
	else 
	{ 
        var str1=document.getElementById("loc").value;
		var str2=document.getElementById("choose").value;
        xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
                document.getElementById("cars").innerHTML = xmlhttp.responseText;
			}
        }
        xmlhttp.open("POST","autocom_rent.php?x="+str1+"&y="+str2,true);
        xmlhttp.send();
    }
}
</script>

</head>

<body>

<div align="center">




<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px; color:#000099;"><br>

<div class="loginBox">
    <h3>Rent a Car</h3>  
	<br><br>
   <form method="post" action="">
   <table>
    
			<tr><td><label>Choose Pick Up Time:</label><td>
			<td><input type="text" name="datee" placeholder="Format:YYYY-MM-DD HH:mm:ss"/></td></tr>
			<tr><td><label>Choose Return Time:</label><td>
			<td><input type="text" name="datee" placeholder="Format:YYYY-MM-DD HH:mm:ss"/></td></tr>
		</table>
		<table>
		        <tr>
		<td><label >Location:</label></td>
        <td>
		<select name="loc"  id="loc" onchange="autoPopul()" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:18px;">    
		   <?php
				$q7="select loName from location";
				$res=mysqli_query($db, $q7);
				$x=0;
				echo "<option value=''>--Select Preferred Location---</option>";
				while($row=mysqli_fetch_assoc($res))
				{
					echo "<option value=\"". $row['loName']. "\">" . $row['loName']. "</option>";
				}
			?>

		</select>
		
		</td>
		<td width='22%'></td>
		</tr>
		
		<tr>
		<td><label >Cars:</label></td>
        <td>
		<select name="choose" id="choose" onchange="autoPopul()" style="font-size:15px; padding:2px">
			<option value="cbType">Choose by type</option>
			<option value="cbModel">Choose By model</option>
		</select>
		</td>
		<td>
		<div id="cars">
		
		</div>
		</td>
		</tr>
	</td>	
    </table>
    
	<input type="submit" name="submit1" value="Search" />
  
    
    </form>

</div>
</div>
	<?php
	    if(isset($_REQUEST['submit1']))
		{
			$location=$_POST['loc'];

		$q5="select distinct modelName, cType, loName,
			(select hourlyRate
			from driving_plan
			where pType='od') as hRate_occasional,
		    (select hourlyRate*(1-discount/100)
			from driving_plan
			where pType='fd') as hRate_frequent,
			(select hourlyRate*(1-discount/100)
			from driving_plan
			where pType='dd') as hRate_daily,
			color, dailyRate, seatingCap, transType, auxCable, 
			CASE 
				when(pickDateTime>current_timestamp() and datediff(pickDateTime, current_date())<1) 
				then time(pickDateTime) 
				else NULL
				END as availableTill,
			estCost
			from (car natural join reservation), driving_plan
			where (pickDateTime>current_date() and datediff(pickDateTime, current_date())) or retDateTime<current_date() or pickDateTime is null
			group by modelName";
		
		
		$result=mysqli_query($db, $q5);
		
		echo "<form method='post' action=''>";
		echo "<style> 
			td{
				text-align:center;
			}
			</style>";
		echo "<h3 align=center style='color:#000099; margin-top:50px; font-size:35px'>Renenue Generated Report</h3>";
		echo "<table border=2 align=center style='margin-top:100px; font-size:25px' >
			<tr>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Model</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Type</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Location</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Color</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Hourly Rate (Occasional Driving Plan)</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>discounted Rate (Frequent Driving Plan)</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>discounted Rate (daily Driving Plan)</th>
		    <th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Daily Rate</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Seating Capacity</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Transmission Type</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Auxiliary Cable</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Available Till</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Estimated Cost</th>
			<th width='10%' bgcolor=#0b3b0b style='color:#FFF; padding:15px'>Choose</th>
			</tr>
			";
		$x=1;		
		while($row = mysqli_fetch_assoc($result))
		{	
			echo  "<tr>" . "<td>" . $row['modelName'] . "</td>"; 
			echo  "<td>". $row['cType']. "</td>"; 
			echo  "<td>". $row['loName']. "</td>"; 
			echo  "<td>".  $row['color']. "</td>";
			echo  "<td>". "\$". $row['hRate_occasional']. "</td>";
			echo  "<td>". "\$". $row['hRate_frequent']. "</td>";
			echo  "<td>". "\$". $row['hRate_daily']. "</td>";
			echo  "<td>". "\$". $row['dailyRate']. "</td>";
			echo  "<td>".  $row['seatingCap']. "</td>";
			echo  "<td>".  $row['transType']. "</td>";
			echo  "<td>".  $row['auxCable']. "</td>";
			if($row['availableTill']!=null)
				echo  "<td>".  $row['availableTill']. "</td>";
			else 
				echo  "<td> -NA- </td>";
			echo  "<td>". "\$". $row['estCost']. "</td>";
			echo   "<td><input type='radio' name='rr' value='$x'/></td></tr>";
			$x++;
		}
		echo "</table>";
		echo '<div align="right"><input type="submit" name="submit2" value="Reserve" /></div>';
		echo "</form>";	
		}
	?>

	

    


</body>
</html>