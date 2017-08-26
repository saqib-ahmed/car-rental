<?php
	
	include('login.php'); // Include Login Script
	
	
	$cur_use= $_SESSION['username'];
	
	echo "<div style='text-align:right; margin-right:30px'>";
	echo "Current User: ". "$cur_use" . "</div>
		 <div style='text-align:right; margin-right:30px'><a href='logout.php' style='color:#000066; font-size:18px;margin-right:5px'>Logout?</a></div>";
		 
	$q4="select*
		from driving_plan";
	$result=mysqli_query($db, $q4);
	echo "<h3 align=center style='color:#000099; margin-top:50px; font-size:35px'>Driving Plan Details</h3>";
	echo "<table border=2 align=center style='margin-top:100px; font-size:25px' >
			<tr>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Plan Type</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Discount</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Annual Fee</td>
			<td width='20%' bgcolor=#0b3b0b style='color:#FFF; padding:20px'>Monthly Payment</td>
			</tr>
			";
	
	while($row = mysqli_fetch_assoc($result))
	{
		if($row['pType']=='od')
			$dpp="Occasional Driving Plan";
		else if($row['pType']=='fd')
			$dpp="Frequent Driving Plan";
		else if($row['pType']=='dd')
			$dpp="Daily Driving Plan";
		
		echo  "<tr>" . "<td>" . $dpp . "</td>"; 
		if($row['discount']==null)
			echo  "<td>". "-NA-". "</td>";
		else
			echo  "<td>". $row['discount']. "%" . "</td>"; 
		
		if($row['annual_fee']==null)
			echo  "<td>". "-NA-". "</td>";
		else
			echo  "<td>". "\$" . $row['annual_fee']. "</td>"; 
		
		if($row['Monthly_payment']==null)
			echo  "<td>". "-NA-". "</td>";
		else
			echo  "<td>". "\$" . $row['Monthly_payment'] . "</td>" . "</tr>" ; 
	}
	echo "</table>";
?>