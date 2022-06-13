<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>志愿者注册页面</title>
    <link rel="stylesheet" href="./css/style_update.css"/>
</head>
<body>
<div class="rg_layout">
    <div class="rg_left">
        <p>新用户注册</p>
        <p>USER REGISTER</p>
    </div>
    <div class="rg_center">
        <div class="rg_form ">
            <!--定义表单 form-->
            <form action="user_infor_insear_end.php" id="form" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td class="td_left"><label for="username">头像</label></td>
                        <td class="td_right">
                            <input type="file" name="image" id="username" placeholder="">
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="username">姓名</label></td>
                        <td class="td_right">
                            <input type="text" name="username" id="username" placeholder="请输入用户名">
                            <span id="s_username" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="password">密码</label></td>
                        <td class="td_right">
                            <input type="password" name="password" id="password" placeholder="请输入4位密码">
                            <span id="s_password" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_left"><label for="password">确认密码</label></td>
                        <td class="td_right">
                            <input type="password" name="passwords" id="password" placeholder="请输入4位密码">
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
                        <td class="td_left"><label for="tel">年龄</label></td>
                        <td class="td_right">
                            <input type="text" name="userage" id="tel" placeholder="请输入年龄">
                            <span id="s_tel" class="error"></span>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_left"><label>性别</label></td>
                        <td class="td_right">
                            <input type="radio" name="gender" value="男" checked> 男
                            <input type="radio" name="gender" value="女"> 女
                        </td>
                    </tr>

                    <tr>
                        <td class="td_left"><label for="birthday">出生日期</label></td>
                        <td class="td_right"><input type="date" name="birthday" id="birthday" placeholder="请输入出生日期">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" id="td_sub"><input type="submit" id="btn_sub" value="注册"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <div class="rg_right">
        <p>已有账号?<a href="<?php echo 'login.php'; ?>" class="rg_right_font">立即登录</a></p>
    </div>
</div>
</body>
</html>