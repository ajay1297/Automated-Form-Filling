<?php
	$host='localhost';
	$user='root';
	$password='';
	$db='database';
 
	$con = mysqli_connect($host,$user,$password);
	mysqli_select_db($con , $db);
	header('Access-Control-Allow-Origin: *');

?>