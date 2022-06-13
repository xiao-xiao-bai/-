<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])){
    echo "<script>alert('未登录');location='../login.php';</script>";
}elseif (time()-$_SESSION['time']<3600) {
    include_once('conn.php');
    $_SESSION['time'] = time();
    $name = $_SESSION['user'];
    $sql =<<<SQL
select path from user_infor
where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $image = $infors[0]['path'];

?>
    <?php
    include_once ('frontend_heads.php');
    ?>
<?php
include_once ('conn.php');
//查询用户信息表的SQL语句
$sql =<<<SQL
select * from user_infor
where name = '{$name}'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<table class="layui-table">
    <h1 align="center" style="font-size: 20px">用户的个人信息</h1>
    <colgroup>
        <col width="150">
        <col width="200">
        <col>
    </colgroup>
    <thead>
    <tr>
        <th>姓名</th>
        <th>性别</th>
        <th>年龄</th>
        <th>电话</th>
        <th>积分</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?php echo $infors[0]['name'];?></td>
        <td><?php echo $infors[0]['sex'];?></td>
        <td><?php echo $infors[0]['age'];?></td>
        <td><?php echo $infors[0]['phone'];?></td>
        <td><?php echo $infors[0]['integral'];?></td>
    </tr>

    </tbody>
</table>
<div style="height: 350px;width: 100%">

</div>
<?php
    include_once ('frontend_foots.php');
    ?>
    <?php
}else{
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>