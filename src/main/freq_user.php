<?php
	include('login.php'); // Include Login Script
	
	$x=0;
	$cur_use= $_SESSION['username'];
	
	echo "<div style='text-align:right; margin-right:30px'>";
	echo "Current User: ". "$cur_use" . "</div>
		 <div style='text-align:right; margin-right:30px'><a href='logout.php' style='color:#000066; font-size:18px;margin-right:5px'>Logout?</a></div>";
		 
	$q5="select userName, pType, avc as number_of_reservations
		 from userr natural join (select *, monthname(pickDateTime), avg(cnt) as avc
								  from (select *, count(*) as cnt
										from reservation
										where ((datediff(current_timestamp(), pickDatetime)/30)<4)
										group by monthname(pickDateTime), username) as r
									group by  username
								) as r2
		group by username
		order by number_of_reservations desc";
	$result=mysqli_query($db, $q5);
		echo "<style> 
			td{
				text-align:center;
			}
			</style>";
	echo "<h3 align=center style='color:#000099; margin-top:50px; font-size:35px'>Frequent User Report</h3>";
	echo "<table border=2 align=center style='margin-top:100px; font-size:25px' >
			<tr>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Username</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Driving plan</th>
			<th width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Number of Reservations per month</th>
		
			</tr>
			";
	
	
	while($row=mysqli_fetch_assoc($result))
	{	
		echo  "<tr>" . "<td>" . $row['userName'] . "</td>"; 
		if($row['pType']=='od')
		     echo  "<td>". "Ocassional driving plan" . "</td>"; 
	    else if($row['pType']=='dd')
			 echo  "<td>". "Daily driving plan" . "</td>"; 
		else if($row['pType']=='fd')
			 echo  "<td>". "Frequent driving plan" . "</td>"; 
		echo  "<td>". $row['number_of_reservations']. "</td>"; 
		
		if($x<4)
			$x++;
		else
			break;
	
	}
	echo "</table>";
?>