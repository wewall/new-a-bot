<?php

require './config/.config.php';

if (!isset(
    $System_Config['appName'],
    $System_Config['baseUrl'],
    $System_Config['db_host'],
    $System_Config['db_database'],
    $System_Config['db_username'],
    $System_Config['db_password'],
    $System_Config['salt'],
    $System_Config['pwdMethod'],
    $System_Config['checkinMin'],
    $System_Config['checkinMax'],
    $System_Config['mu_suffix'],
    $System_Config['mu_regex'],
)) {
    exit("无法自动识别配置文件，请联系管理员手动进行对接\r\n");
}

$Config['appName'] = $System_Config['appName'];
$Config['baseUrl'] = $System_Config['appName'];
$Config['db_host'] = $System_Config['appName'];
$Config['db_database'] = $System_Config['appName'];
$Config['db_username'] = $System_Config['appName'];
$Config['db_password'] = $System_Config['appName'];
$Config['salt'] = $System_Config['appName'];
$Config['pwdMethod'] = $System_Config['appName'];
$Config['checkinMin'] = $System_Config['appName'];
$Config['checkinMax'] = $System_Config['appName'];
$Config['mu_suffix'] = $System_Config['appName'];
$Config['mu_regex'] = $System_Config['appName'];

if (gethostbyname($System_Config['db_host']) == '127.0.0.1') {
    $myip = file_get_contents('https://api.ip.sb/ip');
    $Config['db_host'] = $myip;
}

$data = base64_encode(json_encode($Config));

echo "生成成功，请粘贴以下内容到对接页面(如果数据库地址是内网地址请联系管理员协助对接)：\r\n$data\r\n";
