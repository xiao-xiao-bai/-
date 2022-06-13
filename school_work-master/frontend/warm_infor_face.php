<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])){
    echo "<script>alert('未登录');location='../login.php';</script>";
}elseif (time() - $_SESSION['time'] < 3600) {
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
$sql = <<<SQL
select * from user_infor
where name = '{$name}'
SQL;
$query = mysqli_query($link, $sql);
$infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>用户界面</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
    <script src="../layui/layui.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./static/css/head2016.css">
    <link href="static/css/reset.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-image: url("images/warm/background.jpg");
        }

        #infor_show {
            width: 80%;
            margin: 0 auto;
        }

        #infor_table {
            margin: 0 auto;
            width: 50%;
            font-size: 20px;
        }

        td {
            border: 1px solid blue;
            font-size: 16px;
            height: 40px;
            line-height: 40px;
        }

        tr:hover {
            background-color: skyblue;
        }

        td:hover {
            background-color: #FFFFDD;
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
            <a href="preventioon_project.php">志愿项目</a>
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
                <dd><a href="temperature_infor_face.php">体温填报</a></dd>
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
<div class="layui-bg-green" id="min_infor" style="margin: 0 auto;width: 70%;height: 400px;background-color: #93D1FF">
    <h1 align="center">滨城防疫志愿者体温登记</h1>
    <hr class="layui-bg-orange">
    <h2 align="center">注意:Morning：7:00-8:00&nbsp&nbspNoon 12:00-13:00&nbsp&nbsp Night19:00-20:00过期无法录入系统</h2>
    <hr class="layui-bg-orange">
    <form action="warm_infor_end.php" method="post">
        <div id="infor_show">
            <table id="infor_table" ; cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>用户名:</td>
                    <td>
                        <input type="text" name="username" disabled value="<?php echo $infors[0]['name']; ?>">
                        <input type="text" id="user_name" name="username" hidden readonly
                               value="<?php echo $infors[0]['name']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>时间</td>
                    <td>
                        <select name="time" lay-verify="required" lay-search="">
                            <option value="">时间选择</option>
                            <option value="Morning">Morning</option>
                            <option value="Noon">Noon</option>
                            <option value="Night">Night</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>电话号</td>
                    <td>
                        <input type="text" name="userphone" disabled value="<?php echo $infors[0]['phone']; ?>">
                        <input type="text" id="userphone" name="userphone" hidden readonly
                               value="<?php echo $infors[0]['phone']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>体温:</td>
                    <td>
                        <input type="text" name="userwarm" value="摄氏度">
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
<?php
include_once('frontend_foots.php');
?>
<?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
</body>
</html>