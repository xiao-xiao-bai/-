<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])){
    echo "<script>alert('未登录');location='../login.php';</script>";
}elseif (time()-$_SESSION['time']<3600) {
    include_once('conn.php');
    $_SESSION['time'] = time();
    $name = $_SESSION['user'];
    $sql =<<<SQL
select path from user_infor
where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $image = $infors[0]['path'];

    ?>
    <?php
    $sql =<<<SQL
SELECT * FROM thing
SQL;
    $query = mysqli_query($link,$sql);
    $infors = mysqli_fetch_all($query,MYSQLI_ASSOC);

    ?>
    <?php
    include_once ('frontend_heads.php');
    ?>
    <?php
    $perpage = 4;
    $total_num = count($infors);
    $total_page = ceil($total_num / $perpage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $start_index = $perpage * ($page - 1);
    $end_index = $perpage * $page - 1;
    $end_index = min($end_index,$total_num - 1);
    $count = 0;
    ?>
    <div id="lujing" style="height: 50px;font-size: 20px">
        你目前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a>志愿风采</a>
    </div>
    <div class="layui-row layui-col-space30">
        <div class="layui-col-md7">
            <div class="grid-demo grid-demo-bg1 layui-bg-red"><h2 style="font-size: 20px;font-weight: bold">最美志愿者</h2></div>
            <div class="thing_list" style="background: rgba(255, 255, 255, 0.6);">
                <?php
                for($i = $start_index;$i <=$end_index;$i ++){
                    ?>
                    <div class="new_body" style="overflow: hidden">
                        <div class="new_title" style="overflow: hidden">
                            <span style="float:left;font-size: 20px"><i class="layui-icon layui-icon-rate-solid"></i>最美防疫志愿者:<?php echo $infors[$i]['name'];?></span>
                            <span style="float: right;font-size: 20px"><?php echo $infors[$i]['time']; ?></span>
                        </div>
                        <div style="font-size: 15px">
                            <p style="float: right"><a href="Voluntary_style_end.php?voluntaryid=<?php echo $infors[$i]['id'] ?>">>>详情</a></p>
                        </div>
                    </div>
                    <hr class="layui-bg-gray" >
                    <?php
                }
                ?>
            </div>
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
        <div class="layui-col-md5 layui-bg-green">
            <div class="grid-demo"><i class="layui-icon layui-icon-shrink-right">志愿者风采展</i></div>
        </div>
    </div>

    <?php
    include_once('frontend_foots.php');
    ?>
    <?php
}else{
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
