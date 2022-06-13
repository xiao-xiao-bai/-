<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$userid = $_GET["userid"];
$sql =<<<SQL
SELECT * FROM user_infor
WHERE id= $userid
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$user_id = $infors[0]['id'];
$user_name = $infors[0]['name'];
$user_password = $infors[0]['password'];
$user_sex = $infors[0]['sex'];
$user_phone = $infors[0]['phone'];
$user_age = $infors[0]['age'];
$user_birthday = $infors[0]['birthday'];
$path = $infors[0]['path']
?>
<div>
    <form enctype="multipart/form-data" action="admin_user_update_end.php" method="post">
        <div><h1 align="center" style="font-size: 15px">修改<?php echo $user_name;?>用户的信息</h1></div>
        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>编号:</td>
                    <td>
                        <input type="text" name="userid"  disabled value="<?php echo $infors[0]['id']; ?>">
                        <input type="text" id="username" name="userid" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>用户名:</td>
                    <td>
                        <input type="text" name="username"   value="<?php echo $infors[0]['name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>头像:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>密码:</td>
                    <td><input type="text" placeholder="请输入密码" name="password" value="<?php echo $user_password;?>"></td>
                </tr>
                <tr>
                    <td>年龄:</td>
                    <td><input type="text" placeholder="请输入年龄" name="age" value="<?php echo $user_age;?>"></td>
                </tr>
                <tr>
                    <td>性别:</td>
                    <td><input type="text" placeholder="请输入性别" name="sex" value="<?php echo $user_sex;?>"></td>
                </tr>
                <tr>
                    <td>电话:</td>
                    <td><input type="text" placeholder="请输入号码" name="phone" value="<?php echo $user_phone;?>"></td>
                </tr>
                <tr>
                    <td>日期:</td>
                    <td><input type="date"  name="birthday"></td>
                </tr>

                <tr align="center">
                    <td colspan="2"><input type="submit" id="btn_sub" value="修改"></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<?php
include_once ('admin_background_foot.php');
?>
