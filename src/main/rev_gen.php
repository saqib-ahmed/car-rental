<?php
	include('login.php'); // Include Login Script
	echo '<div style="text-align:right; margin-right:30px"><?php echo "Current User: ". $_SESSION[\'username\']. ""?></div>
		 <div style="text-align:right; margin-right:30px"><a href="logout.php" style="color:#000066; font-size:18px;margin-right:5px">Logout?</a></div>"';
		 
	$q5="select reservation.sNo, car.cType, car.modelName, sum(reservation.estCost) as est_cost, sum(reservation.lateFee) as lateFee 
		 from car join reservation on reservation.sNo=car.sNo 
		 where ((datediff(current_timestamp(), pickDatetime)/30)<4) 
		 group by cType, sNo";
	$result=mysqli_query($db, $q5);
		echo "<style> 
			td{
				text-align:center;
			}
			</style>";
	echo "<h3 align=center style='color:#000099; margin-top:50px; font-size:35px'>Renenue Generated Report</h3>";
	echo "<table border=2 align=center style='margin-top:100px; font-size:25px' >
			<tr>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Vehicle Sno</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Type</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Car Model</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Reservation Revenue</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Late Fee Revenue</th>
		
			</tr>
			";
				
	while($row = mysqli_fetch_assoc($result))
	{	
		echo  "<tr>" . "<td>" . $row['sNo'] . "</td>"; 
		echo  "<td>". $row['cType']. "</td>"; 
		echo  "<td>". $row['modelName']. "</td>"; 
		echo  "<td>". "\$". $row['est_cost']. "</td>";
		if($row['lateFee']!=null)
			echo  "<td>". "\$". $row['lateFee']. "</td>"; 
		else
			echo  "<td>". "Never been late". "</td>";
	}
	echo "</table>";
?>