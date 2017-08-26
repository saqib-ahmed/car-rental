<?php
	include('login.php'); // Include Login Script

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Maintenance Request</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>
<style>
.loginBox
{
	width:500px;
	height:650px;
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
	height:100px;
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
	text-align:center;
}
body
{
	margin: 0;
	padding: 0;
	background-color:#FFF;
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
        xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
                document.getElementById("cars").innerHTML = xmlhttp.responseText;
			}
        }
        xmlhttp.open("POST","autocom_req.php?x="+str1,true);
        xmlhttp.send();
    }
}
</script>

</head>

<body>

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Maintenance Request</h3>
	<br>
	<div align="right">
	<?php
	date_default_timezone_set('Asia/Karachi');
	echo date('D, d M Y h:i:s A')
	?>
	</div>
    <br><br>
    <form method="post" action="">
     	<label style="color:#000">Choose location :</label><br>
		<select name="loc" id="loc" onchange="autoPopul()" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;">    
		   <?php
				$q7="select loName from location";
				$res=mysqli_query($db, $q7);
				echo "<option value=''>--Select Preferred Location---</option>";
				while($row=mysqli_fetch_assoc($res))
				{
					echo "<option value=\"". $row['loName']. "\">" . $row['loName']. "</option>";
				}
			?>

		</select>
       <br><br>
        <label style="color:#000">Choose car:</label><br>
                  
	    <div id="cars">
		
		</div>
				   <br><br> 
		<label style="color:#000">Brief description: </label><br>
          <textarea name="prob" rows="5" cols="50" />  </textarea><br><br>
		
		<input type="submit" name="submit1" value="Submit Request" /> 
 
		  
    </form>

  
<?php
		if(isset($_REQUEST['submit1']))
		{
			$location=$_POST['loc'];
			$modelName=$_POST['modelName'];
			$prob=$_POST['prob'];
			$user=$_SESSION['username'];
			$date_time=date('Y-m-d h:i:s');
			
			$q3= "select sNo
				 from car
				 where modelName='$modelName'";
		    $result=mysqli_query($db, $q3);
			$row= mysqli_fetch_assoc($result);
			$sNo= $row['sNo'];
			
				$q1="insert into man_req(username,date_time, sNo)
				values('$user','$date_time', '$sNo')";
				$q2="insert into prob(sNo,date_time, problem) values('$sNo','$date_time','$prob')";
	
				
			 echo  $date_time;
				
				if(mysqli_query($db, $q1))
					echo "registered q1" . "   ";
				else
					echo mysqli_error($db);
		        if(mysqli_query($db, $q2))
					echo "registered q2";
				else
					echo mysqli_error($db);
		
		}
?> 

</div>
</div>
</body>
</html>