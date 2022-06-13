<?php
include_once ("admin_background_head.php");
?>
<?php
$user_name = $_POST['username'];

include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM user_infor
WHERE name = '$user_name'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$count = 0;
?>
<table border="1" width="10" height="10" cellspacing="0" cellpadding="5">
    <tr>

        <th colspan="20" class="layui-bg-blue"  >防疫志愿者基本信息</th>
    </tr>
    <tr>
        <th>序号</th>
        <th>姓名</th>
        <th>头像</th>
        <th>密码</th>
        <th>性别</th>
        <th>手机号</th>
        <th>出生日期</th>
        <th>操作</th>
    </tr>
    <?php
    foreach ($infors as $infor) {
        $count ++;
        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $infor['name'];?></td>
            <td><img src="<?php echo $infor['path']; ?>"></td>
            <td><?php echo $infor['password'];?></td>
            <td><?php echo $infor['sex'];?></td>
            <td><?php echo $infor['phone'];?></td>
            <td><?php echo $infor['birthday'];?></td>
            <td><a href="admin_user_update_start.php?userid=<?php echo $infor['id']?>">编辑</a> <a href="admin_user_delete_start.php?userid=<?php echo $infor['id']?>">删除</a></td>
        </tr>
        <?php
    }
    ?>
</table>

