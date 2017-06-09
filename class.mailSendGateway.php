<?php
/**
 * Created by PhpStorm.
 * User: liupengzhan
 * Date: 2017/6/8
 * Time: 22:57
 */
class MailSendGateway
{
    public static function sendMailer($config, $address, $subject, $context, $attachment)
    {
        echo 'Sending '. $address.'\n';
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
        $mail->addAddress($address);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

        $mail->addAttachment($attachment);         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $context;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo ' Failed.';
            echo ' Mailer Error: ' . $mail->ErrorInfo.'\n';
        } else {
            echo ' Success\n';
        }
    }
}