<?php
	require("PHPMailer_5.2.0/class.PHPMailer.php");
	//require("class.SMTP.php");
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
$mail->Subject = 'Test';//Message subject
$mail->MsgHTML("HTML code");// Message body
$mail->addAddress('adpp1997@gmail.com', 'User Name');// Target email


$mail->send();
?>