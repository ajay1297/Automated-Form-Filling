<?php
	include('config.php');
	session_start();
	$email = $_SESSION['email'];
	echo "".$email;
	$query = "SELECT username from members where email = '".$email."'";
	$result=mysqli_query($con , $query);
	echo "".mysqli_num_rows($result);
	if(mysqli_num_rows($result)>0)
	{
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC) or die(mysqli_error($con));
		$name = $row["username"];
		echo "".$name;
		$command = escapeshellcmd('ML_Engine\test.py '.$name.'');
		shell_exec($command);
	}
	else
	{
		$command = escapeshellcmd('ML_Engine\test.py');
		shell_exec($command);
	}
?>
