<?php 
 include("config.php");

if(isset($_POST['email'])){
    
   $email=$_POST['email'];
   $password=$_POST['password'];
    //echo $username;
    //echo $password;
   $sql="SELECT * FROM members WHERE email = '".$email."' AND password = '".$password."' limit 1";
    
   $result=mysqli_query($con , $sql);
   //echo $result;
   if(mysqli_num_rows($result)>0)
   {
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC) or die(mysqli_error($con));
      //echo $row["username"];
      //echo $row["password"];
      if($row["email"] == $email && $row["password"] == $password)
      {
		  session_start();
		  $_SESSION['email'] = $email;
         header('location:MainUpload.php');

      }
   } 
   else
   {
	  //echo "<alert>Wrong</alert>";
	  $message = "inavlid username";
	   echo "<script type='text/javascript'>alert('$message');</script>";
	  header('location:MainHome.html');
	  //echo "<script type = 'text/javascript'>alert('$error');</script>";

   }
        
   }
?>
