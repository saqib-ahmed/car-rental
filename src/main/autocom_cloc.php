<?php
include('login.php');

	$x = ($_GET['x']);
	$y = ($_GET['y']);
	
	$q5="select cType, color, seatingCap, transType
	     from car
		 where modelName='$y' and loName='$x'";
	
	$result=mysqli_query($db, $q5);
			
	echo "<table border=1 align=center style='font-size:20px' >
			<tr>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; '>Car Type</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; '>Color</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF;'>Seating Capacity</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; '>Transmission Type</th>
		
			</tr>
			";
				
	while($row = mysqli_fetch_assoc($result))
	{	
		echo  "<tr>" . "<td>" . $row['cType'] . "</td>"; 
		echo  "<td>". $row['color']. "</td>"; 
		echo  "<td>". $row['seatingCap']. "</td>"; 
		echo  "<td>".$row['transType']. "</td></tr>";
	}
	echo "</table>";
?>
