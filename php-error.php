<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php错误日志</title>
</head>
<body>
<?php
echo '<pre>';
$log = __DIR__ .'/../php_errors.log';
echo file_get_contents($log);
file_put_contents($log, '');
echo '</pre>';
?>
</body>
</html>