<?php
include('login.php');

	$x = ($_GET['x']);
	
	$q5="select modelName, c.loName as lo, retDateTime, c.sNo as sno
	     from car as c join reservation as r on r.sNo=c.sNo
		 where username='$x' and retDateTime>current_timestamp()";
	
	$result=mysqli_query($db, $q5);
	$row = mysqli_fetch_assoc($result);	
	$modelName=$row['modelName'];
	$loname=$row['lo'];
	$retdate=$row['retDateTime'];
	$date=date_parse($retdate);
	$sno=$row['sno'];
	
	echo "<label style='border-top:1px solid; border-bottom:1px solid'>Rental Information</label><br><br>";
	echo	"<label>Vehicle S.No.</label><br>";
	echo    "<input type='text' name='sno' value='$sno'/><br><br>";
	echo "<label>Car Model:</label><br>
		  <input type='text' name='cModel' value='$modelName'/><br><br>";
	echo	"<label>Location:</label><br>
			 <input type='text' name='loName' value='$loname' />  <br><br>";
	echo	"<label>Original Return time:</label><br>
			 <input type='text' name='retdateold' value= '$retdate' />  <br><br>";
	echo	"<label>New Return time:</label><br>
			 <input type='text' name='retdatenew' />  <br><br>";
				

		
	echo "</table>";
?>
