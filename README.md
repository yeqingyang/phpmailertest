# 批量发送邮件使用说明
- 本程序需要本地安装php,起web服务。
- windows用户可以按照下面流程
## 1 安装wamp
- [wamp64位下载地址](https://downloads.sourceforge.net/project/wampserver/WampServer%203/WampServer%203.0.0/wampserver3.0.6_x64_apache2.4.23_mysql5.7.14_php5.6.25-7.0.10.exe?r=https%3A%2F%2Fsourceforge.net%2Fprojects%2Fwampserver%2Ffiles%2F&ts=1497071273&use_mirror=jaist)
- [wamp32位下载地址](https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.0.6_x86_apache2.4.23_mysql5.7.14_php5.6.25-7.0.10.exe/download)
- 下载后默认安装即可，启动，windows右下图标变为绿色，表示启动正常

## 2 下载本项目
解压后将整个文件夹放到wamp的www目录下，默认是C:\wamp\www

## 3 配置
打开C:\wamp\www\phpmailertest\config.ini

```
[mail]
smtphost = smtp.163.com
username = lpz8120903@163.com
password = xxx
smtpsecure = ssl
smtpport = 465
sender = lpz8120903@163.com
```
- 以上是163邮箱的配置，username和password写上自己的邮箱和密码 sender应该是发送者的邮箱，正常应该跟username一样
- 如果是其他邮箱，smtphost等需要配置为其他邮箱的配置

```
[file]
addressFile = sender.csv
typeToAttachment = typeToAttachment.csv
```
文件配置：
- addressFile 是收件人地址、类别，文件默认实在项目文件夹下，这里也可以是文件的绝度路径例如是C:/sender.csv。
- typeToAttachment 是类别、主题、正文、附件的绝对路径。
- 注意addressFile typeToAttachment文件的第一行都是表头，代码会忽略第一行。

## 4 发送邮件
### 手动发送
打开浏览器进入发送首页
http://localhost/phpmailertest/index.php
首页可以看到程序从csv解析出的两个表格内容，点击发送就可以发松邮件了
### 定时发送
- 定时发送依赖windows的批处理命令脚本sendEmail.bat,以及windows的定时任务功能
- 先测试bat文件：在本项目文件夹中找到sendEmail.bat，双击执行，看下邮箱是否有收到邮件，收到说明发送正常
- 配置windonws定时任务：参照[Windows计划任务设置,定时执行指定脚本](https://jingyan.baidu.com/article/e2284b2b72bffce2e6118d2c.html),设置好该文件sendEmail.bat（注意应该是文件的绝对路径），以及定时时间
