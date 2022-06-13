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
    $id = $_GET['id'];
    $sql = <<<SQL
select * from prevention_project
where id = {$id}
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $sql1 = <<<SQL
select * from admin_infor
SQL;
    $query1 = mysqli_query($link, $sql1);
    $infors1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
    ?>
    <div id="lujing" style="height: 50px;font-size: 20px">
        你目前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a
                href="prevention_project.php">志愿项目</a><i class="layui-icon layui-icon-next"></i>项目详情</a>
    </div>
    <div class="project_content" style="overflow:hidden;">
        <div class="project_show_left" style="float: left;width: 700px">
            <div class="project_box" style="margin-left: 10px;overflow: hidden">
                <div class="image" style="float: left">
                    <img src="<?php echo '.' . $infors[0]['path']; ?>" width="200px" height="200px">
                </div>
                <div class="content" style="float: left;margin-left: 5px">
                    <h2 style="font-weight: bold;font-size: 20px;">项目名称:<?php echo $infors[0]['title']; ?></h2>
                    <table style="font-size: 18px">
                        <tr>
                            <th>项目地点:</th>
                            <td><?php echo $infors[0]['site']; ?></td>
                            <th style="padding: 5px 0">发布时间:</th>
                            <td><?php echo $infors[0]['time']; ?></td>
                        </tr>
                        <tr>
                            <th style="padding: 5px 5px">项目日期：</th>
                            <td><?php echo $infors[0]['time']; ?>至<?php echo $infors[0]['endtime']; ?></td>
                        </tr>
                        <tr>
                            <th style="padding: 5px 0">志愿者保障:</th>
                            <td><?php echo $infors[0]['safeguard']; ?></td>
                        </tr>
                        <tr>
                            <th>服务时间说明:</th>
                            <td><?php echo $infors[0]['explains']; ?></td>
                        </tr>
                        <tr>
                            <th>招募人数:</th>
                            <td><?php echo $infors[0]['people']; ?>人</td>
                            <th>现在需要:</th>
                            <td><?php echo $infors[0]['count']; ?>人</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr style="border: 5px double red">
            <div class="ture_content" style="border: 3px dotted">
                <h1 align="center">服务内容</h1>
                <div style="font-size: 18px">
                    <?php echo $infors[0]['content']; ?>
                </div>

            </div>
        </div>
        <div class="project_right" style="float: left;margin-left: 10px;padding-left: 10px;overflow: hidden">
            <h1 align="center">项目发起者</h1>
            <div class="right_image" style="float: left">
                <img src="images/index_right.png">
            </div>
            <div style="font-size: 20px;font-weight: bold;float: left;padding-left: 10px;margin-left: 5px">
                <table>
                    <tr>
                        <th>发起者:</th>
                        <td>淮滨县防疫志愿者服务团体</td>
                    </tr>
                    <tr style="">
                        <th>地点:</th>
                        <td><?php echo $infors[0]['area'];?></td>
                    </tr>

                </table>

            </div>
            <div>
                <table style="font-size: 20px;font-weight: bold;float: left;padding-left: 10px;margin-left: 5px">
                    <tr>
                        <th>负责人:</th>
                        <td><?php echo $infors1[0]['name']; ?></td>
                    </tr>
                    <tr>
                        <th>联系电话:</th>
                        <td><?php echo $infors1[0]['phone']; ?></td>
                    </tr>
                </table>
            </div>
            <div>


                <button type="button" id="active_button"
                        style="background:#F60;border:0;width:138px;height:37px; color:#fff; font-size:18px;cursor:pointer;"
                        value=""><a href="prevention_project_end.php?id=<?php echo $id; ?>">赶快加入我们吧</a></p>
                </button>

            </div>
        </div>

    </div>
    <div>
        <?php
        include_once ('frontend_foots.php');
        ?>
    </div>


    <?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
