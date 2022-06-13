<?php
include_once ('admin_background_head.php');
?>
<div>
   <h1 class="layui-bg-green"  align="center" style="font-size: 25px">添加用户</h1>
    <hr class="layui-bg-green" >
    <form action="admin_userinfor_add_end.php" method="post">

        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>用户名:</td>
                    <td><input type="text" placeholder="请输入用户名" name="username" ></td>
                </tr>
                <tr>
                    <td>密码:</td>
                    <td><input type="text" placeholder="请输入密码" name="password" ></td>
                </tr>
                <tr>
                    <td>年龄:</td>
                    <td><input type="text" placeholder="请输入年龄" name="age"></td>
                </tr>
                <tr>
                    <td>性别:</td>
                    <td><input type="text" placeholder="请输入性别" name="sex"></td>
                </tr>
                <tr>
                    <td>电话:</td>
                    <td><input type="text" placeholder="请输入号码" name="phone"></td>
                </tr>
                <tr>
                    <td>日期:</td>
                    <td><input type="date"  name="birthday"></td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input type="submit" id="btn_sub" value="添加">
                        <button style="margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px">
                            <a href="admin_userinfor_add_start.php   " style="color: black;font-size: 20px;text-decoration: none">重置</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<?php
include_once ('admin_background_foot.php');
?>
