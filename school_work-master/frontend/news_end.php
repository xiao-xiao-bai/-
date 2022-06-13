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
    include_once('conn.php');
    include_once('frontend_heads.php');
    ?>
    <?php
    $sql = <<<SQL
select * from user_infor
where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $path = $infors[0]['path'];


    ?>
    <?php
    $news_id = $_GET['newsid'];
    $sql = <<<SQL
select * from news
where id = {$news_id}
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $count = $infors[0]['view_counts'];
    $count += 1;
    $title = $infors[0]['title'];
    ?>
    <?php
    $sql1 = <<<SQL
UPDATE news
SET view_counts = {$count}
WHERE id = {$news_id}
SQL;
    $query1 = mysqli_query($link, $sql1);
    ?>
    <div style="overflow: hidden">
        <span style="font-size: 18px">当前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a
                    href="news_face.php">新闻中心</a><i class="layui-icon layui-icon-next"></i><a>新闻详情</a></span>
        <h1 align="center" style="font-weight: bold"><?php echo $infors[0]['title']; ?></h1>
        <hr class="layui-bg-cyan">
        <div class="news_time" style="overflow: hidden">
            <span style="float: left;font-size: 20px">阅读量：<?php echo $count ?></span>
            <span style="float: right;font-size: 20px">日期:<?php echo $infors[0]['time']; ?></span>
        </div>
        <a href="#" class="btn" style="text-align: center;padding-top: 5px">top</a>
        <div style="margin: 0 auto;width: 100%;height: 280px">
            <img src="<?php echo '.' . $infors[0]['path'] ?>"
                 style="margin: 0 auto;width: 800px;height: 250px;float: left;margin-left: 10px">
            <div style="float:left;margin-left: 100px">
                <label style="font-size: 20px">新闻评分:</label>
                <div id="test1"></div>
            </div>
        </div>
        <div class="news_content" style="font-size: 20px">
            <p>&nbsp&nbsp&nbsp&nbsp<?php echo $infors[0]['content']; ?></p>
        </div>
    </div>
    <script>
        layui.use('rate', function () {
            var rate = layui.rate;
            //渲染
            var ins1 = rate.render({
                elem: '#test1'  //绑定元素
            });
        });
    </script>

    <hr style="border: 4px double red">
    <div style="width: 80%;margin: 0 auto;background-color: snow">
        <h1 align="center">用户留言</h1>
        <div class="edit" style="overflow: hidden">
            <h2>发表评论</h2>
            <div class="comment_content">
                <form method="post" action="newcomment.php">
                    <div style="float: left">
                        <img src="<?php echo '.' . $path; ?>" style="border-radius: 100%;width: 100px;height: 100px">
                        <label style="font-size: 15px;">留言人：</label>
                        <input type="text" name="username" disabled value="<?php echo $name; ?>">
                        <input type="text" id="username" name="username" hidden readonly value="<?php echo $name; ?>">
                        <label style=" font-size: 15px;margin-left: 20px">文章：</label>
                        <input type="text" name="title" disabled value="<?php echo $infors[0]['title']; ?>">
                        <input type="text" id="username" name="title" hidden readonly
                               value="<?php echo $infors[0]['title']; ?>">
                    </div>
                    <div style="float: left;border-left: 10px solid snow;width: 900px">
                        <textarea rows="10" cols="120" name="new_content" style="overflow: hidden"></textarea>
                        <div style="float: right">
                            <button type="submit" class="layui-btn layui-btn-normal layui-btn-radius">发表</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php

        $sql = <<<SQL
select * from newcomment
where title = '{$title}'
order by id desc
SQL;

        $query = mysqli_query($link, $sql);
        $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
        ?>
        <div class="comment_list">
            <h1>评论列表</h1>
            <div class="comment">
                <?php
                foreach ($infors as $infor) {
                    $name = $infor['user_name'];
                    $sql1=<<<SQL
select * from user_infor
where name = '{$name}'
SQL;
                    $query1 = mysqli_query($link, $sql1);
                    $infors1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
                    $path = $infors1[0]['path'];
                    ?>
                    <div class="comment_user" style="overflow: hidden">
                        <span style="float: left"><img src="<?php echo '.' . $path; ?>"
                                                       style="border-radius: 100%;width: 30px;height: 30px"><?php echo $infor['user_name']; ?></span>
                        <?php date_default_timezone_set("PRC"); ?>
                        <span class="time"
                              style="float: right"><?php echo date("Y-m-d H:i:s", $infor['time']); ?></span>
                    </div>
                    <div class="content" style="padding-left: 5px">
                        <?php echo $infor['comment']; ?>
                    </div>
                    <hr class="layui-bg-red">
                    <?php
                }
                ?>
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
