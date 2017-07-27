<?php require_once __DIR__ .'/error.php';?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>php实时代码测试页面</title>
<style>
body{background:black;color:white;}
body,html,form{margin:0px;}
*{font-family: "Monaco"!important/*这个字体对于编程来说比较好*/;}
form{
display:block;
padding-right:5.5em;
position:relative;
margin-bottom:2em;
}
textarea{
padding-top:20px;
background:transparent;
color:white;
display:block;
width:100%;
font-size:1em;
line-height:normal;
font-style:normal;
overflow-x:auto;
overflow-y:hidden;
border:0px none;
border-left:3.5em solid transparent;
border-right:1.5em solid transparent;
resize:none;
}
fieldset{color:red;}
.line {
padding:0px;
margin:0px;
padding-left:4em;
list-style-type:decimal;
position:absolute;
top:0px;left:0px;
color:blue;
overflow-y:hidden;
padding-top:20px;
z-index:-1;
}
.line li{font-size:1em;
line-height:normal;
font-style:normal;}
button{position:absolute;bottom:-2em;font-size:1em;}
</style>
</head>
<body>
<form method="POST" action="" id="form">
<ul class="line" id="line"></ul>
<textarea name="php" id="php"  wrap="off">
<?php echo htmlspecialchars(empty($_POST['php']) ? '' : $_POST['php']);?>
</textarea>
<button type="submit">按 CTRL+ENTER 或 点击此 运行PHP代码</button>

</form>
<script>
function _(id){
        return document.getElementById(id);
}
document.body.onkeypress=function(event) {
        event = event||window.event;

        if (event.ctrlKey && (10 == event.keyCode) ) {
                _('form').submit();
        }
}


document.body.onkeyup = window.onload = _('php').onblur  = _('php').onfocus  = _('php').onclick = function(){
        var minRow = 5;
        var it = _('php');
        var realRow = it.value.split('\n').length;
        realRow = realRow<minRow ? minRow : realRow;
        it.rows = ++realRow;//为了兼容ie 跳动时需要加一行,5行它只显示4行
        showLineNO(realRow);
}

var LINE_NO = 0;
function showLineNO(line){//显示行号原则是只增不减
        var ul = _('line');
        ul.style.height = (_('php').offsetHeight-20) + 'px';

        if (line <= LINE_NO)
                return;

        while (line > LINE_NO){
                ul.appendChild(document.createElement('LI'));
                LINE_NO++;
        }
}
</script>

<?php
echo '<pre>';

if (!empty($_POST['php'])) {
        $t1 = microtime(1);
        eval($_POST['php'].';');
        $t1 = microtime(1) - $t1;

        echo "<hr />耗时:{$t1}秒";
}

echo '</pred>';
?>
</body>
</html>
