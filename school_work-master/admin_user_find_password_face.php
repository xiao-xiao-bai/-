<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>志愿者密码找回</title>
    <link rel="stylesheet" href="./css/style_update.css"/>
    <link rel="stylesheet" href="layui/css/layui.css">
    <script src="layui/layui.js"></script>
</head>
<body>
<h1 class="layui-bg-red"  align="center">滨城防疫志愿者管理系统</h1>
<div class="rg_layout layui-bg-gray" style="font-size: 18px;margin: 0 auto">
    <div class="rg_left">
        <p  style="font-size: 25px">密码找回</p>
        <p>FIND PASSWORD</p>
    </div>
    <div class="rg_center">
        <div class="rg_form ">
            <!--定义表单 form-->
            <form  action="admin_user_find_password_end.php" id="form" method="post">
                <table>
                    <tr>
                        <td class="td_left"><label for="username">姓名</label></td>
                        <td class="td_right">
                            <input type="text" name="username" id="username" placeholder="请输入用户名">
                            <span id="s_username" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="password">新密码</label></td>
                        <td class="td_right">
                            <input type="password" name="newpassword" id="password" placeholder="请输入新密码">
                            <span id="s_password" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="tel">手机号</label></td>
                        <td class="td_right">
                            <input type="text" name="tel" id="tel" placeholder="请输入手机号">
                            <span id="s_tel" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="td_sub"><input type="submit" id="btn_sub" value="提交"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="rg_right">
        <p style="font-size: 20px">已有账号?<a href="<?php echo 'login.php'; ?>" class="rg_right_font">立即登录</a></p>
    </div>
</div>
</body>
</html>