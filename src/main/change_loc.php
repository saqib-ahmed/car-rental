<?php
	include('login.php'); // Include Login Script

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change car Location</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>
<style>
.loginBox
{
	width:500px;
	height:700px;
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
td{
	text-align:center;
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
        xmlhttp.open("POST","autocom_cloc1.php?x="+str1,true);
        xmlhttp.send();
    }
}


</script>
</head>

<body>
<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Change Location</h3>
    <br><br>
    <form method="post" action="">
      <label style="color:#000">Current Location:</label><br>
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
      <label style="color:#000">Choose a Car:</label><br>
	  	<div >
		<select id="cars" name='cars' onchange="autoPopul2()">
		
		</select>
		</div>
		
<script>
function autoPopul2() {
	var str=document.getElementById("loc").value;
    if (str == "") 
	{
        document.getElementById("desc").innerHTML = "";
        return;
    } 
	else 
	{ 
        var str1=document.getElementById("loc").value;
		var str2=document.getElementById("cars").value;
        xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
                document.getElementById("desc").innerHTML = xmlhttp.responseText;
			}
        }
        xmlhttp.open("POST","autocom_cloc.php?x="+str1+"&y="+str2,true);
        xmlhttp.send();
    }
}


</script>
	  <br>
		
		<label> Brief Description:</label><br><br>
		
		<div id="desc">
			
		</div>
		
		<br><br>
		<label style="color:#000">New Location:</label><br>
		<select name="locc" style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:20px; padding: 10px 80px 10px;">    
		   <?php
				$q7="select loName from location";
				$res=mysqli_query($db, $q7);
				
				while($row=mysqli_fetch_assoc($res))
				{
					echo "<option value=\"". $row['loName']. "\">" . $row['loName']. "</option>";
				}
			?>

		</select>
	
		<input type="submit" name="submit1" value="Submit Changes" /> 
 
		  
    </form>

  
<?php
		if(isset($_REQUEST['submit1']))
		{
			$loNamenew=$_POST['locc'];
			$loName= $_POST['loc'];
			$modelName=$_POST['cars'];
			
			$q9="update car
				 set loName='$loNamenew'
				 where loName='$loName' and modelName='$modelName'";
				 
				 
			$q2="select modelName
					 from car 
					 where modelName='$modelName' and loName='$loNamenew'";
					 
				$result1=mysqli_query($db,$q2);
				$row=mysqli_fetch_assoc($result1);
				
				if($row<1)
				{
					if(mysqli_query($db,$q9))
						echo "Updated Successfully";
					else
						echo "Yakki: ". mysqli_error($db);
				}	
				else
					echo $modelName. " already exists on ". $loNamenew;
			
			
		
		}
?> 

</div>
</div>
</body>
</html>