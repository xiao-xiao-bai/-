<?php
include_once ('conn.php');
header("Content-type:text/html;charset=utf-8");
$user_name = $_POST['username'];
$thing = $_POST['thing'];
$time = $_POST['time'];
$sql =<<<SQL
SELECT * FROM user_infor
where name = '{$user_name}'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
if($infors){
    $phone = $infors[0]['phone'];
    $sql =<<<SQL
INSERT INTO thing
(name,phone,things,time)
VALUES('{$user_name}','{$phone}','{$thing}','{$time}')
SQL;
    $query = mysqli_query($link,$sql);

    if($query){
        echo "<script>alert('添加成功');location='admin_voluntary_style_show.php';</script>";
    }else{
        echo "<script>alert('添加失败');location='admin_voluntary_style_show.php';</script>";
    }
}else{
    echo "<script>alert('添加失败,没有该名志愿者');location='admin_voluntary_style_show.php';</script>";
}


?>