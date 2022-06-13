
<?php
include_once ("conn.php");
ini_set("error_reporting","E_ALL & ~E_NOTICE");
date_default_timezone_set("PRC");
header("Content-Type: text/html;charset=utf-8");
$userid = $_POST['userid'];
$username = $_POST['username'];
$password = $_POST['password'];
$userage  = $_POST['age'];
$userphone = $_POST['phone'];
$birthday  = $_POST['birthday'];
//用户信息修改的SQL语句
$sql =<<<SQL
UPDATE user_infor
SET name = '{$username}',password = '{$password}',phone = '{$userphone}',age = $userage,birthday = '$birthday'
WHERE id = $userid
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('update sucess');location='index.php';</script>";
}
else
{
    echo "<script>alert('update fail');location:'index.php';</script>";
}
?>

