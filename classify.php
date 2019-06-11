<?php 
	$command = escapeshellcmd('ML_Engine\classify.py');
	$output = shell_exec($command);
	echo $output;
?>
