<?php
include_once('admin_background_head.php');
?>
<?php
include_once("conn.php");
$sql = <<<SQL
SELECT * FROM user_infor
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<div>
    <div id="container" style="height: 240px;width: 100%;"></div>
</div>
<script type="text/javascript">
    var dom = document.getElementById("container");//获取存放图形的容器
    var myChart = echarts.init(dom);
    var app = {};
    var option;
    option = {
        title: {
            text: '用户积分分布图'
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: [
                <?php
                $i = 0;
                foreach ($infors as $value){
                    echo '"';
                    echo $value['name'];
                    echo '"';

                    $i ++;
                    if($i < count($infors)){
                        echo ',';
                    }


                }
                ?>
            ]
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                data: [
                    <?php
                    $i = 0;
                    foreach ($infors as $value){

                        echo $value['integral'];


                        $i ++;
                        if($i < count($infors)){
                            echo ',';
                        }


                    }
                    ?>
                ],
                type: 'line',
                areaStyle: {}
            }
        ]
    };

    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }

</script>
<?php
$perpage = 3;
$total_num = count($infors);
$total_page = ceil($total_num / $perpage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_index = $perpage * ($page - 1);
$end_index = $perpage * $page - 1;
$end_index = min($end_index, $total_num - 1);
$count = 0;
?>
<div style="background-image: url(image/userinfor.jpg)">
    <div>
        <form action="admin_user_integral_search.php" method="post">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off"
                       class="layui-input">
            </div>
            <button type="button" class="layui-btn layui-btn-normal"><input type="submit" value="搜索"
                                                                            style="background-color: #33CCFF"></button>
        </form>
    </div>
    <table border="1" width="100%" height="100" cellspacing="0" cellpadding="5">
        <tr>

            <th colspan="20" class="layui-bg-blue">积分信息</th>
        </tr>
        <tr>
            <th>序号</th>
            <th>用户名</th>
            <th>电话</th>
            <th>年龄</th>
            <th>积分</th>
            <th>操作</th>
        </tr>
        <?php
        for ($i = $start_index; $i <= $end_index; $i++) {
            $count++;

            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $infors[$i]['name']; ?></td>
                <td><?php echo $infors[$i]['phone']; ?></td>
                <td><?php echo $infors[$i]['age']; ?></td>
                <td><?php echo $infors[$i]['integral']; ?></td>
                <td><a href="admin_user_integral_update_start.php?userid=<?php echo $infors[$i]['id'] ?>">编辑</a></td><!--进行get请求-->
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
        <a href="?page=<?php echo $pre_page; ?>">上一页</a>
        <?php
        $next_page = ($page + 1) > $total_page ? $total_page : ($page + 1);
        ?>
        <a href="?page=<?php echo $next_page; ?>">下一页</a>
        <form action="" method="get" class="free_page">
            <input type="text" name="page">
            <input type="submit" value="确定">
        </form>
    </div>
</div>




<?php
include_once('admin_background_foot.php');
?>
