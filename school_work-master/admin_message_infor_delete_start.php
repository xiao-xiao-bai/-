<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$id = $_GET["messageid"];
$sql =<<<SQL
SELECT * FROM message
WHERE id= $id
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$message_id = $infors[0]['id'];
$message_user = $infors[0]['user'];
$message_content = $infors[0]['content'];
?>
<div>
    <form action="admin_message_infor_delete_end.php" method="post">
        <div class="layui-bg-green"  style="width: 100%;height: 40px">
            <h1 class="layui-bg-green"   align="center" style="font-size: 25px;">删除<?php echo $message_user;?>的留言信息</h1>
        </div>
        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>编号:</td>
                    <td>
                        <input type="text" name="productid"  disabled value="<?php echo $infors[0]['id']; ?>">
                        <input type="text" id="messageid" name="messageid" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>内容:</td>
                    <td>
                        <input type="text" name="messagecontent"  disabled value="<?php echo $message_content; ?>">
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
?>/