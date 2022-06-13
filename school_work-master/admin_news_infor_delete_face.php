<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$id = $_GET["userid"];
$sql =<<<SQL
SELECT * FROM news
WHERE id= $id
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$news_id = $infors[0]['id'];
$news_title = $infors[0]['title'];
$news_content = $infors[0]['content'];
?>
    <div>
        <form action="admin_news_infor_delete_end.php" method="post">
            <div><h1 align="center" style="font-size: 15px">删除<?php echo $news_title;?>新闻的信息</h1></div>
            <div ng-show="show">
                <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                    <tr>
                        <td>编号:</td>
                        <td>
                            <input type="text" name="userid"  disabled value="<?php echo $infors[0]['id']; ?>">
                            <input type="text" id="username" name="news_id" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>题目:</td>
                        <td>
                            <input type="text" name="news_title"  disabled value="<?php echo $news_title; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>内容:</td>
                        <td><input type="text"  name="news_content" disabled value="<?php echo $news_content;?>"></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2"><input type="submit" id="btn_sub" value="删除"></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
<?php
include_once ('admin_background_foot.php');
?>