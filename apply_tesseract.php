<?php 
	sleep(15);
	$command = escapeshellcmd('ML_Engine\apply_tesseract.py');
	shell_exec($command);
?>
