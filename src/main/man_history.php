<?php
	include('login.php'); // Include Login Script
	
	$cur_use= $_SESSION['username'];
	echo "<div style='text-align:right; margin-right:30px'>";
	echo "Current User: ". "$cur_use" . "</div>
		 <div style='text-align:right; margin-right:30px'><a href='logout.php' style='color:#000066; font-size:18px;margin-right:5px'>Logout?</a></div>";
		 
	$q5="select modelName, prob.date_time, man_req.username, problem
		 from (prob natural join man_req) join car on car.sNo=man_req.sNo
		 group by modelName, problem";
	$result=mysqli_query($db, $q5);
		echo "<style> 
			td{
				text-align:center;
			}
			</style>";
	echo "<h3 align=center style='color:#000099; margin-top:50px; font-size:35px'>Maintenance History Report</h3>";
	echo "<table border=2 align=center style='margin-top:100px; font-size:25px' >
			<tr>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Car</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Date-Time</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Employee</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Problem</th>
			</tr>
			";
	
	while($row = mysqli_fetch_assoc($result))
	{	
		echo  "<tr>" . "<td>" . $row['modelName'] . "</td>"; 
		echo  "<td>". $row['date_time'] . "</td>"; 
		echo  "<td>". $row['username']. "</td>"; 
		echo  "<td>". $row['problem'] . "</td>" . "</tr>" ; 
	}
	echo "</table>";
?>