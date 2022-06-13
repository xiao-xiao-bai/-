<?php
include_once ("admin_background_head.php");
?>
<?php
$productname = $_POST['productname'];
include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM product
WHERE name = '{$productname}'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$count = 0;
?>
<?php
$perpage = 3;
$total_num = count($infors);
$total_page = ceil($total_num / $perpage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start_index = $perpage * ($page - 1);
$end_index = $perpage * $page - 1;
$end_index = min($end_index,$total_num - 1);
$count = 0;
?>

<div style="background-image: url(image/userinfor.jpg)">
    <div>
        <form action="admin_product_search.php" method="post">
            <label class="layui-form-label">商品名</label>
            <div class="layui-input-inline">
                <input type="text" name="productname" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
            <button type="button" class="layui-btn layui-btn-normal"><input type="submit" value="搜索" style="background-color: #33CCFF"></button>
        </form>
    </div>
    <table border="1" width="100%" height="100" cellspacing="0" cellpadding="5">
        <tr>

            <th colspan="20" class="layui-bg-blue"  >商品信息</th>
        </tr>
        <tr>
            <th>序号</th>
            <th>名称</th>
            <th>图片</th>
            <th>费用</th>
            <th>销量</th>
            <th>存量</th>
            <th>总量</th>
            <th>操作</th>
        </tr>
        <?php
        for ($i = $start_index;$i <= $end_index;$i ++){
            $count ++;

            ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $infors[$i]['name'];?></td>
                <td><img style="width: 80px;height: 80px" src="<?php echo $infors[$i]['path']; ?>"></td>
                <td><?php echo $infors[$i]['money'];?></td>
                <td><?php echo $infors[$i]['sell'];?></td>
                <td><?php echo ($infors[$i]['count'] - $infors[$i]['sell']);?></td>
                <td><?php echo $infors[$i]['count'];?></td>
                <td><a href="admin_product_infor_update_face.php?productid=<?php echo $infors[$i]['id']?>">编辑</a> <a href="admin_product_infor_delete_start.php?productid=<?php echo $infors[$i]['id']?>">删除</a></td>
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

