<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])) {
    echo "<script>alert('未登录');location='../login.php';</script>";
} elseif (time() - $_SESSION['time'] < 3600) {
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
    include('conn.php');
    $sql = <<<SQl
select * from message
order by id desc
SQl;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
//var_dump($rows);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>用户界面</title>
        <link rel="stylesheet" href="../layui/css/layui.css">
        <script src="../layui/layui.js"></script>
        <link rel="stylesheet" href="./static/css/head2016.css">
        <link href="static/css/reset.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/index.css">

        <style type="text/css">
            .labelTitle {
                font-size: 35px;
                color: #1E90FF;
                align-content: center;
            }

            .hr {
                background: #1E90FF;
                height: 3px;
            }

            .edit {
                width: 97%;
                height: 80px;
                font-size: 24px;
                color: #1E90FF;
                border-radius: 6px;
                border-color: #1E90FF;
                padding: 13px;
            }

            .buttonSend {
                width: 100px;
                height: 44px;
                border-radius: 10px;
                background: #1E90FF;
                color: #fff;
                font-size: 20px;
                margin-left: 30px;
            }
            .table {
                border-radius: 2px;
                border-color: #110000;
                width: 95%;
                word-break: break-all;
            }

            .table_caption {
                text-align: center;
                color: red;
                font-size: 24px;
            }
            .show{
                width: 60%;
                margin: 0 auto;
                background-color: #c19e66;
                font-size: 17px;
            }
            .infor{
                overflow: hidden;
            }
            .show .user{
                float:left;
            }
            .time{
                float:right;
            }
            .page{
                text-align: center;
                padding-top: 1px;
                padding-bottom: 5px;
            }
            .page a{
                text-decoration: none;
                font-size: 15px;
                color: #000;
            }
            .free_page{
                display: inline;

            }
            .page a:hover{
                color: red;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
    <div class="head">
        <ul class="layui-nav layui-bg-cyan" lay-bar="disabled">
            <li class="layui-nav-item">
                <img src="../image/logo1.jpg" style="width: 150px;height: 80px">
            </li>
            <li class="layui-nav-item">
                <a href="index.php">首页</a>
            </li>
            <li class="layui-nav-item">
                <a href="news_face.php">新闻中心</a>
            </li>
            <li class="layui-nav-item">
                <a href="integral_center_face.php">积分中心</a>
            </li>
            <li class="layui-nav-item">
                <a href="message.php">留言中心</a>
            </li>
            <li class="layui-nav-item">
                <a href="prevention_project.php">志愿项目</a>
            </li>
            <li class="layui-nav-item">
                <a href="train.php">研究培训</a>
            </li>
            <li class="layui-nav-item">
                <a href="Voluntary_style_start.php">志愿风采</a>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:;">个人中心</a>
                <dl class="layui-nav-child">
                    <dd><a href="warm_infor_face.php">体温填报</a></dd>
                    <dd><a href="seek_help_start.php">求助信息</a></dd>
                </dl>
            </li>
            <div style="float: right">
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;"><img src="<?php echo '.' . $image;?>" class="layui-nav-img"><?php echo $name; ?></a>
                    <dl class="layui-nav-child">
                        <dd><a href="once_infor.php">个人信息</a></dd>
                        <dd><a href="once_set.php">设置</a></dd>
                        <dd><a href="../login.php">退出</a></dd>
                    </dl>
                </li>
            </div>
        </ul>
    </div>

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
    <div id="box" style="width: 100%">
        <form action="message_end.php" method="post">
            <h1 class="labelTitle">防疫志愿者留言平台</h1>
            <hr class="hr">
            <textarea class="edit" name="content" placeholder="发言信息"></textarea>
            <br>
            <label style="font-size: 22px;">留言人：</label>
            <input type="text" name="username" disabled value="<?php echo $name; ?>">
            <input type="text" id="username" name="username" hidden readonly value="<?php echo $name; ?>">
            <span id="s_username" class="error"></span>
            <input type="submit" class="buttonSend" value="发表">
        </form>
        <a href="#" class="btn" style="text-align: center;padding-top: 5px">top</a>
        <hr class="hr">
        <h2 class="layui-bg-blue"  align="center">留言日志</h2>
        <hr class="layui-bg-green" >
        <div>

            <table class="table" align="center">
                <?php
                for ($i = $start_index; $i <= $end_index; $i++) {
                    ?>
                    <div class="show">
                        <div class="infor">
                            <span class="user"><?php echo $infors[$i]['user']; ?></span>
                            <?php date_default_timezone_set("PRC"); ?>
                            <span class="time"><?php echo date("Y-m-d H:i:s", $infors[$i]['time']); ?></span>
                        </div>
                        <div class="content">
                            <?php echo $infors[$i]['content']; ?>
                        </div>
                        <hr class="layui-bg-red">
                    </div>

                    <?php
                }
                ?>
            </table>
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
    </div>
    <?php
    include_once('frontend_foots.php');
    ?>
    </body>
    </html>
    <?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
