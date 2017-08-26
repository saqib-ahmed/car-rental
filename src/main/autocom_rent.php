<?php
include('login.php');

	$x = ($_GET['x']);
	$y = ($_GET['y']);
	
	if($y=="cbModel")
		$sql="SELECT modelName FROM car WHERE loName='$x'";
	else
		$sql="SELECT cType FROM car WHERE loName='$x'";
	
	$result = mysqli_query($db, $sql);

	echo "<select name='mod'>";
		
	while($row = mysqli_fetch_assoc($result)) 
	{
		if($y=="cbModel")
			echo "<option value=\"". $row['modelName']. "\">" . $row['modelName'] . "</option>";
		else
			echo "<option value=\"". $row['cType']. "\">" . $row['cType'] . "</option>";
	}
	echo "</select>";
?>
