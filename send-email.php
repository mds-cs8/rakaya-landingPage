<?php


require "vendor/autoload.php"; //just download library classes that inside composer file

//import  phpmailer classes 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//object of mail class
$mail = new PHPMailer(true);

//enable debugging messages by smtp debug
$mail->SMTPDebug = SMTP::DEBUG_SERVER;



$mail->isSMTP();


//enable smtp authentication
$mail->SMTPAuth = true ;


// configure smtpserver

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username = "rakayatech@gmail.com";
$mail->Password = "vmxdzzrblgtbwrgy";


//enable
$mail-> isHtml(true);
return $mail ; 

?>