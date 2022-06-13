<?php
include_once ('conn.php');
?>
<?php
header("content-type:text/html;charset=utf-8");
$username = $_POST['username'];
$content = $_POST['content'];
//检测内容是否为空的函数
function judge($content1,$content2){
    if($content1 == '' || $content2 == ''){
        return false;
    }
    return true;
}
if(!judge($username,$content)){
    echo "<script>alert('用户名和内容不允许为空');location.href=('message.php')</script>";
}
//字符串转化为数组
$length = mb_strlen($content,'utf-8');
$arr = [];
for($i = 0;$i < $length;$i ++){
    $arr[] = mb_substr($content,$i,1,'utf-8');
}
//敏感词检测
foreach ($arr as $value){
    if($value == '杀' || $value == '残'){
        echo "<script>location='alter.php'</script>";
        exit;


    }
}
$link->query("SET NAMES UTF8");
//留言写入数据库
$time = time();
$sql =<<<SQL
INSERT INTO message
(content,user,time)
VALUES ('{$content}','{$username}','{$time}')
SQL;
$is = $link->query($sql);
if($is == true){
    echo "<script>alert('发表成功')</script>";
    header("location:message.php");
}else{
    echo "<script>alert('发表失败')</script>";
    header("location:message.php");
}
?>
