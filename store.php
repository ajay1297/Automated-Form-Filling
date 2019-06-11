<?php
	include("config.php");
	session_start();
	echo "hello";
	echo $_POST['name'];
	if(isset($_POST['name']))
   {
	   echo "hello";
		$email = $_SESSION['email'];
        $name = $_POST['name']; 
		echo "".$name;
        $fathersName = $_POST['fathersName']; 
		echo "".$fathersName;
        $mothersName = $_POST['mothersName'];
		echo "".$mothersName;
		$dob = $_POST['dob'];
		echo "".$dob;
		$tenthboard = $_POST['tenthboard'];
		echo "".$tenthboard;
        $twelfthboard = $_POST['twelfthboard'];
		echo "".$twelfthboard;
		if($tenthboard == "C.B.S.E" && $twelfthboard == "C.B.S.E")
		{
			$tenthgpa = $_POST['tenthgpamax'];
			echo "".$tenthgpamax;
			$tenthgpatotal = $_POST['tenthgpatotal'];
			echo "".$tenthgpatotal;
			$twelfthcbsemax = $_POST['twelfthcbsemax'];
			echo "".$twelfthcbsemax;
			$twelfthcbsetotal = $_POST['twelfthcbsetotal'];
			echo "".$twelfthcbsetotal;
			$tenthMax = null;
			echo "".$tenthMax;
			$tenthTotal = null;
			echo "".$tenthTotal;
			$twelvethMax = null;
			echo "".$twelvethMax;
			$twelvethTotal = null;
			echo "".$twelvethTotal;
		}
		else if($tenthboard == "C.B.S.E" && $twelfthboard == "State")
		{
			$tenthgpamax = $_POST['tenthgpamax'];
			echo "".$tenthgpamax;
			$tenthgpatotal = $_POST['tenthgpatotal'];
			echo "".$tenthgpatotal;
			$twelfthcbsemax = null;
			echo "".$twelfthcbsemax;
			$twelfthcbsetotal = null;
			echo "".$twelfthcbsetotal;
			$tenthMax = null;
			echo "".$tenthMax;
			$tenthTotal = null;
			echo "".$tenthTotal;
			$twelvethMax = $_POST['twelvethMax'];
			echo "".$twelvethMax;
			$twelvethTotal = $_POST['twelvethTotal'];
			echo "".$twelvethTotal;
		}
		else if($tenthboard == "State" && $twelfthboard == "C.B.S.E")
		{
			$tenthgpamax = null;
			echo "".$tenthgpamax;
			$tenthgpatotal = null;
			echo "".$tenthgpatotal;
			$twelfthcbsemax = $_POST['twelfthcbsemax'];
			echo "".$twelfthcbsemax;
			$twelfthcbsetotal = $_POST['twelfthcbsetotal'];
			echo "".$twelfthcbsetotal;
			$tenthMax = $_POST['tenthMax'];
			echo "".$tenthMax;
			$tenthTotal = $_POST['tenthTotal'];
			echo "".$tenthTotal;
			$twelvethMax = null;
			echo "".$twelvethMax;
			$twelvethTotal = null;
			echo "".$twelvethTotal;
		}
		else if($tenthboard == "State" && $twelfthboard == "State")
		{
			$tenthgpamax = null;
			echo "".$tenthgpamax;
			$tenthgpatotal = null;
			echo "".$tenthgpatotal;
			$twelfthcbsemax = null;
			echo "".$twelfthcbsemax;
			$twelfthcbsetotal = null;
			echo "".$twelfthcbsetotal;
			$tenthMax = $_POST['tenthMax'];
			echo "".$tenthMax;
			$tenthTotal = $_POST['tenthTotal'];
			echo "".$tenthTotal;
			$twelvethMax = $_POST['twelvethMax'];
			echo "".$twelvethMax;
			$twelvethTotal = $_POST['twelvethTotal'];
			echo "".$twelvethTotal;
		}
		/*$tenthgpa = $_POST['tenthgpa'];
		echo "".$tenthgpa;
		$twelfthcbse = $_POST['twelfthcbse'];
		echo "".$twelfthcbse;
        $tenthMax = $_POST['tenthMax'];
		echo "".$tenthMax;
        $tenthTotal = $_POST['tenthTotal'];
		echo "".$tenthTotal;
        $twelvethMax = $_POST['twelvethMax'];
		echo "".$twelvethMax;
        $twelvethTotal = $_POST['twelvethTotal'];
		echo "".$twelvethTotal;*/
	
		$search_query = "SELECT * FROM formDetails WHERE email = '".$email."'";
		$result=mysqli_query($con , $search_query);
		//echo "hi ".mysqli_num_rows($result);
		if(mysqli_num_rows($result)>0)
		{
			$query = "UPDATE formDetails
					  SET name='$name', fathersName='$fathersName', mothersName='$mothersName', dob='$dob', tenthboard='$tenthboard', twelfthboard='$twelfthboard', tenthgpamax='$tenthgpamax',tenthgpatotal='$tenthgpatotal',
					  twelfthcbsemax='$twelfthcbsemax', twelfthcbsetotal='$twelfthcbsetotal',tenthMax='$tenthMax', tenthTotal='$tenthTotal', twelvethMax='$twelvethMax', twelvethTotal='$twelvethTotal'
					  WHERE email='$email'";
			$data = mysqli_query ($con,$query)or die(mysqli_error($con));
		}
		else
        {
			$query = "INSERT INTO formDetails(email,name,fathersName,mothersName,dob,tenthboard,twelfthboard,tenthgpamax,tenthgpatotal,twelfthcbsemax,twelfthcbsetotal,tenthMax,tenthTotal,twelvethMax,twelvethTotal) VALUES 
			('$email','$name','$fathersName','$mothersName','$dob','$tenthboard','$twelfthboard','$tenthgpamax','$tenthgpatotal','$twelfthcbsemax','$twelfthcbsetotal','$tenthMax','$tenthTotal','$twelvethMax','$twelvethTotal')"; 
			$data = mysqli_query ($con,$query)or die(mysqli_error($con));
		}       
    }
	if($data) 
		{
             echo "YOUR REGISTRATION IS COMPLETED...";
			 header('location:logout.php');
        }
			else
			{
				header('location:logout.php');
			}
?>