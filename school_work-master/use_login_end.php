<?php
include ('conn.php');
header("Content-type:text/html;charset=utf-8");
$user = $_POST['user'];
$password = $_POST['password'];
//查询用户信息表SQL语句的编写
$sql =<<<SQL
select * from user_infor
where name = '{$user}' and password = '{$password}'
SQL;
$query = mysqli_query($link,$sql);//执行用户信息表的SQl语句的查询
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
$infors=mysqli_num_rows($query);//返回结果集中行的数量
if($infors){//判断用户信息表中该用户是否存在
    // 启动 Session
    session_start();
    //声明一个名为user的变量并进行赋值
    $_SESSION['user'] = $user;
    date_default_timezone_set('Asia/Shanghai');//设置时区
    $_SESSION['time'] = time();
    echo "<script>alert('登录成功');location='./frontend/index.php';</script>";
}else{
    echo "<script>alert('登录失败');location='login.php';</script>";
}
?>