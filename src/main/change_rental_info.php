<?php
	include('login.php'); // Include Login Script

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Change Rental Info</title>
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

</style>
<script>
function autoPopul(str) {
	var str=document.getElementById("uName").value;
    if (str == "") 
	{
        document.getElementById("rent").innerHTML = "";
        return;
    } 
	else 
	{ 
        var str1=document.getElementById("uName").value;
        xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() 
		{
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
                document.getElementById("rent").innerHTML = xmlhttp.responseText;
			}
        }
        xmlhttp.open("POST","autocom_crent.php?x="+str1,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>

<div align="center">
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div class="loginBox">
    <h3>Rental Request Change</h3>
    <br><br>
    <form method="post" action="">
        <label style="color:#000">Enter Username.:</label><br>
        <input type="text" name="uName" id="uName" onchange="autoPopul(this.value)"/><br><br>
         <br><br>
		 
		 <div id="rent">
		 
		 </div>
		 
		<input type="submit" name="submit1" value="Update" /> 
 
		  
    </form>

  
<?php
		if(isset($_REQUEST['submit1']))
		{
			$retdate_new=$_POST['retdatenew'];
			$retdate = $_POST['retdateold'];
			$username= $_POST['uName'];
			$sno=$_POST['sno'];
			
				$q1="update reservation
				set retDateTime='$retdate_new'
			    where username='$username' and retDateTime='$retdate'"	;
			
				$q2="select *
				     from reservation join car on car.sNo=reservation.sNo
					 where pickDateTime<'$retdate_new' and reservation.sNo='$sno'";
				
			    $result=mysqli_query($db,$q2);
				$row=mysqli_fetch_assoc($result);
				
				if($row>0)
				{
					$q4="select username, pickDateTime, retDateTime, email, phone
						 from userr natural join (reservation join car on car.sNo=reservation.sNo)
						 where pickDateTime>'$retdate' and pickDateTime<'$retdate_new' and reservation.sNo='$sno'";
					
					$result=mysqli_query($db, $q4);
					$row=mysqli_fetch_assoc($result);
					$username=$row['username'];
					$pick=$row['pickDateTime'];
					$ret=$row['retDateTime'];
					$email=$row['email'];
					$phone=$row['phone'];
					
					echo "<form method='post' action=''>";
					echo "<br><br><label style='border-top:1px solid; border-bottom:1px solid'>User Affected</label><br><br>";
					echo	"<label>Username</label><br>";
					echo    "<input type='text' name='user' value='$username'/><br><br>";
					echo	"<label>Vehicle S.No.</label><br>";
					echo    "<input type='text' name='sno1' value='$sno'/><br><br>";
					echo "<label>Original Pick up Time:</label><br>
						 <input type='text' name='pick' value='$pick'/><br><br>";
					echo	"<label>Original return Time:</label><br>
						<input type='text' name='ret' value='$ret' />  <br><br>";
					echo	"<label>Email Address:</label><br>
						<input type='text' name='email' value= '$email' />  <br><br>";
					echo	"<label>Phone No.</label><br>
						<input type='text' name='phone' value= '$phone'/>  <br><br>";
					echo "<input type='submit' name='submit2' value='Cancel Reservation'/>";
					echo "<input type='submit' name='submit3' value='Show car Availability'/>";
					
					echo "</form>";
					
				}
				else
				{
					$result=mysqli_query($db,$q1);
					echo "Updated Successfully";
				}
		
		}
?> 

<?php

	if(isset($_REQUEST['submit2']))
	{
		$username=$_POST['user'];
		$pick=$_POST['pick'];
		$sno=$_POST['sno1'];
		
		$q= "delete
			from reservation
			where username='$username' and '$pick'>current_timestamp() and sNo='$sno'";
		
		$res=mysqli_query($db, $q);
		if($res)
			echo "Deleted Successfully";
		else
			echo mysqli_error($db);
	}
	else if(isset($_REQUEST['submit3']))
	{
		
	}

?>

</div>
</div>
</body>
</html>