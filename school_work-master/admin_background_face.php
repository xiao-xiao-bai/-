<?php
include_once("admin_background_head.php");
?>
<?php
include_once("conn.php");
//查数据库中男女性别的人数
$sql = <<<SQL
SELECT sex, COUNT(sex) 人数  from user_infor 
GROUP BY sex
SQL;
$query = mysqli_query($link, $sql);
if (!$query) {
    exit();
}
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
$sql2 = <<<SQL
select  name 姓名 ,age 年龄,integral 积分 from user_infor
SQL;
$query2 = mysqli_query($link, $sql2);
if (!$query2) {
    exit();
}
$info = mysqli_fetch_all($query2, MYSQLI_ASSOC);
$sex_n = $infors[0]['人数'];
$sex_s = $infors[1]['人数'];
?>
<div>
    <h1 align="center" style="font-size: 25px;font-weight: bold">滨城防疫志愿者管理平台</h1>
    <div class="showTime">当前时间：2020年3月17-0时54分14秒</div>
    <script>
        var t = null;
        t = setTimeout(time, 1000); //開始运行
        function time() {
            clearTimeout(t); //清除定时器
            dt = new Date();
            var y = dt.getFullYear();
            var mt = dt.getMonth() + 1;
            var day = dt.getDate();
            var h = dt.getHours(); //获取时
            var m = dt.getMinutes(); //获取分
            var s = dt.getSeconds(); //获取秒
            document.querySelector(".showTime").innerHTML =
                "当前时间：" +
                y +
                "年" +
                mt +
                "月" +
                day +
                "-" +
                h +
                "时" +
                m +
                "分" +
                s +
                "秒";
            t = setTimeout(time, 1000); //设定定时器，循环运行
        }
    </script>
    <div class="no">
        <div class="no-hd" style="height: 25px">
            <ul>
                <li style="font-size: 22px;color: blue"><?php echo($sex_n + $sex_s); ?></li>
                <li style="font-size: 22px;color: blue">1.9亿</li>
            </ul>
        </div>
        <div class="no-bd" style="height: 25px">
            <ul>
                <li style="font-size: 20px;color: black">本地志愿者人数</li>
                <li style="font-size: 20px;color: black">全国志愿者人数</li>
            </ul>
        </div>
        <div>
            <!--创建四个容器-->
            <div id="main" style="width: 420px;height:400px;float: left"></div>
            <div id="box" style="width: 730px; height:400px;float: left"></div>
            <div id="container" style="width: 300px;height:400px;float: left"></div>
            <div id="containers" style="width:100%;height: 240px;float: left;top: 50%"></div>
        </div>
    </div>
</div>
<!--商品统计-->
<?php
$sql = <<<SQL
SELECT * FROM product 
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
$array_1 = [];
$array_2 = [];
$array_3 = [];
$array_4 = [];
$i = 0;
foreach ($infors as $value) {
    $array_1[$i] = $value['name'];
    $array_2[$i] = $value['count'];
    $array_3[$i] = $value['sell'];

    $i++;
}
for ($i = 0; $i < count($array_3); $i++) {
    $array_4[$i] = $array_2[$i] - $array_3[$i];
}

