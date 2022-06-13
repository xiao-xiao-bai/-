<?php
include_once('conn.php');
header("Content-Type: text/html;charset=utf-8");
$username = $_POST['username'];
$newtitle = $_POST['title'];
$comment = $_POST['new_content'];
$time = time();
$sql =<<<SQL
INSERT INTO newcomment
(title,comment,user_name,time)
VALUES ('{$newtitle}','{$comment}','{$username}','{$time}')
SQL;
$query = mysqli_query($link,$sql);
if($query){
    echo "<script>alert('发表成功');location='news_face.php';</script>";
}else{
    echo "<script>alert('发表失败');location='news_face.php';</script>";
}
?>
