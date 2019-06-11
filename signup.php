<?php
   include("config.php");

   if(isset($_POST['username']))
   {
        $username = $_POST['username']; 
        $email = $_POST['email']; 
        $password = $_POST['password'];
        //echo "".$fullname.$username.$email.$password."";
        $sql = mysqli_query($con,"SELECT * FROM members WHERE email = '$_POST[email]'") or die(mysqli_error($con));
        if(mysqli_num_rows($sql) > 0)
        {
            $row = mysqli_fetch_array($sql,MYSQLI_ASSOC) or die(mysqli_error($con)); 
            if($username == $row["email"])
            { 
                $message = "Email Already taken , try with different email";
				echo "<script type='text/javascript'>alert('$message');</script>";
            }
        } 
        $query = "INSERT INTO members (username,email,password) VALUES ('$username','$email','$password')"; 
        $data = mysqli_query ($con,$query)or die(mysqli_error($con)); 
        if($data) 
        {
             echo "YOUR REGISTRATION IS COMPLETED...";
			 /*if(isset($_POST['signup']))
			 {
				 require 'PHPMailer-5.2-stable/PHPMailerAutoload.php';
				 $mail = new PHPMailer;
				 $mail->Host = 'smtp.gmail.com';
				 $mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'ajayppatil100@gmail.com';                 // SMTP username
				$mail->Password = 'ASTCRULE';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;
				$mail->setFrom($_POST['email'], $_POST['username']);
				$mail->addAddress('ajayppatil100@gmail.com', 'Admission Office');     // Add a recipient
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = 'Here is the subject';
				$mail->Body    = 'This is the HTML message body <b>in bold!</b>'.$_POST['username'];
				if(!$mail->send()) {
					echo 'Message could not be sent.';
					echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
					echo 'Message has been sent';
				}

			 }*/
			 if(isset($_POST['signup']))
			 {
				/*require("PHPMailer_5.2.0/class.PHPMailer.php");
				$username = $_REQUEST['username']; 
				$email = $_REQUEST['email']; 
				$password = $_REQUEST['password'];
				echo "".$username."\n".$email."\n".$password."";
				$mail = new PHPMailer(true);

				$mail->isSMTP();// Set mailer to use SMTP
				$mail->CharSet = "utf-8";// set charset to utf8
				$mail->SMTPAuth = true;// Enable SMTP authentication
				$mail->SMTPSecure = 'tls';// Enable TLS encryption, `ssl` also accepted

				$mail->Host = 'smtp.gmail.com';// Specify main and backup SMTP servers
				$mail->Port = 587;// TCP port to connect to
				$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
					)
				);
				$mail->isHTML(true);// Set email format to HTML

				$mail->Username = 'pesu.admission@gmail.com';// SMTP username
				$mail->Password = 'Pesu@1234';// SMTP password

				$mail->setFrom('pesu.admission@gmail.com', 'PESU Admission Office');//Your application NAME and EMAIL
				$mail->Subject = 'Login Credentials';//Message subject
				//$body = " E-Mail : "+$email+"\n"+" Password : "+$password;
				//$mail->MsgHTML("Hey $username \n");
				$mail->MsgHTML("Hey $username, Your Email : $email And  Password : $password");
				$mail->addAddress($email, $username);// Target email


				$mail->send();*/
			 }
			 //header('location:MainHome.html');
        }
		header('location:MainHome.html');
    }
?>
