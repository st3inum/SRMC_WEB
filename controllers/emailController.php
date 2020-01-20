<?php  error_reporting(0);

require_once 'vendor/autoload.php';
require_once 'config/constant.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername(MYEMAIL)
  ->setPassword(MYEMAILPASS)
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
// http://localhost/problems/controllers/verify.php?token='.$token.'

function sendVerificationEmail($to,$token)
{
	global $mailer;
	$llink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] 
                === 'on' ? "https" : "http") . "://" . 
          $_SERVER['HTTP_HOST'] . VERIFYLOC; 

	$body='<!DOCTYPE html>
	<html>
	<head>
		<title>Verify Email</title>
	</head>
	<body>
		<div class="wrapper">
			<p>
				Thank You for signing up on our website. Please click on the link below to verify your Email.
			</p>
			<a href="'.$llink. $token . '">Confirm Account</a>
		</div>
	</body>
	</html>';



// Create a message
$message = (new Swift_Message('Verify Your Email'))
  ->setFrom([MYEMAIL => 'SRMC'])
  ->setTo($to)
  ->setBody($body,'text/html')
  ;

// Send the message
$result = $mailer->send($message);
	
}












?>