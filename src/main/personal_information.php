<?php
	include('login.php'); // Include Login Script
	$username=$_SESSION['username'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Personal Information</title>
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
	height:600px;
	border:5px solid #000;
	border-radius:10px;	
	padding: 10px 40px 25px;
}

.loginBox p
{
	background-color:#white;
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
</head>

<body>

<div align="center">




<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px; color:#000066;">Personal Information<br></br></h1>

<div class="loginBox">
    <h3>General Information</h3>  <br><br>
	<form method="post" action="">
    <br><br>
    <table>
        <tr>
		<td><label style="color:#000">First Name:</label></td>
        <td><input type="text" name="First_Name" value="
		<?php 
		$result=mysqli_query($db, "select firstName from userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['firstName'];
		?>"/></td>
		</tr>
		
		        <tr>
		<td><label style="color:#000">Middle Initial:</label></td>
        <td><input type="text" name="middle_Initial" value="
		<?php $result=mysqli_query($db, "select midInit from userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['midInit'];
		?>"/></td>
		</tr>
		        <tr>
		<td><label style="color:#000">Last Name:</label></td>
        <td><input type="text" name="Last_Name" value="
		<?php $result=mysqli_query($db, "select lastName from userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['lastName'];
		?>" /></td>
		</tr>
		        <tr>
		<td><label style="color:#000">Phone Number:</label></td>
        <td><input type="text" name="Phone_Number" value="
		<?php $result=mysqli_query($db, "select phone from userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['phone'];
		?>" /></td>
		</tr>
		        <tr>
		<td><label style="color:#000">Email address:</label></td>
        <td><input type="text" name="Email_address"  value="
		<?php $result=mysqli_query($db, "select email from userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['email'];
		?>"/></td>
		</tr>
				<tr>
		<td><label style="color:#000">Address:</label></td>
        <td><input type="text" name="Address" value="
		<?php $result=mysqli_query($db, "select address from userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['address'];
		?>" /></td>
		</tr>

	</td>
		
		  
    </table>
    
</div>
<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div style=
"
	width:650px;
	height:230px;
	border:5px solid #000;
	border-radius:10px;	
	padding: 10px 40px 25px;
"
>
        <h3 style=
	"background-color:#black;
	color:#FF1;
	text-align:center;
	padding:20px;
	border-radius: 10px 10px 0 0;
	margin: -10px -40px;
	border-bottom:1px solid #999;
	font-size:24px;
	font-weight:bold;"
	>Membership Information</h3>  <br><br>
	
    <br>
	<div style="text-align:right;  font-size:20px;"><a href="drivingPlan.php" style="color:#000066;">View Plan Details</a></div>

	<div style="font-size:25px;">Choose a plan</div>
    <br><br>
	<table >
       <td bgcolor=#0b3b0b>
	   
        <input type="radio" name="driving"  value="a">
		 <label style="color:#000">Ocasional Driving</label></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
     <td bgcolor=#0b3b0b>
        <input type="radio" name="driving" value="b" />  
		   <label style="color:#000">Frequent Driving</label></input>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td bgcolor=#0b3b0b>
        <input type="radio" name="driving" value="c" />  
			<label style="color:#000">Daily Driving</label></input>
        
		</td>
	
	</table>	  
    
    
</div>


<h1 style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif; font-size:32px;"><br></br></h1>
<div style=
"
	width:650px;
	height:500px;
	border:5px solid #000;
	border-radius:10px;	
	padding: 10px 40px 25px;
"
>
    <h3 style=
	"background-color:#black;
	color:#FF1;
	text-align:center;
	padding:20px;
	border-radius: 10px 10px 0 0;
	margin: -10px -40px;
	border-bottom:1px solid #999;
	font-size:24px;
	font-weight:bold;"
	>Payment Information</h3>  <br><br>
	
    <br><br>
	<table>
        <tr>
		<td><label style="color:#000">Name on the card:</label></td>
        <td><input type="text" name="notc"  value="
		<?php $result=mysqli_query($db, "select NameOnCard from credit_card natural join userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['NameOnCard'];
		?>"/></td>
		</tr>
		
		        <tr>
		<td> <label style="color:#000">Card Number:</label></td>
        <td><input type="text" name="card_number" value="
		<?php $result=mysqli_query($db, "select cardNo from credit_card natural join userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['cardNo'];
		?>"/></td>
		</tr>
		        <tr>
		<td><label style="color:#000">CVV:</label></td>
        <td><input type="text" name="CVV" value="
		<?php $result=mysqli_query($db, "select CVV from credit_card natural join userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['CVV'];
		?>" /></td>
		</tr>
		        <tr>
		<td><label style="color:#000">Expiry Date:</label></td>
        <td><input type="text" name="expiry_date"  value="
		<?php $result=mysqli_query($db, "select expiryDate from credit_card natural join userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['expiryDate'];
		?>"/></td>
		</tr>
		        <tr>
		<td><label style="color:#000">Billing Address:</label></td>
        <td><input type="text" name="billing_address" value="
		<?php $result=mysqli_query($db, "select billingAddress from credit_card natural join userr where username='$username'");
		$row=mysqli_fetch_assoc($result);
		echo $row['billingAddress'];
		?>" /></td>
		</tr>
		<td></td>
		</table>	
		<input type="submit" name="submit1" value="Done" />
	
	 
	</form>
	<?php
	    if(isset($_REQUEST['submit1']))
		{
			$Email_address=$_POST['Email_address'];
			$Address=$_POST['Address'];
			$First_Name=$_POST['First_Name'];
			$middle_Initial=$_POST['middle_Initial'];
			$Last_Name=$_POST['Last_Name'];
			$Phone_Number=$_POST['Phone_Number'];
			$username = $_SESSION ['username'];
			
			if(isset($_POST['driving']) && ($_POST['driving']) == "a")
				$dp="od";
			else if(isset($_POST['driving']) && ($_POST['driving']) == "b")
				$dp="fd";
			else 
				$dp="dd";
				
			$notc=$_POST['notc'];
			$card_number=$_POST['card_number'];
			$expiry_date=$_POST['expiry_date'];
			$CVV=$_POST['CVV'];
			$billing_address=$_POST['billing_address'];
			
			$q3= "insert into 
			credit_card(cardNo, NameOnCard, CVV, expiryDate, billingAddress) 
			values ('$card_number', '$notc', '$CVV', '$expiry_date','$billing_address');";
	    
			$q3 .="update userr 
			set 
			firstName='$First_Name', 
			midInit='$middle_Initial',
			lastName='$Last_Name',
			phone='$Phone_Number',
			pType='$dp',
			cardNo='$card_number',
			address='$Address',
			email='$Email_address'
			where username='$username';";
			
			
			if( mysqli_multi_query($db,$q3))
				echo "Added Successfully.";
			else
				echo mysqli_error($db);
			
		}
	?>
    
</div>
</div>
</body>
</html>