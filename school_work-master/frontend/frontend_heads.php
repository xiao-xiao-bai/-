<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>用户界面</title>
    <link rel="stylesheet" href="../layui/css/layui.css">
    <script src="../layui/layui.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/product.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/echarts.min.js"></script>
    <script src="js/china.js"></script>
    <link rel="stylesheet" href="css/project.css">
    <link href="static/css/head2016.css" rel="stylesheet" type="text/css" />
    <link href="static/css/reset.css" rel="stylesheet" type="text/css" />
<!--    <link href="static/css/layout2013.css" rel="stylesheet" type="text/css" />-->
    <link href="static/css/layout.css" rel="stylesheet" type="text/css" />
    <script src="static/js/jquery-1.12.0.js" type="text/javascript"></script>
<!--    <script src="static/js/loadallpage.js" type="text/javascript"></script>-->
    <link rel="stylesheet" href="static/css/video.css">
    <link rel="stylesheet" href="css/index.css">



</head>
<body style="background: url('images/3.png') no-repeat top center">
<div class="head">
    <ul class="layui-nav layui-bg-cyan" lay-bar="disabled">
        <li class="layui-nav-item">
           <a href="index.php"><img src="../image/logo1.jpg" style="width: 150px;height: 80px"></a>
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
                <a href="javascript:;"><img src="<?php echo '.' . $image;?>" class="layui-nav-img"><?php echo $name;?></a>
                <dl class="layui-nav-child">
                    <dd><a href="once_infor.php">个人信息</a></dd>
                    <dd><a href="once_set.php">设置</a></dd>
                    <dd><a href="../login.php">退出</a></dd>
                </dl>
            </li>
        </div>
    </ul>
</div>