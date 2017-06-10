<?php
/**
 * Created by PhpStorm.
 * User: liupengzhan
 * Date: 2017/6/9
 * Time: 7:52
 */
require_once 'class.filehandler.php';
$config = parse_ini_file('config.ini', true);
$sendLink = 'http://'.$_SERVER['HTTP_HOST'].'/phpmailertest/send.php';
$addresses = FileHandler::readCsv($config['file']['addressFile']);
$types   = FileHandler::readTypeCsv($config['file']['typeToAttachment']);
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
        <caption>收件人类别表.</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>收件人</th>
            <th>类别</th>
        </tr>
        </thead>
        <tbody>
    <?php
        foreach ($addresses as $index => $sender)
        {
            echo '<tr>';
            echo '<th scope="row">'.$index.'</th>';
            echo '<td>'.$sender[0].'</td>';
            echo '<td>'.$sender[1].'</td>';
            echo '</tr>';
        }
    ?>
        </tbody>
    </table>
</div>
<div class="bs-example" data-example-id="simple-table">
    <table class="table table-striped table-hover">
    <caption>类别附件表.</caption>
    <thead>
    <tr>
        <th>类别</th>
        <th>主题</th>
        <th>正文</th>
        <th>附件</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($types as $type => $info)
    {
        echo '<tr>';
        echo '<th scope="row">'.$type.'</th>';
        echo '<td>'.$info[1].'</td>';
        echo '<td>'.$info[2].'</td>';
        echo '<td>'.$info[3].'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
    </table>
</div>
<a href="<?php echo $sendLink?>" class="btn btn-info" role="button">发送</a>
</body>
</html>