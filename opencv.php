<?php 
	# python ocr.py --image images/example_01.png 
	$command1 = escapeshellcmd('ML_Engine\ocrimg1.py --image uploads\img1.jpg');
	shell_exec($command1);
	$command2 = escapeshellcmd('ML_Engine\ocrimg2.py --image uploads\img2.jpg');
	shell_exec($command2);
?>
