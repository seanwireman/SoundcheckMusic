<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.live.com';                 // Specify main and backup server
$mail->Port = 587;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'parkerwork@outlook.com';                // SMTP username
$mail->Password = 'Parker@2';                  // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'parkerwork@outlook.com';
$mail->FromName = 'AUTO WEBSITE SENDER';
$mail->AddAddress('parkerwork@outlook.com', 'Parker');  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <strong>in bold!</strong>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';