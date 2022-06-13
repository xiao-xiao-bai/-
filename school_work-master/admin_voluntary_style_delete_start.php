<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$userid = $_GET["userid"];
$sql =<<<SQL
SELECT * FROM thing
WHERE id= $userid
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$user_id = $infors[0]['id'];
$user_name = $infors[0]['name'];
$user_phone = $infors[0]['phone'];
$things = $infors[0]['things'];
?>
    <div>
        <h1 class="layui-bg-red"  align="center">最美志愿者<?php echo $user_name;?>的信息删除</h1>
        <hr class="layui-bg-orange" >
        <form action="admin_voluntary_style_update_end.php" method="post">
            <div ng-show="show">
                <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                    <tr>
                        <td>编号:</td>
                        <td>
                            <input type="text" name="userid"  disabled value="<?php echo $infors[0]['id']; ?>">
                            <input type="text"  name="userid" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>用户名:</td>
                        <td>
                            <input type="text" name="username"  disabled value="<?php echo $infors[0]['name']; ?>">
                            <input type="text" id="user_name" name="username" hidden readonly value="<?php echo $infors[0]['name']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>电话号</td>
                        <td>
                            <input type="text" name="userphone"  disabled value="<?php echo $infors[0]['phone']; ?>">
                            <input type="text" id="userphone" name="userphone" hidden readonly value="<?php echo $infors[0]['phone']; ?>">
                        </td>

                    </tr>
                    <tr align="center">
                        <td colspan="2"><input type="submit" id="btn_sub" value="删除"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
<?php
include_once ('admin_background_foot.php');
?>