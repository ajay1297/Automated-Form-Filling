<?php
	include("config.php");
	$total = count($_FILES["fileToUpload"]["name"]);
	for($i = 0;$i<$total;$i++)
	{
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$j = $i + 1;
		$newfilename = "img".$j;
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			}
			else 
			{
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		if (file_exists($target_file)) 
		{
			//echo "Sorry, file already exists.";
			//$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"][$i] > 5000000) 
		{
			//echo "Sorry, your file is too large.";
			$uploadOk = 0;
			header('location:upload.html');
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			//header('Content-type : text/javascript');
			echo "Sorry, your file was not uploaded";
			// if everything is ok, try to upload file
			header('location:MainUpload.php');
		}
		else
		{
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], "uploads/".$newfilename.".jpg")) 
			{
				echo "The file ". basename( $_FILES["fileToUpload"]["name"][$i]). " has been uploaded.";
				header('location:MainUpload.php');
			}
			else
			{
				echo "Sorry, there was an error uploading your file.";
				header('location:MainUpload.php');
			}
		}
	}
?>