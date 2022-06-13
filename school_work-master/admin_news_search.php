<?php
include_once ("admin_background_head.php");
?>
<?php
$news_title = $_POST['news_title'];
include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM news
WHERE title = '$news_title'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$count = 0;
?>
<table border="1" width="100%" height="100" cellspacing="0" cellpadding="5">
    <tr>

        <th colspan="20" class="layui-bg-blue"  >新闻信息</th>
    </tr>
    <tr>
        <th>序号</th>
        <th>标题</th>
        <th>时间</th>
        <th>操作</th>
    </tr>
    <?php
    foreach ($infors as $infor) {
        $count ++;

        ?>
        <tr>
            <td><?php echo $count;?></td>
            <td><?php echo $infor['title'];?></td>
            <td><?php echo $infor['time'];?></td>
            <td><a href="admin_news_infor_update_start.php?userid=<?php echo $infors[$i]['id']?>">编辑</a> <a href="admin_user_delete_start.php?userid=<?php echo $infors[$i]['id']?>">删除</a></td>
        </tr>
        <?php
    }
    ?>
</table>


