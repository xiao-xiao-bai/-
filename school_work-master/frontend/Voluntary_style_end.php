<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])) {
    echo "<script>alert('未登录');location='./login.php';</script>";
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
<!--    查询事迹表中的信息-->
    <?php
    $voluntary_id = $_GET['voluntaryid'];
    $sql = <<<SQL
select * from thing
where id = {$voluntary_id}
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $name = $infors[0]['name'];
    $sql1 =<<<SQL
select * from user_infor
where name = '{$name}'
SQL;
    $query1 = mysqli_query($link, $sql1);
    $infors1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
    ?>
    <div style="overflow:hidden;">
        <div class="list_left" style="width: 800px;float: left;background: rgba(255, 255, 255, 0.6);margin-top: 20px">
            <span style="font-size: 18px">当前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a
                        href="Voluntary_style_start.php">志愿风采</a><i
                        class="layui-icon layui-icon-next"></i><a>志愿者:<?php echo $infors[0]['name']; ?></a></span>
            <h1 align="center" style="font-weight: bold">最美防疫志愿者:<?php echo $infors[0]['name']; ?></h1>
            <hr class="layui-bg-cyan">
            <div class="news_time" style="overflow: hidden">
                <span style="float: right;font-size: 20px">日期:<?php echo $infors[0]['time']; ?></span>
            </div>
            <div class="news_content" style="font-size: 20px">
                <p><span>姓名&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $infors1[0]['name'];?></span></p>
                <p><span>出生日期:  <?php echo $infors1[0]['birthday'];  ?></span></p>

                <p> <span>主要事迹: <?php echo $infors[0]['things']; ?></span></p>
            </div>
        </div>
<!--        查询新闻信息-->
        <?php
        $sql = <<<SQL
select * from news
order by id desc
SQL;
        $query = mysqli_query($link, $sql);
        $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
        ?>
        <div class="list_right" style="margin-top: 20px;background: rgba(255, 255, 255, 0.6);;width: 330px;float: left;padding-left: 10px;margin-left: 80px">

            <h1><li class="layui-badge" style="margin-right: 10px;padding-top: 10px"></li>热点新闻</h1>
            <hr class="layui-border-red">
            <?php
            for ($i = 0; $i <= 5; $i++) {
                ?>
                <div style="font-size: 23px;overflow: hidden">
                    <span style="float:left;"><i class="layui-icon layui-icon-snowflake"></i><?php echo $infors[$i]['title']; ?></span>
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
    </div>
    <?php
    include_once('frontend_foots.php');
    ?>
    <?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='./login.php';</script>";
}
?>