?>
<script type="text/javascript">
    var dom = document.getElementById("main");//获取存放商品存销图的容器
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
            text: '商品存销图'
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
                    foreach ($array_1 as $value) {
                        echo '"';
                        echo $value;
                        echo '"';

                        $i++;
                        if ($i < count($array_1)) {
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
                name: '销量',
                type: 'bar',
                barGap: 0,
                label: labelOption,
                emphasis: {
                    focus: 'series'
                },
                data: [
                    <?php
                    $i = 0;
                    foreach ($array_3 as $value) {
                        echo '"';
                        echo $value;
                        echo '"';

                        $i++;
                        if ($i < count($array_4)) {
                            echo ',';
                        }


                    }
                    ?>
                ]
            },
            {
                name: '存量',
                type: 'bar',
                label: labelOption,
                emphasis: {
                    focus: 'series'
                },
                data: [
                    <?php
                    $i = 0;
                    foreach ($array_4 as $value) {
                        echo '"';
                        echo $value;
                        echo '"';

                        $i++;
                        if ($i < count($array_4)) {
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

<!--中国地图-->
<script>
    // 初始化echarts实例
    var myEcharts = echarts.init(document.getElementById("box"));//初始化中国地图
    var option = {
        title: {  //标题样式
            text: '全国志愿者人数',
            x: "center",
            textStyle: {
                fontSize: 18,
                color: "black"
            },
        },
        tooltip: {  //这里设置提示框
            trigger: 'item',  //数据项图形触发
            backgroundColor: "white",  //提示框浮层的背景颜色。
            //字符串模板(地图): {a}（系列名称），{b}（区域名称），{c}（合并数值）,{d}（无）
            formatter: '地区：{b}<br/>志愿者人数：{c}'
        },
        visualMap: {//视觉映射组件
            top: 'center',
            left: 'left',
            min: 10,
            max: 20000000,
            text: ['High', 'Low'],
            realtime: false,  //拖拽时，是否实时更新
            calculable: true,  //是否显示拖拽用的手柄
            inRange: {
                color: ['yellow', 'red', 'orangered']
            }
        },
        series: [
            {
                name: '志愿者人数',
                type: 'map',
                mapType: 'china',
                roam: false,//是否开启鼠标缩放和平移漫游
                itemStyle: {//地图区域的多边形 图形样式
                    normal: {//是图形在默认状态下的样式
                        label: {
                            show: true,//是否显示标签
                            textStyle: {
                                color: "black"
                            }
                        }
                    },
                    zoom: 1,  //地图缩放比例,默认为1
                    emphasis: {//是图形在高亮状态下的样式,比如在鼠标悬浮或者图例联动高亮时
                        label: {show: true}
                    }
                },
                top: "2%",//组件距离容器的距离
                data: [
                    {name: '北京', value: 4416800},
                    {name: '天津', value: 2022200},
                    {name: '上海', value: 4845100},
                    {name: '重庆', value: 6099700},
                    {name: '河北', value: 9489100},
                    {name: '河南', value: 12309000},
                    {name: '云南', value: 4552100},
                    {name: '辽宁', value: 4552900},
                    {name: '黑龙江', value: 3406900},
                    {name: '湖南', value: 1897200},
                    {name: '安徽', value: 10800100},
                    {name: '山东', value: 15397000},
                    {name: '新疆', value: 2075300},
                    {name: '江苏', value: 16280700},
                    {name: '浙江', value: 9481900},
                    {name: '江西', value: 4134900},
                    {name: '湖北', value: 8589300},
                    {name: '广西', value: 8380300},
                    {name: '甘肃', value: 2280400},
                    {name: '山西', value: 3439700},
                    {name: '内蒙古', value: 2336900},
                    {name: '陕西', value: 2950400},
                    {name: '吉林', value: 2411500},
                    {name: '福建', value: 5393800},
                    {name: '贵州', value: 4711200},
                    {name: '广东', value: 10522200},
                    {name: '青海', value: 499800},
                    {name: '西藏', value: 105700},
                    {name: '四川', value: 12278400},
                    {name: '宁夏', value: 1108700},
                    {name: '海南', value: 1046700},
                    {name: '台湾', value: 1050000},
                    {name: '香港', value: 1300000},
                    {name: '澳门', value: 300000}
                ]
            }
        ]
    };
    // 使用刚指定的配置项和数据显示图表。
    myEcharts.setOption(option);
</script>
<!--年龄分布-->

<script type="text/javascript">
    var dom = document.getElementById("container");//获取存放年龄分布图的容器
    var myChart = echarts.init(dom);
    var app = {};
    var option;
    option = {
        title: {
            text: '性别分布'
        },
        tooltip: {
            trigger: 'item'
        },
        legend: {
            top: '5%',
            left: 'center'
        },
        series: [
            {
                name: 'Access From',
                type: 'pie',
                radius: ['40%', '70%'],
                avoidLabelOverlap: false,
                label: {
                    show: false,
                    position: 'center'
                },
                emphasis: {
                    label: {
                        show: true,
                        fontSize: '40',
                        fontWeight: 'bold'
                    }
                },
                labelLine: {
                    show: false
                },
                data: [
                    {value: <?php echo $sex_n;?>, name: '男'},
                    {value: <?php echo $sex_s;?>, name: '女'},

                ]
            }
        ]
    };

    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }

</script>
<!--年龄分布-->

<script type="text/javascript">
    var dom = document.getElementById("containers");
    var myChart = echarts.init(dom);
    var app = {};
    var option;
    option = {
        title: {
            text: '年龄分布图'
        },
        xAxis: {
            type: 'category',
            data: [
                <?php
                $i = 0;
                foreach ($info as $value) {
                    echo '"';
                    echo $value['姓名'];
                    echo '"';

                    $i++;
                    if ($i < count($info)) {
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
                    foreach ($info as $value) {
                        echo $value['年龄'];
                        $i++;
                        if ($i < count($info)) {
                            echo ',';
                        }
                    }

                    ?>
                ],
                type: 'line'
            }
        ]
    };

    if (option && typeof option === 'object') {
        myChart.setOption(option);
    }
</script>
<?php
include_once("admin_background_foot.php");
?>
