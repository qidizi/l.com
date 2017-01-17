<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php错误日志</title>
</head>
<body>
<?php
echo '<pre>';
$log = '/var/log/php-fpm/www-error.log';

if (!is_writable($log)) {
    exit("{$log}日志文件不可写:请使用 chmod a+wr {$log}处理一下;");
}

echo file_get_contents($log);
file_put_contents($log, '');
echo '</pre>';
?>
</body>
</html>