<?php   
	session_start();
   
	$folder_path = "uploads";  
	$files = glob($folder_path.'/*');  
	foreach($files as $file) 
	{ 
		if(is_file($file))  
			unlink($file);  
	}
	unset($_SESSION['username']);  
	unset($_SESSION['email']);
	session_destroy();  
	header('location:MainHome.html');  
?>