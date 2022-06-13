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
    $sql = <<<SQL
select * from product
order by id desc
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>
    <?php
    include_once('frontend_heads.php');
    ?>
    <div id="lujing" style="height: 50px;font-size: 20px">
        你目前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a>积分中心</a>
    </div>
    <a href="#" class="btn" style="text-align: center;padding-top: 5px">top</a>
    <div class="big_bg">
        <div class="mainlie2">
            <div class="good2">
                <a href="" target="_blank">
                    <img src="images/fl_02.jpg" alt="#" width="244" height="496">
                </a>
            </div>
            <div class="good3">
                <a href="" target="_blank">
                    <img src="images/fl_03.jpg" alt="#" width="495" height="244">
                </a>
            </div>
            <div class="good4">
                <a href="" target="_blank">
                    <img src="images/fl_04.jpg" alt="#" width="242" height="244">
                </a>
            </div>
            <div class="good5">
                <a href="" target="_blank">
                    <img src="images/fl_05.jpg" alt="#" width="495" height="244">
                </a>
            </div>
            <div class="good6">
                <a href="" target="_blank">
                    <img src="images/fl_06.jpg" alt="#" width="242" height="244">
                </a>
            </div>
        </div>

        <div class="w1000">
            <div class="biaoti2">
                <p class="f22" style="width: 220px;line-height: 50px;float: left">&nbsp;&nbsp;新品上架</p>
                <a href="integral_show.php" class="home_more">更多商品&nbsp;&nbsp;>>&nbsp;&nbsp;</a>
            </div>
            <div style="width: 1000px;overflow: hidden">
                <?php
                for ($i = 0; $i < 4; $i++) {
                    ?>
                    <div style="width:1024px">
                        <div class="home_sp_box">
                            <div>
                                <a href="#" target="_blank">
                                    <img src="<?php echo '.' . $infors[$i]['path']; ?>" width="220" height="220">
                                </a>
                            </div>
                            <div class="bt">
                                <a href="#">名字:<?php echo $infors[$i]['name']; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;类型:<?php echo $infors[$i]['type']; ?></a>
                                <p>库存:<?php echo($infors[$i]['count'] - $infors[$i]['sell']); ?></p>
                            </div>
                            <div class="jfdh">
                                <p>
                                    积分
                                    <span class="f18 col_red fb"><?php echo $infors[$i]['money'] ?></span>
                                    分
                                    &nbsp;&nbsp;
                                    <a class="buy_btn f1"
                                       href="integral_center_end.php?productid=<?php echo $infors[$i]['id'] ?>">立即兑换</a>
                            </div>


                        </div>

                    </div>
                    <?php
                }
                ?>
                <div class="w1000">
                    <img src="images/mor.jpg" width="998" height="113">

                </div>
            </div>


        </div>

    </div>

    <?php
    include_once('frontend_foots.php');
    ?>
    <?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
