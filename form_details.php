<?php
	include("config.php");
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');
	if(file_exists("data.json"))
	{
		$str = file_get_contents("data.json");
		echo $str;
	}
	else
	{
		$var = 0;
		echo $var;
	}
?>