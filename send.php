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

$indexLink = 'http://'.$_SERVER['HTTP_HOST'].'/phpmailertest/index.php';
$config = parse_ini_file('config.ini', true);

$addresses = FileHandler::readCsv($config['file']['addressFile']);
$types   = FileHandler::readTypeCsv($config['file']['typeToAttachment']);
$typeArray = array();
foreach ($addresses as $index => $sender) {
    $typeArray[$sender[1]][] = $sender[0];
}
$allResult = array();
foreach ($typeArray as $type => $addressArray) {
    $resultArray = MailSendGateway::sendMailer($config, $addressArray, $types[$type][1], $types[$type][2], $types[$type][3]);
    $allResult = array_merge($allResult, $resultArray);
}
//var_dump($allResult);
?>
<!DOCTYPE html>
<html>
<head>
    <title>测试</title>
    <meta charset="utf-8">
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap-flex.min.css" rel="stylesheet" > -->
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="bs-example" data-example-id="simple-table">
    <table class="table table-striped table-hover">
        <caption>发送结果.</caption>
        <thead>
        <tr>
            <th>收件人</th>
            <th>是否成功</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($allResult as $address => $isTrue)
        {
            echo '<tr>';
            echo '<th scope="row">'.$address.'</th>';
            if ($isTrue) {
                echo '<td><p class="bg-success">成功</p></td>';
            } else {
                echo '<td><p class="bg-danger">失败</p></td>';
            }
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</div>
<a href="<?php echo $indexLink?>" class="btn btn-info" role="button">回到发送页</a>
</body>
</html>

