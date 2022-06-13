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
    include_once('frontend_heads.php');
    ?>
    <?php
    $sql = <<<SQL
  SELECT * FROM user_infor
  where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);

    ?>
    <?php
    $sql1 = <<<SQL
select * from help
order by id desc
SQL;
    $query1 = mysqli_query($link, $sql1);
    $infors1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);

    ?>
    <?php
    $perpage = 3;
    $total_num = count($infors1);
    $total_page = ceil($total_num / $perpage);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $start_index = $perpage * ($page - 1);
    $end_index = $perpage * $page - 1;
    $end_index = min($end_index, $total_num - 1);
    $count = 0;
    ?>
    <div class="help_content">
        <div id="lujing"style="height: 50px;font-size: 20px">
            你目前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a>个人中心</a><i
                    class="layui-icon layui-icon-next"></i><a>求助信息</a>

        </div>
        <hr class="layui-bg-red">
        <div class="layui-row">
            <div class="layui-col-xs6 layui-bg-green">
                <div class="grid-demo grid-demo-bg1"><h2 style="font-size: 18px">求助信息列表</h2></div>
                <div class="send_new_list">
                    <?php
                    for ($i = $start_index; $i <= $end_index; $i++) {
                        ?>
                        <div class="new_body" style="overflow: hidden">
                            <div class="new_title" style="overflow: hidden">
                                <span style="float:left;font-size: 20px"><i class="layui-icon layui-icon-rate-solid"></i><?php echo $infors1[$i]['username']; ?></span>
                                <?php date_default_timezone_set("PRC"); ?>
                                <span class="time" style="float: right;font-size: 20px"><?php echo date("Y-m-d H:i:s", $infors1[$i]['time']); ?></span>
                            </div>
                            <div clss="new_content layui-bg-black" style="font-size: 20px">
                                <p>内容:<?php echo $infors1[$i]['helpcontent']; ?></p>
                                <span>地点:<?php echo $infors1[$i]['county'], $infors1[$i]['village'], $infors1[$i]['burg']; ?></span>
                            </div>
                        </div>
                        <hr class="layui-bg-red">
                        <?php
                    }
                    ?>

                </div>
                <div class="page">
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
            <div class="layui-col-xs6 layui-bg-blue">
                <div class="grid-demo"><h2 style="font-size: 18px">求助信息发布</h2></div>
                <div class="send_content" style="font-size: 20px">
                    <form action="seek_help_end.php" method="post">
                        <div id="infor_show">
                            <table id="infor_table" ; cellpadding="10" cellspacing="1" border="soild 1px #000">
                                <tr>
                                    <td>用户名:</td>
                                    <td>
                                        <input type="text" name="username" disabled
                                               value="<?php echo $infors[0]['name']; ?>">
                                        <input type="text" id="user_name" name="username" hidden readonly
                                               value="<?php echo $infors[0]['name']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>电话号:</td>
                                    <td>
                                        <input type="text" name="userphone" disabled
                                               value="<?php echo $infors[0]['phone']; ?>">
                                        <input type="text" id="userphone" name="userphone" hidden readonly
                                               value="<?php echo $infors[0]['phone']; ?>">
                                    </td>

                                </tr>
                                <tr>
                                    <td>地点</td>
                                    <td>
                                        <div class="layui-form-item">
                                            <select name="quiz1">
                                                <option value="淮滨县" selected="">淮滨县</option>
                                            </select>
                                            <div class="layui-input-inline">
                                                <select name="quiz2">
                                                    <option value="">请选择乡</option>
                                                    <option value="台头乡">台头乡</option>
                                                    <option value="王家岗乡">王家岗乡</option>
                                                    <option value="固城乡">固城乡</option>
                                                    <option value="三空桥乡">三空桥乡</option>
                                                    <option value="张里乡">张里乡</option>
                                                    <option value="张庄乡">张庄乡</option>
                                                    <option value="王店乡">王店乡</option>
                                                </select>
                                            </div>
                                            <div class="layui-input-inline">
                                                <select name="quiz3">
                                                    <option value="">请选择村</option>
                                                    <option value="八里村">八里村</option>
                                                    <option value="九里村">九里村</option>
                                                    <option value="新湖村">新湖村</option>
                                                    <option value="长沟村">长沟村</option>
                                                    <option value="丁寨村">丁寨村</option>
                                                    <option value="祁寨村">祁寨村</option>
                                                    <option value="项元村">项元村</option>
                                                    <option value="毛庄村">毛庄村</option>
                                                    <option value="固城村">固城村</option>
                                                    <option value="马楼村">马楼村</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="layui-form-label">求助信息</label>
                                    </td>
                                    <td style="height: 100px">
                                        <textarea name="help_content" style="width: 100%;height: 80%"></textarea>
                                    </td>
                                </tr>
                                <tr align="center">
                                    <td colspan="2"><input class="layui-bg-orange" type="submit" id="btn_sub" value="提交"
                                                           style="font-size: 20px"></td>
                                </tr>
                            </table>
                        </div>
                    </form>
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
