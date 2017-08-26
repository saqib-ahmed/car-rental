<?php
	include('login.php'); // Include Login Script
	
function date_dropdown(){
        /*days*/
        $html_output = '<td>   <select name="date_day" id="day_select" style="width:60px; padding:2px;">'."\n";
            for ($day = 1; $day <= 31; $day++) {
                $html_output .= ' <option>' . $day . '</option>'."\n";
            }
        $html_output .= '</select></td>'."\n";
		
        /*months*/
        $html_output .= '<td><select name="date_month" id="month_select" style=" padding:2px;">'."\n";
        $months = array("", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            for ($month = 1; $month <= 12; $month++) {
                $html_output .= '<option value="' . $month . '">' . $months[$month] . '</option>'."\n";
            }
        $html_output .= '</select></td>'."\n";
		
        /*years*/
        $html_output .= '<td><select name="date_year" id="year_select" style=" padding:2px;">'."\n";
            for ($year = date("Y"); $year <= (date("Y") + 20); $year++) 
			{
                $html_output .= '<option>' . $year . '</option>'."\n";
            }	
			$html_output .= '</select></td>'."\n";
			
	     /*Hours*/
        $html_output .= '<td><select name="date_hour" id="hour_select" style=" padding:2px;">'."\n";
            for ($hours = 0; $hours <= 23; $hours++) {
                $html_output .= '<option>' . $hours . '</option>'."\n";
            }	
        $html_output .= '</select></td>'."\n";
		
		/*minutes*/
		        $html_output .= '<td><select name="date_minute" id="minute_select" style=" padding:2px;">'."\n";
            for ($minutes = 0; $minutes <= 59; $minutes++) {
                $html_output .= '<option>' . $minutes . '</option>'."\n";
            }	
        $html_output .= '</select></td>'."\n";
        $html_output .= '</div></td>'."\n";
    return $html_output;
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>User Affected</title>
<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION['username']. ""?></div>
<div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>

<style>
.loginBox
{
	width:500px;
	height:800px;
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
    <h3>User Affected</h3>
    <br><br>
    <form method="post" action="">
        <label style="color:#000">User Name:</label><br>
        <input type="text" name="username" /><br><br>
		
	<table >
   <tr style='font-size:20px; color:#000099'>
	<td></td>
	<td>Day</td>   
	<td>Month</td>
	<td>Year</td>   
	<td>Hour</td>   
	<td>Minute</td>
	</tr>
    
			<?php
				echo '<tr><td><div id="date_select" >'. "\n".'<label for="date_day" style="color:#000; font-size:20px;">Pick up Time</label>'. "\n";
				echo date_dropdown();
				echo '</td></tr>';
				echo '<td><div id="date_select" >'. "\n" .'<label for="date_day" style="color:#000; font-size:20px;">Return Time</label>';
				echo date_dropdown();
				echo '</td>';
				?>	
		</tr>
		</table>
		<br><br><br>
		<table>
        <label style="color:#000">Email Address:</label><br>
        <input type="text" name="email" />  <br><br>
	    <label style="color:#000">Phone Number:</label><br>
        <input type="text" name="pno" />  <br><br>
		<br>
 <br><br>  <br><br>
		<br>
		<input type="submit" name="submit1" value="Cancel Request" /> 
		<input type="submit" name="submit1" value="Show Car Availibility" /> 
 
		 </table>
    </form>

  
<?php
		if(isset($_REQUEST['submit1']))
		{
			$sNo=$_POST['sNo'];
			$auxCable=$_POST['auxCable'];
			$umFlag=$_POST['umFlag'];
			$modelName=$_POST['modelName'];
			$cType=$_POST['cType'];
			$color=$_POST['color'];
			$hourlyDate=$_POST['hourlyDate'];
			$dailyRate=$_POST['dailyRate'];
			$seatingCap=$_POST['seatingCap'];
			$transType=$_POST['transType'];
			$loName=$_POST['loName'];
			
			if($_POST['tt']== "Automatic")
				$transType="Auto";
			else
				$transType="Manual";
			
			if($_POST['ac']== "yes")
				$auxCable=1;
		     else
				$auxCable=0;
				$q1="insert into car(sNo,auxCable, umFlag,$modelName,cType,color,hourlyDate,dailyRate,seatingCap,transType,loName) 
				values('$sNo','$auxCable', '$umFlag','$modelName','$cType','$color','$hourlyDate','$dailyRate','$seatingCap'.'$transType'.'$loName')"	;
	
			    $result=mysqli_query($db,$q1);
			    $row=mysqli_fetch_assoc($result);
				
				if(mysqli_query($db, $q1))
					echo "registered";
		
				else if($row > 0)
				{	
					echo "User already Exists";
			    }
				else
					echo "text fields do not match";
		
		}
?> 

</div>
</div>
</body>
</html>