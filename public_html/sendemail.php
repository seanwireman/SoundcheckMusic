<?php

require 'email-config.php';
/**
 * This example shows making an SMTP connection with authentication.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'assets/PHPMailer-master/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = $host;
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = $port;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = $email;
//Password to use for SMTP authentication
$mail->Password = $pass;
//Set who the message is to be sent from
$mail->setFrom($email, $from);
//Set an alternative reply-to address
//$mail->addReplyTo('prdiard@gmail.com', 'Sean Wireman');
//Set who the message is to be sent to
foreach ($to as $toEmail)
	$mail->addAddress($toEmail, '');
	
//Set the subject line
$mail->Subject = "subject: " . $_GET["subject"];
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
/*$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));*/
$mail->IsHTML(true);
$mail->Body = "Name: ".$_GET["name"]."<br><br>"."Email: ".$_GET["email"]."<br><br>"."Subject: ".$_GET["subject"]."<br><br>"."Message: ".$_GET["message"];
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo " Your message has been sent! Thank You!";
}
?>