<?php
	include("config.php");
	extract($_GET);
	//echo "".$email;
	$sql = "SELECT * FROM members where email = '".$email."'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_num_rows($query);
	//echo "".$row;
	if($row > 0)
	{
		$var = 1;
		echo $var;
		//$arr = array("msg"=>"This username is not available");
		//echo json_encode($arr);
		//echo "This username is not available";
		//$msg = "This username is not available";
		//$username_json = json_encode($msg);
		//echo $username_json;
	}
	else
	{
		$var = 0;
		echo $var;
	}
?>