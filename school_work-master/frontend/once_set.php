<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])){
    echo "<script>alert('未登录');location='../login.php';</script>";
}elseif (time() - $_SESSION['time'] < 3600) {
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
include_once('conn.php');
?>
<?php
header("Content-Type: text/html;charset=utf-8");
$sql = <<<SQL
select * from user_infor
where name = '{$name}'
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
    <?php
    include_once ('frontend_heads.php');
    ?>
<div class="once_set" style="width: 800px;height: 600px;margin: 0 auto">
    <form enctype="multipart/form-data"  action="once_set_end.php" method="post">
        <hr class="layui-bg-red" >
        <div><h1 align="center" style="font-size: 25px">修改<?php echo $name; ?>用户的信息</h1></div>
        <hr class="layui-bg-red" >
        <div ng-show="show">
            <table class="layui-bg-green" cellpadding="10" cellspacing="1" border="soild 1px #000" style="font-size: 20px;width: 80%;margin: 0 auto">
                <tr>
                    <td>编号:</td>
                     <td>
                        <input type="text" name="userid" disabled value="<?php echo $infors[0]['id']; ?>">
                        <input type="text" id="username" name="userid" hidden readonly
                               value="<?php echo $infors[0]['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>用户名:</td>
                    <td>
                        <input type="text" name="username" disabled value="<?php echo $infors[0]['name']; ?>">
                        <input type="text" id="username" name="username" hidden readonly
                               value="<?php echo $infors[0]['name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>密码:</td>
                    <td><input type="text" placeholder="请输入密码" name="password" value="<?php echo $infors[0]['password']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>年龄:</td>
                    <td><input type="text" placeholder="请输入年龄" name="age" value="<?php echo $infors[0]['age']; ?>"></td>
                </tr>
                <tr>
                    <td>电话:</td>
                    <td><input type="text" placeholder="请输入号码" name="phone" value="<?php echo $infors[0]['phone']; ?>"></td>
                </tr>
                <tr>
                    <td>日期:</td>
                    <td><input type="date" name="birthday"></td>
                </tr>

                <tr align="center">
                    <td colspan="2"><input class="layui-bg-blue" type="submit" id="btn_sub" value="修改"></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<?php
include_once('frontend_foots.php');
?>
<?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
</body>
</html>