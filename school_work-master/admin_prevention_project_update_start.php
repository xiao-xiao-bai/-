<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$project_id = $_GET["projectid"];
$sql =<<<SQL
SELECT * FROM prevention_project
WHERE id= {$project_id}
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$project_id = $infors[0]['id'];
$project_title = $infors[0]['title'];
$project_content = $infors[0]['content'];
$project_integral = $infors[0]['integral'];
$project_count = $infors[0]['count'];
?>
<div>
    <h1 align="center"><?php echo $project_title;?>项目信息修改</h1>
    <form enctype="multipart/form-data" action="admin_prevention_project_update_end.php" method="post">
        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>编号:</td>
                    <td>
                        <input type="text" name="productid"  disabled value="<?php echo $infors[0]['id']; ?>">
                        <input type="text" id="projectid" name="projectid" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                    </td>
                    <td>标题:</td>
                    <td>
                        <input type="text" name="project_title"  disabled value="<?php echo $infors[0]['title']; ?>">
                        <input type="text" id="project_title" name="project_title" hidden readonly value="<?php echo $infors[0]['title']; ?>">
                    </td>

                </tr>
                <tr>
                    <td>积分</td>
                    <td>
                        <input type="text"  name="project_integral" value="<?php echo $infors[0]['integral'];?>">
                    </td>
                    <td>人数</td>
                    <td>
                        <input type="text"  name="project_count" value="<?php echo $infors[0]['count'];?>">
                    </td>
                </tr>
                <tr>
                    <td>项目区域:</td>
                    <td>
                        <select name="area" style="width: 301px">
                            <option value="<?php echo $infors[0]['area'];?>"><?php echo $infors[0]['area'];?></option>
                            <option value="顺河街道">顺河街道</option>
                            <option value="滨湖街道">滨湖街道</option>
                            <option value="栏杆街道">栏杆街道</option>
                            <option value="桂花街道">桂花街道</option>
                        </select>
                    </td>
                    <td>项目类型:</td>
                    <td>
                        <select name="type" style="width: 301px">
                            <option value="<?php echo $infors[0]['type'];?>"><?php echo $infors[0]['type'];?></option>
                            <option value="日常招募">日常招募</option>
                            <option value="长期招募">长期招募</option>
                        </select>
                    </td>

                </tr>

                <div class="layui-form-item">
                    <label class="layui-form-label" style="color: black">内容</label>
                    <div style="background-color: white">
                        <textarea id="demo" style="display: none;" name="project_content"><?php echo $infors[0]['content'];?></textarea>
                    </div>
                    <div>
                        项目图片:
                        <input type="file" name="image">
                    </div>
                </div>
            </table>
            <div style="padding-left: 660px;font-size: 18px">
                <input  type="submit" id="btn_sub" value="修改"></td>
            </div>
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
