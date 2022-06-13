<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])) {
    echo "<script>alert('未登录');location='../login.php';</script>";
} elseif (time() - $_SESSION['time'] < 3600) {
    include_once('conn.php');
    $_SESSION['time'] = time();
    $name = $_SESSION['user'];
    $sql = <<<SQL
select path from user_infor
where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $image = $infors[0]['path'];
    ?>
    <?php
    include_once('frontend_heads.php');
    ?>

    <?php

    ?>
    <?php
//查询数据库
    $sql = <<<SQL
select * from news
order by id desc
SQL;
    $query = mysqli_query($link, $sql);//
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $sql3 =<<<SQL
SELECT * FROM user_infor,thing
where user_infor.name = thing.name
SQL;
    $query3 = mysqli_query($link, $sql3);
    $infors3 = mysqli_fetch_all($query3, MYSQLI_ASSOC);

    ?>
    <div class="middle" style="background-image: url('images/2.png');overflow:hidden;">
        <div class="layui-carousel" id="test10" style="height: 100px;float: left">
            <div carousel-item="">
                <div><img src="../image/slideshow/1.jpg" style="width: 700px;height: 400px"></div>
                <div><img src="../image/slideshow/8.jpg" style="width: 700px;height: 400px"></div>
                <div><img src="../image/slideshow/3.jpg" style="width: 700px;height: 400px"></div>
                <div><img src="../image/slideshow/4.jpg" style="width: 700px;height: 400px"></div>
                <div><img src="../image/slideshow/9.jpg" style="width: 700px;height: 400px"></div>
            </div>
        </div>
        <div class="news" style="width: 600px;height: 400px;float: right;margin-left: 10px">
            <div class="title"><h2 class="title"><img src="./images/4.png" alt="" style="margin-right: 6px; vertical-align: middle;"><p style="display: inline-block; margin-left: -10px;font-size: 28px">信息动态</p><span style="background-color: #cd0a0a;float: right;font-size: 16px;margin-right: 50px"><a href="news_face.php" style="color: white">>>更多新闻</a></span></h2></div>
            <hr class="layui-border-red">
            <?php
            for ($i = 0; $i <= 4; $i++) {
                ?>
                <div style="font-size: 23px;overflow: hidden">
                    <span style="float:left;"><li class="layui-badge"></li><?php echo $infors[$i]['title']; ?></span>
                    <span style="float: right;"><?php echo $infors[$i]['time']; ?></span>
                </div>
                <div>
                    <p style="float: right"><a href="news_end.php?newsid=<?php echo $infors[$i]['id'] ?>">>>详情</a></p>
                </div>
                <hr style="color: black">

                <?php
            }
            ?>

        </div>
        <!-- -->
        <a href="#" class="btn" style="text-align: center;padding-top: 5px">top</a>
        <!--在下-->
        <div class="below">
            <div class="img">
                <img src="../image/frontend/blewo5.jpg" style="width: 100%;height: 120px">
            </div>
        </div>
        <div class="chart" style="overflow: hidden;">
            <div class="max">
                <div style="float: left;border: 1px  #999;width: 900px;height: 500px;">
                    <div class="showTime">当前时间：2020年3月17-0时54分14秒</div>
                    <div id="box" style="width: 100%;height: 500px"></div>
                </div>
                <div class="right" style="float: left">
                    <h2 align="center" style="font-size: 45px;width: 100%;;font-weight: bold;" class="layui-bg-red">
                        全国疫情动态信息</h2>
                    <hr class="layui-bg-green" style="border: 3px solid green ">
                    <ul class="layui-bg-green">
                        <li style="font-size: 30px">累计确诊人数:<span id="dome1" style="font-size: 40px"></span>人</li>
                        <hr class="layui-border-green">
                        <li style="font-size: 30px">累计死亡人数:<span id="dome2" style="font-size: 40px"></span>人</li>
                        <hr class="layui-border-green">
                        <li style="font-size: 30px">现存确诊人数:<span id="dome3" style="font-size: 40px"></span>人</li>
                        <hr class="layui-border-green">
                        <li style="font-size: 30px">现在治愈人数:<span id="dome4" style="font-size: 40px"></span>人</li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="float: left">
            <h2 class="title"><img src="./images/4.png" alt="" style="margin-right: 6px; vertical-align: middle;"><p style="display: inline-block; margin-left: -10px;font-size: 28px">志愿风采</p>  <span style="background-color: #cd0a0a;float: right;font-size: 18px;margin-right: 80px"><a href="Voluntary_style_start.php" style="color: white">>>更多最美志愿者</a></span></h2>
            <div class="dome1" style="width:1400px;height: 390px;padding-left: 80px;overflow:hidden;">
            <?php
            for ($i = 0; $i < 5; $i++) {
                if($i % 2 != 0){
                ?>

                        <div class="home_sp_box" style="height: 340px">
                            <div>
                                <a href="#" target="_blank">
                                    <img src="<?php echo '.' . $infors3[$i]['path']; ?>" width="220" height="220">
                                </a>
                            </div>
                            <div class="bt">
                                <h2 style="color: red">最美志愿者</h2>
                                <a href="#">名字:<?php echo $infors3[$i]['name']; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;性别:<?php echo $infors3[$i]['sex']; ?></a>
                                <p>出生日期:<?php echo $infors3[$i]['birthday']; ?></p>
                            </div>
                            <div class="jfdh" style="margin-top: 20px;font-size: 18px">
                                &nbsp;&nbsp;
                                <a style="padding-left: 130px" href="Voluntary_style_end.php?voluntaryid=<?php echo $infors3[$i]['id'] ?>">>>详情</a>
                            </div>


                        </div>
                        <?php
                        }else{
                        ?>

                        <div class="home_sp_box" style="height: 340px">

                            <div class="bt">
                                <h2 style="color: red">最美志愿者</h2>
                                <a href="#">名字:<?php echo $infors3[$i]['name']; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;性别:<?php echo $infors3[$i]['sex']; ?></a>
                                <p>出生日期:<?php echo $infors3[$i]['birthday']; ?></p>
                            </div>
                            <div style="margin-top:20px">
                                <a href="#" target="_blank" >
                                    <img src="<?php echo '.' . $infors3[$i]['path']; ?>" width="220" height="220">
                                </a>
                            </div>
                            <div class="jfdh" style="margin-top: 0px;font-size: 18px">
                                &nbsp;&nbsp;
                                <a style="padding-left: 130px" href="Voluntary_style_end.php?voluntaryid=<?php echo $infors3[$i]['id'] ?>">>>详情</a>
                            </div>



                        </div>
                <?php
                }
                ?>
                <?php

            }
            ?>

                    </div>



        </div>
        <?php
        $sql3 =<<<SQL
select * from prevention_project
SQL;
        $query3 = mysqli_query($link, $sql3);
        $infors3 = mysqli_fetch_all($query3, MYSQLI_ASSOC);

        ?>
        <div style="float: left">
            <h2 class="title"><img src="./images/4.png" alt="" style="margin-right: 6px; vertical-align: middle;"><p style="display: inline-block; margin-left: -10px;font-size: 28px">志愿项目</p>  <span style="background-color: #cd0a0a;float: right;font-size: 18px;margin-right: 80px"><a href="prevention_project.php" style="color: white">>>更多志愿项目</a></span></h2>
            <div class="dome1" style="width:1400px;padding-left: 80px;overflow:hidden;">
                <?php
                for ($i = 0; $i < 5; $i++) {
                    if($i % 2 != 0){
                        ?>

                        <div class="home_sp_box" style="height: 340px;">
                            <div>
                                <a href="#" target="_blank">
                                    <img src="<?php echo '.' . $infors3[$i]['path']; ?>" width="220" height="220">
                                </a>
                            </div>
                            <div class="bt">
                                <h2 style="color: red">志愿项目</h2>
                                <a href="#">名称:<?php echo $infors3[$i]['title']; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <p>活动时间:<?php echo $infors3[$i]['time']; ?></p>
                            </div>
                            <div class="jfdh" style="margin-top: 50px;font-size: 18px">
                                &nbsp;&nbsp;
                                <a style="padding-left: 130px" href="prevention_project_ends.php?id=<?php echo $infors3[$i]['id'] ?>">>>详情</a>
                            </div>


                        </div>
                        <?php
                    }else{
                        ?>

                        <div class="home_sp_box" style="height: 340px;">

                            <div class="bt">
                                <h2 style="color: red">志愿项目</h2>
                                <a href="#">名称:<?php echo $infors3[$i]['title']; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;</a>
                                <p>活动时间:<?php echo $infors3[$i]['time']; ?></p>
                            </div>
                            <div style="margin-top: 20px">
                                <a href="#" target="_blank" >
                                    <img src="<?php echo '.' . $infors3[$i]['path']; ?>" width="220" height="220">
                                </a>
                            </div>
                            <div class="jfdh" style="margin-top: 30px;font-size: 18px">
                                &nbsp;&nbsp;
                                <a style="padding-left: 130px;" href="prevention_project_ends.php?id=<?php echo $infors3[$i]['id'] ?>">>>详情</a>
                            </div>


                        </div>
                        <?php
                    }
                    ?>
                    <?php

                }
                ?>

            </div>



        </div>



    </div>

    <?php
    include_once('frontend_foots.php');
    ?>
    <!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
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
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myEcharts = echarts.init(document.getElementById("box"));

        function setEchart(data) {
            var option = {
                title: {  //标题样式
                    text: '中国实时疫情图',
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
                    formatter: '地区：{b}<br/>累计确诊人数：{c}'
                },
                visualMap: {//视觉映射组件
                    top: 'center',
                    left: 'left',
                    min: 10,
                    max: 5000,
                    text: ['High', 'Low'],
                    realtime: false,  //拖拽时，是否实时更新
                    calculable: true,  //是否显示拖拽用的手柄
                    inRange: {
                        color: ['yellow', 'red', 'orangered']
                    }
                },
                series: [
                    {
                        name: '模拟数据',
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
                            zoom: 1.5,  //地图缩放比例,默认为1
                            emphasis: {//是图形在高亮状态下的样式,比如在鼠标悬浮或者图例联动高亮时
                                label: {show: true}
                            }
                        },
                        top: "3%",//组件距离容器的距离
                        data: data
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            myEcharts.setOption(option);
        }

        //========================接口请求数据
        $.ajax({
            type: 'get',
            url: 'https://interface.sina.cn/news/wap/fymap2020_data.d.json',
            //  url: 'https://view.inews.qq.com/g2/getOnsInfo?name=disease_h5',
            dataType: 'jsonp',
            success: function (res) {
                console.log(res.data);

                let deathtotals = res.data.deathtotal;//累计死亡

                // let obj = JSON.parse(res.data)
                //
                let confirm = res.data.gntotal;//累计确诊人数
                // let dead = obj.areaTree[0].total.dead;//累计死亡人数
                let nowconfirm = res.data.econNum//现存确诊人数
                let curetotal = res.data.curetotal//治愈人数
                // let noInfect = obj.chinaTotal.noInfect;//无症状感染者人数
                // let arr = obj.areaTree[0].children;//每个省的确证人数
                   let arr = res.data.list;//获取全国省份的累计确诊人数
                let mapArr = [];
                for (let i = 0; i < arr.length; i++) {
                    let item = {
                        name: arr[i].name,
                        value: arr[i].value,
                    }
                    mapArr.push(item)
                }
                setEchart(mapArr)
                var element1 = document.getElementById("dome1");
                element1.innerHTML = confirm;
                var element = document.getElementById("dome2");
                element.innerHTML = deathtotals;
                var element2 = document.getElementById("dome3");
                element2.innerHTML = nowconfirm;
                var element3 = document.getElementById("dome4");
                element3.innerHTML = curetotal;


            }
        })

    </script>
    <script>
        layui.use(['carousel', 'form'], function () {
            var carousel = layui.carousel
                , form = layui.form;

            //常规轮播
            carousel.render({
                elem: '#test1'
                , arrow: 'always'
            });

            //改变下时间间隔、动画类型、高度
            carousel.render({
                elem: '#test2'
                , interval: 1800
                , anim: 'fade'
                , height: '120px'
            });

            //设定各种参数
            var ins3 = carousel.render({
                elem: '#test3'
            });
            //图片轮播
            carousel.render({
                elem: '#test10'
                , width: '700px'
                , height: '400px'
                , interval: 5000
            });

            //事件
            carousel.on('change(test4)', function (res) {
                console.log(res)
            });

            var $ = layui.$, active = {
                set: function (othis) {
                    var THIS = 'layui-bg-normal'
                        , key = othis.data('key')
                        , options = {};

                    othis.css('background-color', '#5FB878').siblings().removeAttr('style');
                    options[key] = othis.data('value');
                    ins3.reload(options);
                }
            };

            //监听开关
            form.on('switch(autoplay)', function () {
                ins3.reload({
                    autoplay: this.checked
                });
            });

            $('.demoSet').on('keyup', function () {
                var value = this.value
                    , options = {};
                if (!/^\d+$/.test(value)) return;

                options[this.name] = value;
                ins3.reload(options);
            });

            //其它示例
            $('.demoTest .layui-btn').on('click', function () {
                var othis = $(this), type = othis.data('type');
                active[type] ? active[type].call(this, othis) : '';
            });
        });
    </script>

    <script>
        //JS
        layui.use(['element', 'layer', 'util'], function () {
            var element = layui.element
                , layer = layui.layer
                , util = layui.util
                , $ = layui.$;

            //头部事件
            util.event('lay-header-event', {
                //左侧菜单事件
                menuLeft: function (othis) {
                    layer.msg('展开左侧菜单的操作', {icon: 0});
                }
                , menuRight: function () {
                    layer.open({
                        type: 1
                        , content: '<div style="padding: 15px;">处理右侧面板的操作</div>'
                        , area: ['260px', '100%']
                        , offset: 'rt' //右上角
                        , anim: 5
                        , shadeClose: true
                    });
                }
            });

        });
    </script>
    <?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
