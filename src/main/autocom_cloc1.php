<?php
include('login.php');

	$x = ($_GET['x']);
	$y = ($_GET['y']);
	//$x="Civic";
	//$y="Main Block";
	
		$sql="SELECT modelName FROM car WHERE loName='$x'";
	
	$result = mysqli_query($db, $sql);
	
		
	while($row = mysqli_fetch_assoc($result)) 
	{
			echo "<option value=\"". $row['modelName']. "\">" . $row['modelName'] . "</option>";
	}

?>
