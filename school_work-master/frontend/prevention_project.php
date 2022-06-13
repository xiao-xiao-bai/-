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
select * from prevention_project
order by id desc
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);

?>
<?php
include_once('frontend_heads.php');
?>


<div class="w980">
    <link href="static/css/projectlist.css" rel="stylesheet"/>
    <script src="static/js/layui.js"></script>
    <link href="static/css/layui.css" rel="stylesheet"/>

    <script type="text/javascript">
        layui.use('laydate', function () {
            var laydate = layui.laydate;

            laydate.render({
                elem: '#start'
                , min: '2012-6-1'
                , type: 'datetime'
            });

            laydate.render({
                elem: '#end'
                , min: '2012-6-1'
                , type: 'datetime'
            });

        });


    </script>
    <div style="width:980px; margin:0px auto;">
        <div class="cont" style=" height:auto; overflow:hidden;">
            <div style="width:980px; margin:0px auto;">
                <div class="henji">当前位置：<a href="#">首页</a> > 活动招募</div>
                <div>

                    <div class="cont" style=" height:auto; overflow:hidden;">
                        <div class="clr"></div>
                        <div style="padding:10px; background:#f1f1f1; border:solid 1px #dddddd;">
                        </div>
                        <?php
                        $perpage = 6;
                        $total_num = count($infors);
                        $total_page = ceil($total_num / $perpage);
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        $start_index = $perpage * ($page - 1);
                        $end_index = $perpage * $page - 1;
                        $end_index = min($end_index, $total_num - 1);
                        $count = 0;
                        ?>
                        <a href="#" class="btn" style="text-align: center;padding-top: 5px">top</a>

                        <div class="clr"></div>
                        <div>
                            <?php
                            for($i = $start_index; $i <= $end_index; $i++){
                            ?>
                            <div class="tu_box5">
                                <div><a href="#" target="_blank" title="<?php echo $infors[$i]['title']; ?>"><img
                                                src="<?php echo '.' . $infors[$i]['path'];?>" width="260"
                                                height="192"/></a></div>
                                <dl>
                                    <dt><a href="#" target="_blank" title="<?php echo $infors[$i]['title']; ?>"><?php echo $infors[$i]['title']; ?></a></dt>
                                    <dd>
                                        <span class=" blue"></span>&nbsp;淮滨疫情防控志愿者&nbsp;&nbsp;&nbsp;&nbsp;招募人数：<span
                                                class="orange"><?php echo $infors[$i]['people'];?></span></dd>
                                    <p>负责单位:淮滨疫情防控办公室</p>
                                    <p>联系方式:028-8888</p>
                                    <span>奖励积分：<?php echo $infors[$i]['integral'];?></span>
                                    <dt style="font-size: 15px;float: right"> <a style="float: right" href="prevention_project_ends.php?id=<?php echo $infors[$i]['id'] ?>">>>详情</a></dt>

                                </dl>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="clr"></div>
                        </div>
                    </div>
                </div>
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
    include_once ('frontend_foots.php');
    ?>


    <?php
    } else {
        session_destroy();
        echo "<script>alert('登录超时');location='../login.php';</script>";
    }
    ?>
    </body>
    </html>
