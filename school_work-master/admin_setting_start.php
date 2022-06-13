<?php
include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM admin_infor
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员信息修改</title>
    <link rel="stylesheet" href="./css/style_update.css"/>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>
<body>
<h1 class="layui-bg-blue"  align="center">滨城防疫志愿者后台</h1>
<div class="rg_layout" style="font-size: 18px">
    <div class="rg_left">
        <p class="layui-bg-red" align="center" style="font-size: 20px;"><?php echo $infors[0]['name'];?>的信息修改</p>
    </div>
    <div class="rg_center">
        <div class="rg_form ">
            <!--定义表单 form-->
            <form action="admin_setting_end.php" id="form" method="post">
                <table>
                    <tr>
                        <td class="td_left"><label for="username">姓名</label></td>
                        <td class="td_right">
                            <input type="text" name="username"  disabled value="<?php echo $infors[0]['name']; ?>">
                            <input type="text" id="username" name="username" hidden readonly value="<?php echo $infors[0]['name']; ?>">
                            <span id="s_username" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="password">密码</label></td>
                        <td class="td_right">
                            <input type="password" name="password" id="password" value="<?php echo $infors[0]['password']; ?>" ">
                            <span id="s_password" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="tel">手机号</label></td>
                        <td class="td_right">
                            <input type="text" name="tel" id="tel" placeholder="<?php echo $infors[0]['phone']; ?>">
                            <span id="s_tel" class="error"></span>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_left"><label>性别</label></td>
                        <td class="td_right">
                            <input type="text" name="gender" value="<?php echo $infors[0]['sex']; ?>">

                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="td_sub">
                            <input type="submit" id="btn_sub" value="修改">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="rg_right">
        <p style="font-size: 18px">已有账号?<a href="admin_background_face.php" class="rg_right_font">退出修改</a></p>
    </div>
</div>


</body>
</html>