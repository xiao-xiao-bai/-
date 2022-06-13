<?php
include_once ("admin_background_head.php");
?>
<?php
include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM product
order by id desc
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$array_1 = [];
$array_2 = [];
$array_3 = [];
$i = 0;
foreach ($infors as $value){
    $array_1[$i] = $value['name'];
    $array_2[$i] = $value['money'];
    $array_3[$i] = $value['count'];
    $i ++;
}
?>
<div>
    <?php
    $perpage = 2;
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

    <div id="container" style="height: 250px;width: 100%;"></div>
</div>

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
            text: '商品价格和总量图'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: ['Forest', 'Steppe', 'Desert', 'Wetland']
        },
        toolbox: {
            show: true,
            orient: 'vertical',
            left: 'right',
            top: 'center',
            feature: {
                mark: { show: true },
                dataView: { show: true, readOnly: false },
                magicType: { show: true, type: ['line', 'bar', 'stack'] },
                restore: { show: true },
                saveAsImage: { show: true }
            }
        },
        xAxis: [
            {
                type: 'category',
                axisTick: { show: false },
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
                name: '价格',
                type: 'bar',
                barGap: 0,
                label: labelOption,
                emphasis: {
                    focus: 'series'
                },
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
                ]
            },
            {
                name: '总量',
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
                        if($i < count($array_3)){
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


