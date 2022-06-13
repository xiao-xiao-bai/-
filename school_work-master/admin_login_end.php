
<?php
session_start();
include ('conn.php');
header("Content-type:text/html;charset=utf-8");
$user = $_POST['user'];
$password = $_POST['password'];
$code = $_POST['code'];
if($code == $_SESSION['code']){
    $sql = <<<SQL
select * from admin_infor
where name = '{$user}' and password = '{$password}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    if ($infors) {
        echo "<script>alert('登录成功');location='admin_background_face.php';</script>";
    } else {
        echo "<script>alert('登录失败');location='login.php';</script>";
    }


}else{
    echo "<script>alert('验证码错误');location='login.php';</script>";
}










?>