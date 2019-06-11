<?php
	session_start();
	if (!isset($_SESSION['email'])) 
	{
		//header('Location: '.$_SERVER['PHP_SELF']);
		header('Location: MainLogin.html');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Upload</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript">
function wait()
{
	alert("Wait for 30 seconds after you submit the photos");
	var element = document.getElementById('goToFormPage');
	element.disabled = true;
	setTimeout(function()
	{
		element.disabled = false;
	}, 30000);
}
var obj =
{
	xhr : new XMLHttpRequest(),
	run_python_script : function()
	{
		console.log("hello");
		this.xhr.onreadystatechange = this.showmsg();
		//this.xhr.open("GET","http://localhost/Proj/convert_to_json.php",true);
		this.xhr.open("GET","convert_to_json.php",true);
		this.xhr.send();
	},
	showmsg : function()
	{
		console.log("world");
		console.log(this.xhr.readyState);
		console.log(this.xhr.status);
		console.log(this.xhr.responseText);
		if(this.xhr.readyState == 4 && this.xhr.status == 200)
		{
		}
	}            
}

var obj1 =
{
	xhr : new XMLHttpRequest(),
	run_python_script : function()
	{
		console.log("hello");
		this.xhr.onreadystatechange = this.showmsg();
		this.xhr.open("GET","classify.php",true);
		this.xhr.send();
	},
	showmsg : function()
	{
		console.log("world classify");
		console.log(this.xhr.readyState);
		console.log(this.xhr.status);
		console.log(this.xhr.responseText);
		if(this.xhr.readyState == 4 && this.xhr.status == 200)// && this.xhr.responseText == 1)
		{
			console.log("hello world classify");
			if(this.xhr.responseText == 10 || this.xhr.responseText == 1012 || this.xhr.responseText == 12 ) //this.xhr.responseText == 12 
			{
				document.getElementById("is_visible").style.visibility = "visible";
				document.getElementById("is_visible").style.display = "inline";
			}
			else
			{
				document.getElementById("is_visible").style.visibility = "hidden";
				document.getElementById("is_visible").style.display = "none";
			}
			//console.log(this.xhr.responseText);
		}            
	}
}

var tesseract =
{
	xhr : new XMLHttpRequest(),
	run_python_script : function()
	{
		console.log("hello");
		//this.xhr.onreadystatechange = this.showmsg();
		this.xhr.open("GET","apply_tesseract.php",true);
		this.xhr.send();
		this.xhr.onreadystatechange = this.showmsg();
	},
	showmsg : function()
	{
		console.log("--world tesseract");
		console.log(this.xhr.readyState);
		console.log(this.xhr.status);
		if(this.xhr.readyState == 4 && this.xhr.status == 200)// && this.xhr.responseText == 1)
		{
			//console.log("hello world");
		}            
	}
}

var opencv =
{
	xhr : new XMLHttpRequest(),
	run_python_script : function()
	{
		console.log("hello");
		//this.xhr.onreadystatechange = this.showmsg();
		this.xhr.open("GET","opencv.php",true);
		this.xhr.send();
		this.xhr.onreadystatechange = this.showmsg();
	},
	showmsg : function()
	{
		console.log("--world opencv");
		console.log(this.xhr.readyState);
		console.log(this.xhr.status);
		if(this.xhr.readyState == 4 && this.xhr.status == 200)// && this.xhr.responseText == 1)
		{
			//console.log("hello world");
		}            
	}
}
</script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/pes.jpg" alt="IMG">
				</div>
				<form class="login100-form validate-form" enctype="multipart/form-data" method="post" action="upload.php">
					<span class="login100-form-title">
						Upload the documents
					</span>
					
					<div class="container-login100-form-btn">
						<input  name="fileToUpload[]" multiple type="file" id="fileToUpload" />
					</div>
					
					<div id="is_visible" class="visible" style="visibility:hidden;display:none;" >
						<span id="is_taken" class="visible-block" style="color:red;font-family: Montserrat-Bold;"> Please upload one tenth and one 12th marks card</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="submit" name="submit"  onclick="wait();opencv.run_python_script();tesseract.run_python_script();">
							Submit
						</button>
					</div>
					<div class="container-login100-form-btn" onmouseenter = "obj1.run_python_script()" onmouseleave = "obj1.run_python_script()">
						<button class="login100-form-btn" id="goToFormPage" onclick="obj.run_python_script()" onmouseenter = "obj1.run_python_script()" onmouseleave = "obj1.run_python_script()" >
							<a class="login100-form-btn" href="MainForm.php"> Go To Form Page </a>
						</button>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" id="logout">
							<a class="login100-form-btn" href="logout.php"> Logout </a>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>