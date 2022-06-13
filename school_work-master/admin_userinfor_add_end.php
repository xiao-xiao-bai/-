<?php
include_once ('conn.php');
header("Content-type:text/html;charset=utf-8");
$admin_name = $_POST['username'];
$admin_password = $_POST['password'];
$admin_phone = $_POST['phone'];
$admin_sex = $_POST['sex'];
$admin_age = $_POST['age'];
$admin_birthday = $_POST['birthday'];
$path = './userimage/202201121628227555.png';//默认
$sql =<<<SQL
INSERT INTO user_infor
(name,password,sex,phone,birthday,age,path)
VALUES('{$admin_name}','{$admin_password}','{$admin_sex}','{$admin_phone}','{$admin_birthday}',{$admin_age},'{$path}')
SQL;
$query = mysqli_query($link,$sql);

if($query){
    echo "<script>alert('添加成功');location='admin_background_face.php';</script>";
}else{
    echo "<script>alert('添加失败');location='admin_background_face.php';</script>";
}
?>