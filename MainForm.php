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
	<title>Form</title>
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
	
<script type = "text/javascript">
window.onload = function()
{
	var xhr = new XMLHttpRequest();
	xhr.open("GET","convert_to_json.php",true)
	xhr.send();
	xhr.onreadystatechange = function()
	{
		console.log("world");
		console.log(xhr.readyState);
		console.log(xhr.status);
		if(xhr.readyState == 4 && xhr.status == 200)
		{
			
		}
	}
}

obj = 
{
	xhr : new XMLHttpRequest(),
	fill : function()
	{
		console.log("hello");
		this.xhr.onreadystatechange = this.showmsg();
		//this.xhr.open("GET","http://localhost/Proj/form_details.php",true);
		this.xhr.open("GET","form_details.php",true);
		this.xhr.send();
	},
	showmsg : function()
	{
		console.log("world");
		console.log(this.xhr.readyState);
		console.log(this.xhr.status);
		//console.log(this.xhr.responseText);
		if(this.xhr.readyState == 4 && this.xhr.status == 200)
		{
		
			if(this.xhr.responseText != 0)
			{
			var form_obj = JSON.parse(this.xhr.responseText);
			document.getElementById("clickHere").innerHTML = "Form is Filled";
			document.getElementById("clickHere").style.background = "blue";
			document.getElementById("name").value = form_obj.name;
			document.getElementById("fathersName").value = form_obj.fathersName;
			document.getElementById("mothersName").value = form_obj.mothersName;
			document.getElementById("dob").value = form_obj.dob;
			document.getElementById("tenthboard").value = form_obj.board10;
			document.getElementById("twelfthboard").value = form_obj.board12;
			if(form_obj.board10 == "C.B.S.E" && form_obj.board12 == "C.B.S.E")
			{
				//document.getElementById("cbsediv10").style.visibility = "visible";
				document.getElementById("cbsediv10max").style.visibility = "visible";
				document.getElementById("cbsediv10max").style.display = "inline";
				document.getElementById("tenthgpamax").value = form_obj.tenthMax;
				document.getElementById("cbsediv10total").style.visibility = "visible";
				document.getElementById("cbsediv10total").style.display = "inline";
				document.getElementById("tenthgpatotal").value = form_obj.tenthTotal;
				document.getElementById("cbsediv12max").style.visibility = "visible";
				document.getElementById("cbsediv12max").style.display = "inline";
				document.getElementById("twelfthcbsemax").value = form_obj.twelvethMax;
				document.getElementById("cbsediv12total").style.visibility = "visible";
				document.getElementById("cbsediv12total").style.display = "inline";
				document.getElementById("twelfthcbsetotal").value = form_obj.twelvethTotal;
				document.getElementById("tenthMax").value = "0";
				document.getElementById("tenthTotal").value = "0";
				document.getElementById("twelvethMax").value = "0";
				document.getElementById("twelvethTotal").value = "0";
			}
			else if(form_obj.board10 == "C.B.S.E" && form_obj.board12 == "State")
			{
				document.getElementById("cbsediv10max").style.visibility = "visible";
				document.getElementById("cbsediv10max").style.display = "inline";
				document.getElementById("tenthgpamax").value = form_obj.tenthMax;
				document.getElementById("cbsediv10total").style.visibility = "visible";
				document.getElementById("cbsediv10total").style.display = "inline";
				document.getElementById("tenthgpatotal").value = form_obj.tenthTotal;
				document.getElementById("statediv12max").style.visibility = "visible";
				document.getElementById("statediv12max").style.display = "inline";
				document.getElementById("twelvethMax").value = form_obj.twelvethMax;
				document.getElementById("statediv12total").style.visibility = "visible";
				document.getElementById("statediv12total").style.display = "inline";
				document.getElementById("twelvethTotal").value = form_obj.twelvethTotal;
				document.getElementById("twelfthcbsemax").value = "0";
				document.getElementById("twelfthcbsetotal").value = "0";
				document.getElementById("tenthMax").value = "0";
				document.getElementById("tenthTotal").value = "0";
			}
			else if(form_obj.board10 == "State" && form_obj.board12 == "C.B.S.E")
			{
				document.getElementById("statediv10max").style.visibility = "visible";
				document.getElementById("statediv10max").style.display = "inline";
				document.getElementById("tenthMax").value = form_obj.tenthMax;
				document.getElementById("statediv10total").style.visibility = "visible";
				document.getElementById("statediv10total").style.display = "inline";
				document.getElementById("tenthTotal").value = form_obj.tenthTotal;
				document.getElementById("cbsediv12max").style.visibility = "visible";
				document.getElementById("cbsediv12max").style.display = "inline";
				document.getElementById("twelfthcbsemax").value = form_obj.twelvethMax;
				document.getElementById("cbsediv12total").style.visibility = "visible";
				document.getElementById("cbsediv12total").style.display = "inline";
				document.getElementById("twelfthcbsetotal").value = form_obj.twelvethTotal;
				document.getElementById("tenthgpamax").value = "0";
				document.getElementById("tenthgpatotal").value = "0";
				document.getElementById("twelvethMax").value = "0";
				document.getElementById("twelvethTotal").value = "0";
			}
			else if(form_obj.board10 == "State" && form_obj.board12 == "State")
			{
				document.getElementById("statediv10max").style.visibility = "visible";
				document.getElementById("statediv10max").style.display = "inline";
				document.getElementById("tenthMax").value = form_obj.tenthMax;
				document.getElementById("statediv10total").style.visibility = "visible";
				document.getElementById("statediv10total").style.display = "inline";
				document.getElementById("tenthTotal").value = form_obj.tenthTotal;
				document.getElementById("statediv12max").style.visibility = "visible";
				document.getElementById("statediv12max").style.display = "inline";
				document.getElementById("twelvethMax").value = form_obj.twelvethMax;
				document.getElementById("statediv12total").style.visibility = "visible";
				document.getElementById("statediv12total").style.display = "inline";
				document.getElementById("twelvethTotal").value = form_obj.twelvethTotal;
				document.getElementById("tenthgpamax").value = "0";
				document.getElementById("tenthgpatotal").value = "0";
				document.getElementById("twelfthcbsemax").value = "0";
				document.getElementById("twelfthcbsetotal").value = "0";
			}
			//document.getElementById("tenthMax").value = form_obj.tenthMax;
			//document.getElementById("tenthTotal").value = form_obj.tenthTotal;
			//document.getElementById("twelvethMax").value = form_obj.twelvethMax;
			//document.getElementById("twelvethTotal").value = form_obj.twelvethTotal;
			//document.getElementById("twelvethTotal").value = form_obj.twelvethTotal;

			console.log("hello world");
			}
			else
			{
				document.getElementById("clickHere").innerHTML = " High quality images required ";
				document.getElementById("clickHere").style.background = "red";
			}
			//document.getElementById("is_visible").style.visibility = "visible";
			//console.log(this.xhr.responseText);
			//var res = this.responseText;
			//var resJSON = JSON.parse(res);
			//console.log(resJSON.msg);
			//document.getElementById("username").value = resJSON.msg;
			//var res = this.responseText;
			//console.log(res);
			//var obj = JSON.parse(res);
			//console.log(obj);
			//document.getElementById("username").value = obj.msg;
		}
	}                     
};
</script>
<style>
	.input100{display : inline}
	.labelinput
	{
		font-family: Poppins-Bold;
		font-size: 24px;
		color: #333333;
		width: 100%;
		text-align: left;
		font-weight: bold;
	}
	
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<!--<div class="wrap-login100" align="center">-->
				<div class="wrap-login100" id="changeColor">
						<button class="login100-form-btn" onclick="obj.fill()" id="clickHere" >
						Click here to fill the form
						</button>
				
				
				<form class="wrap-login100" action="store.php" method="POST">
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					<span class="login100-form-title">
						Automated Filled Form
					</span>
					
					<span class="labelinput">&nbsp&nbsp&nbsp Name : </span>
					<div class="wrap-input100" data-validate = "Valid Name is required: abc">
					<input class="input100" type="text" name="name" placeholder="Full Name" id="name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					
					<div class="wrap-input100 validate-input">
					</div>
					<div class="wrap-input100 validate-input">
					</div>
					
					<span class="labelinput">&nbsp&nbsp&nbsp Fathers Name : </span>
					<div class="wrap-input100 validate-input" data-validate = "Father's name is required : John Doe">
						<input class="input100" type="text" name="fathersName" placeholder="Father's Name" id="fathersName">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<span class="labelinput">&nbsp&nbsp&nbsp Mothers Name : </span>
					<div class="wrap-input100 validate-input" data-validate = "Mother's Name is required: Alice">
						<input class="input100" type="text" name="mothersName" placeholder="Mother's Name" id="mothersName">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<span class="labelinput">&nbsp&nbsp&nbsp Date OF Birth : </span>
					<div class="wrap-input100 validate-input" data-validate = "Date of Birth is required">
						<input class="input100" type="text" name="dob" placeholder="Date of Birth(DDMMYYYY)" id="dob">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<span class="labelinput">&nbsp&nbsp&nbsp Tenth Board : </span>
					<div class="wrap-input100 validate-input" data-validate = "Tenth Board is required">
						<input class="input100" type="text" name="tenthboard" placeholder="Tenth Board" id="tenthboard">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<span class="labelinput">&nbsp&nbsp&nbsp Twelfth Board : </span>
					<div class="wrap-input100 validate-input" data-validate = "Twelfth Board is required">
						<input class="input100" type="text" name="twelfthboard" placeholder="Twelfth Board" id="twelfthboard">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					<!-- ******************************************** CBSE ******************************************** -->
					<div id="cbsediv10max" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Max Tenth GPA : </span>
					<div class="wrap-input100 validate-input" data-validate = "Tenth is required">
						<input class="input100" type="text" name="tenthgpamax" placeholder="Tenth GPA" id="tenthgpamax">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<div id="cbsediv10total" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Total Tenth GPA : </span>
					<div class="wrap-input100 validate-input" data-validate = "Tenth is required">
						<input class="input100" type="text" name="tenthgpatotal" placeholder="Tenth GPA" id="tenthgpatotal">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<div id="cbsediv12max" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Max Twelfth Marks : </span>
					<div class="wrap-input100 validate-input" data-validate = "Twelfth Result is required">
						<input class="input100" type="text" name="twelfthcbsemax" placeholder="Twelfth Result" id="twelfthcbsemax">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<div id="cbsediv12total" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Obtained Twelfth Marks : </span>
					<div class="wrap-input100 validate-input" data-validate = "Twelfth Result is required">
						<input class="input100" type="text" name="twelfthcbsetotal" placeholder="Twelfth Result" id="twelfthcbsetotal">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
										
					<!-- ******************************************** CBSE ******************************************** -->
					
					<!-- ******************************************** State Board ******************************************** -->
					
					<div id="statediv10max" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Tenth Total Marks : </span>
					<div class="wrap-input100 validate-input" data-validate = "10th max marks required">
						<input class="input100" type="text" name="tenthMax" placeholder="10th Grade Max Marks" id="tenthMax">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<div id="statediv10total" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Tenth Obtained Marks : </span>
					<div class="wrap-input100 validate-input" data-validate = "10th total marks required">
						<input class="input100" type="text" name="tenthTotal" placeholder="10th Grade Total Marks" id="tenthTotal">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<div id="statediv12max" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Twelfth Total Marks : </span>
					<div class="wrap-input100 validate-input" data-validate = "12th max marks required">
						<input class="input100" type="text" name="twelvethMax" placeholder="12th Grade Max Marks" id="twelvethMax">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<div id="statediv12total" class="labelinput" style="visibility:hidden;display:none;">
					<span class="labelinput">&nbsp&nbsp&nbsp Twelfth Obtained Marks : </span>
					<div class="wrap-input100 validate-input" data-validate = "12th total marks required">
						<input class="input100" type="text" name="twelvethTotal" placeholder="12th Grade Total Marks" id="twelvethTotal">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
						</span>
					</div>
					</div>
					
					<div class="wrap-input100">
					</div>
					<div class="wrap-input100">
					</div>
					
					<!-- ******************************************** State Board ******************************************** -->
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
						
							Submit
						
						</button>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"> <a href = "logout.php">
							Logout</a>
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