<?php
/**
 * Created by PhpStorm.
 * User: liupengzhan
 * Date: 2017/6/7
 * Time: 8:12
 */
require 'PHPMailerAutoload.php';

$config = parse_ini_file('config.ini', true);

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = $config['mail']['smtphost'];  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $config['mail']['username'];                 // SMTP username
$mail->Password = $config['mail']['password'];                           // SMTP password
$mail->SMTPSecure = $config['mail']['smtpsecure'];                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = $config['mail']['smtpport'];                                    // TCP port to connect to

$mail->setFrom($config['mail']['sender'], 'Mailer');
$mail->addAddress('lpz8120903@163.com', 'Joe User');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

$mail->addAttachment('C:\ckcore.txt');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}