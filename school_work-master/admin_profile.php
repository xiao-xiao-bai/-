<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ("conn.php");
$sql =<<<SQL
SELECT * FROM admin_infor
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<h1 style="text-align: center">管理员信息</h1>
<div id="box">
    <!-- 个人资料卡片 -->
    <div class="meBox">
        <!-- 头像 -->
        <div class="headPhoto"></div>
        <!-- 介绍 -->
        <div class="meBox-title">
            <p>I'm <?php echo $infors[0]['name'];?></p>
            <div class="fg"></div>
        </div>
        <div class="meBox-text">
            <p>电话:<?php echo $infors[0]['phone'];?></p>
            <p>性别:&nbsp&nbsp&nbsp&nbsp<?php echo $infors[0]['sex'];?></p>
            <p>年龄:&nbsp&nbsp&nbsp&nbsp<?php echo $infors[0]['age'];?></p>
        </div>
    </div>

    <!-- 伪终端介绍 -->
    <div id="cmdBox">
        <!-- 第一个终端 -->
        <div class="cmd">
            <!-- 三个按钮 -->
            <div class="click">
                <div class="red"></div>
                <div class="yellow"></div>
                <div class="green"></div>
            </div>
            <!-- 顶部标题 -->
            <div class="title">
                <span>lovexhj - bash</span>
            </div>
            <!-- 终端内文字 -->
            <div class="cmdText">
                <span style="color: rgb(0, 190, 0);">root@chenqian</span>
                <span style="color: blue;">~</span>
                <span style="color: rgb(39, 39, 39);">./tianqi.sh</span>
                <span style="color: rgb(0, 190, 0);">root@chenqian</span>
                <span style="color: blue;">~</span>
                <span style="color: rgb(39, 39, 39);">cat /me.txt</span>
                <p>爱好计算机，会去自学自己感兴趣的一切东西</p>
                <p>略懂H5，java开发；爱好折腾去解决一切问题</p>
                <p>这条路我才刚刚迈开了我的第一步</p>
                <p>路上的坎一定会非常多，但</p>
                <p>在我眼里</p>
                <p>没有什么问题是尝试不能解决的，如果有那就多尝试几次甚至上百次</p>
                <p>即使前方的路看似绝境，也要有硬生生给自己开出一条路的勇气</p>
                <span style="color: rgb(0, 190, 0);">root@chenqian</span>
                <span style="color: blue;">~</span>
                <span style="color: rgb(39, 39, 39);">sudo rm -rf /过去的自己/*</span>
            </div>
        </div>
        <!-- 第二个终端 -->
        <div class="cmd cmd2">
            <!-- 三个按钮 -->
            <div class="click">
                <div class="red"></div>
                <div class="yellow"></div>
                <div class="green"></div>
            </div>
            <!-- 顶部标题 -->
            <div class="title">
                <span>lovexhj - bash</span>
            </div>
            <!-- 终端内文字 -->
            <div class="cmdText">
                <span style="color: rgb(0, 190, 0);">root@chenqian</span>
                <span style="color: blue;">~</span>
                <span style="color: rgb(39, 39, 39);">./links.sh</span>
                <p>我的其他站点：</p>
                <ul class="ul">
                    <li><a href="https://blog.csdn.net/qq_43728862?spm=1000.2115.3001.5343">CSDN</a></li>
                    <li><a href="https://home.cnblogs.com/u/xiaobaiyuan">博客园</a></li>
                    <li><a href="https://gitee.com/scalar">gitee</a></li>
                    <li><a href="https://github.com/xiao-xiao-bai/">github</a></li>
                </ul>
                <span style="color: rgb(0, 190, 0);">root@chenqian</span>
                <span style="color: blue;">~</span>
            </div>
        </div>
    </div>
</div>

<?php
include_once ('admin_background_foot.php')
?>
