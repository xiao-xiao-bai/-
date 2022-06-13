<?php
header("Content-type:text/html;charset=utf-8");
include_once ('conn.php');
?>
<?php
$newpassword = $_POST['newpassword'];
$username = $_POST['username'];
$usertel  = $_POST['tel'];
?>
<!--查看数据库中是否有存在该名用户的SQL语句的编写-->
<?php
$sql=<<<SQL
SELECT * FROM user_infor
WHERE name = '{$username}' AND phone = '{$usertel}'
SQL;
$query = mysqli_query($link,$sql);//执行上述的SQL语句
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);//从结果集中取得所有行作为关联数组
if(!$infors){
    echo "<script>alert('没有该用户信息');location='login.php';</script>";
}else{
    $sql1=<<<SQL
UPDATE user_infor
SET password = '$newpassword'
WHERE name = '{$username}'
SQL;
    $query1 = mysqli_query($link,$sql1);

    if($query1)
    {
        echo "<script>alert('重置成功');location='login.php';</script>";
    }
    else
    {
        echo "<script>alert('重置失败');location='login.php';</script>";
    }
}
?>

