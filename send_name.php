<?php 
 include("config.php");
 
if(isset($_POST['username']))
	{
		$username=$_POST['username'];
		$command = escapeshellcmd("C:\xampp\htdocs\Proj\convert_to_json.py '$username'");
		shell_exec($command);
    }
?>
