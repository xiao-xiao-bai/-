<?php
header("Content-Type: text/html;charset=utf-8");
include_once('conn.php');
$quiz1 = $_POST['quiz1'];
$quiz2 = $_POST['quiz2'];
$quiz3 = $_POST['quiz3'];
$name = $_POST['username'];
$phone = $_POST['userphone'];
$content = $_POST['help_content'];
$time = time();//获取当前时间
//将求助信息输入到数据库的SQL语句
$sql =<<<SQL
INSERT INTO help
(username,userphone,helpcontent,county,village,burg,time)
VALUES ('{$name}','{$phone}','{$content}','{$quiz1}','{$quiz2}','{$quiz3}','{$time}')
SQL;
$query = mysqli_query($link, $sql);
if($query)
{
    echo "<script>alert('发布成功');location='seek_help_start.php';</script>";
}
else
{
    echo "<script>alert('发布失败');location='seek_help_start.php';</script>";
}
?>