<?php
include_once ("admin_background_head.php");
?>
<?php
$user_name = $_POST['username'];

include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM thing
WHERE name = '$user_name'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$count = 0;
?>
<?php
$perpage = 5;
$total_num = count($infors);
$total_page = ceil($total_num / $perpage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start_index = $perpage * ($page - 1);
$end_index = $perpage * $page - 1;
$end_index = min($end_index,$total_num - 1);
$count = 0;
?>
<div class="voluntary_list">
    <table border="1" width="100%" height="100" cellspacing="0" cellpadding="5">
        <tr>

            <th colspan="20" class="layui-bg-blue"  >最美志愿者信息</th>
        </tr>
        <tr>
            <th>序号</th>
            <th>用户名</th>
            <th>电话号</th>
            <th>主要事迹</th>
            <th>操作</th>
        </tr>
        <?php
        for ($i = $start_index;$i <= $end_index;$i ++){
            $count ++;

            ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $infors[$i]['name'];?></td>
                <td><?php echo $infors[$i]['phone'];?></td>
                <td><?php echo $infors[$i]['things'];?></td>
                <td><a href="admin_voluntary_style_update_start.php?userid=<?php echo $infors[$i]['id']?>">编辑</a> <a href="admin_voluntary_style_delete_start.php?userid=<?php echo $infors[$i]['id']?>">删除</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="page">
        <a href="?page=1">首页</a>
        <?php
        $pre_page = ($page - 1) < 1 ? 1 : ($page - 1);
        ?>
        <a href="?page=<?php echo $pre_page;?>">上一页</a>
        <?php
        $next_page = ($page + 1) > $total_page ? $total_page : ($page + 1);
        ?>
        <a href="?page=<?php echo $next_page;?>">下一页</a>
        <form action="" method="get" class="free_page">
            <input type="text" name="page">
            <input type="submit" value="确定">
        </form>
    </div>
</div>
<?php
include_once ('admin_background_foot.php');
?>