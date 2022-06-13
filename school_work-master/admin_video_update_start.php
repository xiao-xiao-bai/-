<?php
include_once ('admin_background_head.php');
include_once ('conn.php');
?>
<?php
$id = $_GET['videoid'];
$sql =<<<SQL
SELECT * FROM video
where id = {$id}
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
?>
<div class="content">
    <h1 align="center"><?php echo $infors[0]['video_name'];?>视频信息修改</h1>
    <div class="contentlist">
        <form enctype="multipart/form-data" action="admin_video_update_end.php" method="post">
            <div ng-show="show">
                <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                    <tr>
                        <td>编号:</td>
                        <td>
                            <input type="text" name="videotid"  disabled value="<?php echo $infors[0]['id']; ?>">
                            <input type="text" id="videoid" name="videoid" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>名称:</td>
                        <td>
                            <input type="text" name="videoname"  disabled value="<?php echo $infors[0]['video_name']; ?>">
                            <input type="text" id="videoname" name="videoname" hidden readonly value="<?php echo $infors[0]['video_name']; ?>">
                        </td>
                        </td>
                    </tr>
                    <tr>
                        <td>视频:</td>
                        <td>
                            <input type="file" name="video" style="width: 301px">
                        </td>
                    </tr>
                    <tr style="height: 90px">
                        <td>简介:</td>
                        <td>
                            <textarea style="width: 100%;height: 100%" type="text" placeholder="videocontent" name="videocontent"><?php echo $infors[0]['video_content'];?></textarea>
                        </td>
                    </tr>

                    <tr align="center">
                        <td colspan="2"><input type="submit" id="btn_sub" value="修改"></td>
                    </tr>
                </table>
            </div>
        </form>

    </div>
</div>