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
    <?php
    $perpage = 8;
    $total_num = count($infors);
    $total_page = ceil($total_num / $perpage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $start_index = $perpage * ($page - 1);
    $end_index = $perpage * $page - 1;
    $end_index = min($end_index, $total_num - 1);
    $count = 0;
    ?>

    <div id="lujing" style="height: 50px;font-size: 20px">
        你目前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a href="integral_center_face.php">积分中心</a><i class="layui-icon layui-icon-next"></i><a>所有商品</a>
    </div>
    <div class="big_bg">
        <div style="height: 290px;"></div>
        <div class="w1000">
            <div class="biaoti2">
                <p class="f22" style="width: 220px;line-height: 50px;float: left">&nbsp;&nbsp;所用商品</p>
            </div>
            <div style="width: 1000px;overflow: hidden">

                <?php

                for ($i = $start_index; $i <= $end_index; $i++) {
                    $j = 0;
                    ?>
                    <div style="width:1024px">
                        <div class="home_sp_box">
                            <div>
                                <a href="#" target="_blank">
                                    <img src="<?php echo '.' . $infors[$i + $j * 4]['path']; ?>" width="220" height="220">
                                </a>
                            </div>
                            <div class="bt">
                                <a href="#">名字:<?php echo $infors[$i + $j * 4]['name']; ?>
                                    &nbsp;&nbsp;&nbsp;&nbsp;类型:<?php echo $infors[$i + $j * 4]['type']; ?></a>
                                <p>库存:<?php echo($infors[$i]['count'] - $infors[$i + $j * 4]['sell']); ?></p>
                            </div>
                            <div class="jfdh">
                                <p>
                                    积分
                                    <span class="f18 col_red fb"><?php echo $infors[$i + $j * 4]['money'] ?></span>
                                    分
                                    &nbsp;&nbsp;
                                    <a class="buy_btn f1"
                                       href="integral_center_end.php?productid=<?php echo $infors[$i + $j * 4]['id'] ?>">立即兑换</a>
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
    <div class="page" style="font-size: 17px;left: 30px">
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




    <?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
