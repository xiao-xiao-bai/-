<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])){
    echo "<script>alert('未登录');location='./login.php';</script>";
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
    $sql2 =<<<SQL
select * from video
SQL;
    $query2 = mysqli_query($link,$sql2);
    $infors2 = mysqli_fetch_all($query2,MYSQLI_ASSOC);
$video_id = $_GET['videoid'];
if($video_id <=0 ){
    $video_id = 1;
}
if($video_id > count($infors2)){
    $video_id = count($infors2);
}
$sql =<<<SQL
SELECT * FROM video
WHERE id = {$video_id}
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$path = $infors[0]['video_path'];
$names = $infors[0]['video_name'];
$count = $infors[0]['video_count'];
$count += 1;

?>
<?php
$sql1=<<<SQL
UPDATE video
SET video_count = {$count}
WHERE id = $video_id
SQL;
$query1 = mysqli_query($link,$sql1);
?>
    <?php
    include_once ('frontend_heads.php');
    ?>
    <span style="font-size: 18px">当前的位置:<a href="index.php">首页</a><i class="layui-icon layui-icon-next"></i><a href="train.php">研究培训</a><i class="layui-icon layui-icon-next"></i><a>视频:<?php echo $names;?></a></span>
<h2 style="text-align: center;font-size: 18px"><?php echo $names;?></h2>
    <?php date_default_timezone_set("PRC"); ?>
    <span class="time" style="float:right;font-size: 18px">发布时间:<?php echo date("Y-m-d H:i:s", $infors[0]['time']); ?></span>
<div class="video_show" style="left: 50px">
    <video width="100%" height="400px"controls="">
        <source src="<?php echo '.' . $path;?>" type="video/mp4"></source>
    </video>
</div>
    <div class="previous_next_box">
        上一篇：<a href="train_end.php?videoid=<?php echo $infors[0]['id'] - 1 ;?>"><?php
            $onlist = $infors[0]['id'] - 1;
            if($onlist <= 0){
                $onlist = 1;
            }
            for($i = 0;$i < count($infors2);$i ++){
                if($infors2[$i]['id'] == $onlist){
                    echo $infors2[$i]['video_name'];
                    break;
                }
            }
            ?></a>
    </div>
    <div class="previous_next_box">
        下一篇：<a href="train_end.php?videoid=<?php echo $infors[0]['id'] + 1 ;?>"><?php
            $inlist = $infors[0]['id'] + 1;
            if($inlist >= count($infors2) ){
                $inlist = count($infors2);
            }
            for($i = 0;$i < count($infors2);$i ++){
                if($infors2[$i]['id'] == $inlist){
                    echo $infors2[$i]['video_name'];
                    break;
                }
            }
            ?></a>
    </div>
    <div class="video_center">
        <h2>视频简介:</h2>
        <div class="content">
            &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $infors[0]['video_content'];?>
        </div>

    </div>
<?php
include_once('frontend_foots.php');
?>
<?php
}else{
    session_destroy();
    echo "<script>alert('登录超时');location='./login.php';</script>";
}
?>
</body>
</html>
