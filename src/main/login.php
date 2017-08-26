<?php
	include("connection.php"); //Establishing connection with our database
	$error = ""; //Variable for storing our errors.
	session_start();
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]))
		{
			$error = "Both fields are required.";
		}else
		{
			$_SESSION ['username']=$_POST['username'];
			$username=$_POST['username'];
			$password=$_POST['password'];

			
			//Check username and password from database
			$sql="SELECT username FROM userr WHERE username='$username' and pasword='$password'";
			
			$result=mysqli_query($db,$sql);
			
			$flag = "Select uflag from userr where username= '$username'";
			$uflag=mysqli_query($db, $flag);
			$rowf=mysqli_fetch_assoc($uflag);
			
			if(mysqli_num_rows($result) == 1)
			{	
				if($rowf['uflag']==1)
					header("location: rev_gen.php");
				else if($rowf['uflag']==2)
					header("location: home_emp.php");
				else if($rowf['uflag']==3)
					header("location: home_mem.php");
			}
			else
			{
				$error = "Incorrect username or password.";
			}

		}
	}

?>