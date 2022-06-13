<?php
include_once('admin_background_head.php');
?>
<?php
//查询视频信息的SQL语句
include_once("conn.php");//连接数据库的文件
$sql = <<<SQL
SELECT * FROM video
order by id desc
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
$array_1 = [];
$array_2 = [];
$i = 0;
foreach ($infors as $infor){
    $array_1[$i] = $infor['video_name'];
    $array_2[$i] = $infor['video_count'];
    $i ++;
}
?>
<?php
$perpage = 4;
$total_num = count($infors);
$total_page = ceil($total_num / $perpage);
$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start_index = $perpage * ($page - 1);
$end_index = $perpage * $page - 1;
$end_index = min($end_index, $total_num - 1);
$count = 0;
?>

<div style="background-image: url(image/userinfor.jpg)">
    <table border="1" width="100%" height="100" cellspacing="0" cellpadding="5">
        <tr>

            <th colspan="20" class="layui-bg-blue">视频信息</th>
        </tr>
        <tr>
            <th>序号</th>
            <th>名称</th>
            <th>操作</th>
        </tr>
        <?php
        for ($i = $start_index; $i <= $end_index; $i++) {
            $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $infors[$i]['video_name']; ?></td>
                <td>
                    <a href="admin_video_delete_end.php?videoid=<?php echo $infors[$i]['id'] ?>">删除</a>
                    <a href="admin_video_update_start.php?videoid=<?php echo $infors[$i]['id'] ?>">修改</a>
                </td>
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
<div class="video_chart">
    <div id="container" style="width: 100%;height: 230px"></div>

</div>
<script type="text/javascript">
    var dom = document.getElementById("container");
    var myChart = echarts.init(dom);
    var app = {};
    var option;
    option = {
        title: {
            text: '视频播放量统计图'
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: [
                <?php
                $i = 0;
                foreach ($array_1 as $value){
                    echo '"';
                    echo $value;
                    echo '"';

                    $i ++;
                    if($i < count($array_1)){
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
                    foreach ($array_2 as $value) {

                        echo $value;


                        $i++;
                        if ($i < count($array_2)) {
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
include_once('admin_background_foot.php');
?>
