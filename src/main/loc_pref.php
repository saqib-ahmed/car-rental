<?php
	include('login.php'); // Include Login Script
	
	$cur_use= $_SESSION['username'];
	echo "<div style='text-align:right; margin-right:30px'>";
	echo "Current User: ". "$cur_use" . "</div>
		 <div style='text-align:right; margin-right:30px'><a href='logout.php' style='color:#000066; font-size:18px;margin-right:5px'>Logout?</a></div>";
		 
	$q5="select monthname(pickDateTime) as month_Name, loName as location, count(*) as number_of_Reservations,
		 sum(hour(timediff(retDateTime, pickDateTime))) as total_hours
		 from car natural join reservation
		 where floor(datediff(current_timestamp(), pickDateTime)/30)<3
		 group by month_name
		 order by month(pickDateTime) desc";
	$result=mysqli_query($db, $q5);
	echo "<style> 
			td{
				text-align:center;
			}
			</style>";
	echo "<h3 align=center style='color:#000099; margin-top:50px; font-size:35px'>Location Preference Report</h3>";
	echo "<table border=2 align=center style='margin-top:100px; font-size:25px' >
			<tr>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Month</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Location</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Number of Reservations</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Total Hours</th>
			</tr>
			";
	
	while($row = mysqli_fetch_assoc($result))
	{	
		echo  "<tr>" . "<td>" . $row['month_Name'] . "</td>"; 
		echo  "<td>". $row['location'] . "</td>"; 
		echo  "<td>". $row['number_of_Reservations']. "</td>"; 
		echo  "<td>". $row['total_hours'] . "</td>" . "</tr>" ; 
	}
	echo "</table>";
?>