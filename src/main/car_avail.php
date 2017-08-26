<?php		
		include('login.php');
		date_default_timezone_set('Asia/Karachi');
		echo date('D, d M Y H:i:s');
		echo "<br><br><br>";
		$q="select pickDateTime
			from reservation";
		$res=mysqli_query($db, $q);
		$row=mysqli_fetch_assoc($res);
		print_r (date_parse($row['pickDateTime']));
		echo "<br> <input type='text' value='blah blah blah'/>";
		
?>