<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$userid = $_GET["userid"];
$sql =<<<SQL
SELECT * FROM news
WHERE id= $userid
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$news_id = $infors[0]['id'];
$news_title = $infors[0]['title'];
$news_content = $infors[0]['content'];
$news_time = $infors[0]['time'];
?>
<div>
    <form action="admin_news_infor_update_end.php" method="post">

        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>编号:</td>
                    <td>
                        <input type="text" name="news_id"  disabled value="<?php echo $infors[0]['id']; ?>">
                        <input type="text" id="username" name="news_id" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>标题:</td>
                    <td>
                        <input type="text" name="news_title"   value="<?php echo $infors[0]['title']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>时间:</td>
                    <td><input type="date"  name="news_time"></td>
                </tr>
                <tr>
                    <td style="height: 300px;width: 300px">内容</td>
                    <td>
                        <textarea id="demo" style="display: none;" name="news_content"><?php echo $infors[0]['content'];?></textarea>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="2"><input type="submit" id="btn_sub" value="修改"></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<script>
    layui.use('layedit', function(){
        var layedit = layui.layedit;
        layedit.build('demo', {
            tool: [  'strong','italic','underline','del' ,'|' ,'left', 'center', 'right', '|']
        });
    });
</script>
<?php
include_once ('admin_background_foot.php');
?>
