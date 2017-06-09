<?php
/**
 * Created by PhpStorm.
 * User: liupengzhan
 * Date: 2017/6/7
 * Time: 8:12
 */
require 'PHPMailerAutoload.php';
require_once 'class.filehandler.php';
require_once 'class.mailSendGateway.php';

$config = parse_ini_file('config.ini', true);

$senders = FileHandler::readCsv($config['file']['senderFile']);
$type   = FileHandler::readTypeCsv($config['file']['typeToAttachment']);
print_r($senders);
print_r($type);
foreach ($senders as $index => $sender)
{
    MailSendGateway::sendMailer($config, $sender[0], $type[$sender[1]][1], $type[$sender[1]][2], $type[$sender[1]][3]);
}