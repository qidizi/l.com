<?php
function throwError($errno=0, $errstr='', $errfile='', $errline=0){
    echo <<<er
<fieldset><legend>运行时出错</legend><pre>
文件:{$errfile}
行号:{$errline}
出错代号:{$errno}
错误:{$errstr}
</pre></fieldset>
er;
}

function throwError2(){
        $e = error_get_last();

        if (empty($e))
                return;

    echo <<<er
<fieldset><legend>致命错误</legend><pre>
文件:{$e['file']}
行号:{$e['line']}
出错代号:{$e['type']}
错误:{$e['message']}
</pre></fieldset>
er;
}
set_error_handler("throwError", E_ALL );
set_exception_handler("throwError");
register_shutdown_function('throwError2');//如果使用了exit将不运行此脚本



