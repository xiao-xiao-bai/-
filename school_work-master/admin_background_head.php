<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台防疫志愿者管理系统</title>
    <link rel="stylesheet" href="./layui/css/layui.css">
    <link rel="stylesheet" href="css/admin_user_add.css">
    <link rel="stylesheet" href="css/style_update.css">
    <link rel="stylesheet" href="css/admin_profile_1.css">
    <link rel="stylesheet" href="css/admin_profile_2.css">
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/front_end.css">
    <link rel="stylesheet" href="./css/admin_background_userinfor.css">
    <script src="./layui/layui.js"></script>
    <script src="./js/echarts.min.js"></script>
    <script src="./js/china.js"></script>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <div class="layui-logo layui-hide-xs layui-bg-black"><a href="admin_background_face.php" style="color: white">后台管理系统</a></div>
        <!-- 头部区域（可配合layui 已有的水平导航） -->
        <ul class="layui-nav layui-layout-left">
            <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-header-event="menuLeft">
                <i class="layui-icon layui-icon-spread-left"></i>
            </li>
            <li class="layui-nav-item layui-hide-xs"><a href="admin_background_face.php"><i class="layui-icon layui-icon-home ">后台首页</i></a></li>
        </ul>
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item layui-hide layui-show-md-inline-block">
                <a href="javascript:;">
                    <img src="./image/head%20portrait_1.jpg" class="layui-nav-img">
                    root
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="admin_profile.php">Your Profile</a></dd>
                    <dd><a href="admin_setting_start.php">Settings</a></dd>
                    <dd><a href="<?php echo 'login.php';?>">Sign out</a></dd>
                </dl>
            </li>
<!--            <li class="layui-nav-item" lay-header-e vent="menuRight" lay-unselect>-->
<!--                <a href="javascript:;">-->
<!--                    <i class="layui-icon layui-icon-more-vertical"></i>-->
<!--                </a>-->
<!--            </li>-->
        </ul>
    </div>

    <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
            <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
            <ul class="layui-nav layui-nav-tree" lay-filter="test">
                <li class="layui-nav-item layui-nav-itemed">
                    <a class="" href="">用户管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="<?php echo 'admin_background_userinfor.php';?>">用户信息</a></dd>
                        <dd><a href="admin_userinfor_add_start.php">添加用户</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">积分中心</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_user_integral_show.php">用户积分</a></dd>
                        <dd><a href="admin_product_infor_show.php">商品信息</a></dd>
                        <dd><a href="admin_product_infor_add_start.php">商品添加</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">新闻中心</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_news_edit_face.php">新闻发布</a></dd>
                        <dd><a href="admin_news_infor_show.php">新闻管理</a></dd>
                        <dd><a href="admin_news_usermessage_face.php">用户留言管理</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">志愿风采</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_voluntary_style_show.php">志愿信息</a></dd>
                        <dd><a href="admin_voluntary_style_add_start.php">志愿发布</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">留言管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_message_infor_show.php">留言信息</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">志愿项目管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_prevention_project_show.php">项目信息</a></dd>
                        <dd><a href="admin_prevention_project_edit_start.php">志愿项目发布</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">视频管理</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_video_start.php">视频信息</a></dd>
                        <dd><a href="admin_video_add_start.php">视频发布</a></dd>
                    </dl>

                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">用户中心</a>
                    <dl class="layui-nav-child">
                        <dd><a href="admin_warm_user_infor_show.php">体温信息</a></dd>
                        <dd><a href="admin_seek_help_show.php">求助信息</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <div class="layui-body">
        <!-- 内容主体区域 -->
        <div style="padding: 15px;">