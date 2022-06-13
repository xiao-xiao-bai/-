<?php
include_once ('admin_background_head.php');
?>
<div>
    <h1 class="layui-bg-green"  align="center" style="font-size: 25px">添加最美志愿者信息</h1>
    <hr class="layui-bg-green" >
    <form action="admin_voluntary_style_add_end.php" method="post">

        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>用户名:</td>
                    <td><input type="text" placeholder="请输入用户名" name="username" ></td>
                </tr>
                <tr>
                    <td>时间:</td>
                    <td>
                        <input type="date" id="time" name="time" style="width: 80%">
                    </td>
                </tr>
                <tr style="height: 200px">
                    <td>主要事迹:</td>
                    <td>
                        <textarea name="thing" style="width: 100%;height: 100%"></textarea>
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input type="submit" id="btn_sub" value="添加">
                        <button style="margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px">
                            <a href="admin_voluntary_style_add_start.php" style="color: black;font-size: 20px;text-decoration: none">重置</a>
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
