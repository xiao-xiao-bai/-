<?php
include_once('conn.php');
?>
<?php
include_once('admin_background_head.php');
?>
<?php
$sql = <<<SQL
SELECT * FROM user_infor
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
$array_1 = [];
$array_2 = [];
$array_3 = [];
$array_4 = [];
$i = 0;
//存放用户名和早，中，晚的体温数据
foreach ($infors as $infor) {
    $array_1[$i] = $infor['name'];
    $array_2[$i] = $infor['Morning'];
    $array_3[$i] = $infor['Noon'];
    $array_4[$i] = $infor['Night'];
    $i ++;
}

?>

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
        <form action="admin_warm_user_infor_search.php" method="post">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" name="username" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
            </div>
            <button type="button" class="layui-btn layui-btn-normal"><input type="submit" value="搜索" style="background-color: #33CCFF"></button>
        </form>
    </div>
    <table border="1" width="100%" height="100" cellspacing="0" cellpadding="5">
        <tr>

            <th colspan="20" class="layui-bg-blue">志愿者体温信息</th>
        </tr>
        <tr>
            <th>序号</th>
            <th>用户</th>
            <th>phone</th>
            <th>Morning</th>
            <th>Noon</th>
            <th>Night</th>
        </tr>
        <?php
        for ($i = $start_index; $i <= $end_index; $i++) {
            $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $infors[$i]['name']; ?></td>
                <td><?php echo $infors[$i]['phone'];?></td>
                <td><?php echo $infors[$i]['Morning']; ?></td>
                <td><?php echo $infors[$i]['Noon']; ?></td>
                <td><?php echo $infors[$i]['Night']; ?></td>
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
<div id="container" style="width: 100%;height: 295px;font-size: 18px"></div>
<script type="text/javascript">
    var dom = document.getElementById("container");//获取存放图形的容器
    var myChart = echarts.init(dom);
    var app = {};
    var option;
    const posList = [
        'left',
        'right',
        'top',
        'bottom',
        'inside',
        'insideTop',
        'insideLeft',
        'insideRight',
        'insideBottom',
        'insideTopLeft',
        'insideTopRight',
        'insideBottomLeft',
        'insideBottomRight'
    ];
    app.configParameters = {
        rotate: {
            min: -90,
            max: 90
        },
        align: {
            options: {
                left: 'left',
                center: 'center',
                right: 'right'
            }
        },
        verticalAlign: {
            options: {
                top: 'top',
                middle: 'middle',
                bottom: 'bottom'
            }
        },
        position: {
            options: posList.reduce(function (map, pos) {
                map[pos] = pos;
                return map;
            }, {})
        },
        distance: {
            min: 0,
            max: 100
        }
    };
    app.config = {
        rotate: 90,
        align: 'left',
        verticalAlign: 'middle',
        position: 'insideBottom',
        distance: 15,
        onChange: function () {
            const labelOption = {
                rotate: app.config.rotate,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                position: app.config.position,
                distance: app.config.distance
            };
            myChart.setOption({
                series: [
                    {
                        label: labelOption
                    },
                    {
                        label: labelOption
                    },
                    {
                        label: labelOption
                    },
                    {
                        label: labelOption
                    }
                ]
            });
        }
    };
    const labelOption = {
        show: true,
        position: app.config.position,
        distance: app.config.distance,
        align: app.config.align,
        verticalAlign: app.config.verticalAlign,
        rotate: app.config.rotate,
        formatter: '{c}  {name|{a}}',
        fontSize: 16,
        rich: {
            name: {}
        }
    };
    option = {
        title: {
            text: '志愿者一日体温登记数据图'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: ['Morning', 'Noon', 'Night']
        },
        toolbox: {
            show: true,
            orient: 'vertical',
            left: 'right',
            top: 'center',
            feature: {
                mark: {show: true},
                dataView: {show: true, readOnly: false},
                magicType: {show: true, type: ['line', 'bar', 'stack']},
                restore: {show: true},
                saveAsImage: {show: true}
            }
        },
        xAxis: [
            {
                type: 'category',
                axisTick: {show: false},
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
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                name: 'Morning',
                type: 'bar',
                barGap: 0,
                label: labelOption,
                emphasis: {
                    focus: 'series'
                },
                data: [
                    <?php
                    $i = 0;
                    foreach ($array_2 as $value){
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
            {
                name: 'Noon',
                type: 'bar',
                label: labelOption,
                emphasis: {
                    focus: 'series'
                },
                data: [
                    <?php
                    $i = 0;
                    foreach ($array_3 as $value){
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
            {
                name: 'Night',
                type: 'bar',
                label: labelOption,
                emphasis: {
                    focus: 'series'
                },
                data: [
                    <?php
                    $i = 0;
                    foreach ($array_4 as $value){
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
        ]
    };

    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }

</script>
<?php
include_once('admin_background_foot.php');
?>
