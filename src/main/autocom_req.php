<?php
include('login.php');

	$x = ($_GET['x']);
	

		$sql="SELECT modelName FROM car WHERE loName='$x'";
	
	$result = mysqli_query($db, $sql);

	echo "<select name='modelName'>";
		
	while($row = mysqli_fetch_assoc($result)) 
	{
			echo "<option>" . $row['modelName'] . "</option>";
	}
	echo "</select>";
?>
