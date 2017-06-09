<?php
/**
 * Created by PhpStorm.
 * User: liupengzhan
 * Date: 2017/6/9
 * Time: 7:52
 */
require_once 'class.filehandler.php';
$config = parse_ini_file('config.ini', true);
$sendLink = $_SERVER['HTTP_HOST'].'/phpmailertest/test.php';
$senders = FileHandler::readCsv($config['file']['senderFile']);
$types   = FileHandler::readTypeCsv($config['file']['typeToAttachment']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>测试</title>
        <meta charset="utf-8">
    </head>
<body>
<div>
    <?php
        foreach ($senders as $index => $sender)
        {
            echo $index.' '.$sender[0].' '.$sender[1].'</br>';
        }
    ?>
</div>
<div>
    <?php
    foreach ($types as $type => $info)
    {
        echo $type.' '.$info[1].'</br>';
    }
    ?>
</div>
<a href="<?php echo $sendLink?>">发送</a>
</body>
</html>