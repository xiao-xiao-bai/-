<?php
include_once ('admin_background_head.php');
include_once('conn.php');
?>
<div>
    <h1 class="layui-bg-green"  align="center" style="font-size: 25px">添加视频信息</h1>
    <hr class="layui-bg-green" >
    <form enctype="multipart/form-data" action="admin_video_add_end.php" method="post">

        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>名称:</td>
                    <td><input type="text" placeholder="请输入名称" name="videoname" ></td>
                </tr>
                <tr>
                    <td>视频:</td>
                    <td>
                        <input type="file" name="video" style="width: 301px">
                    </td>
                </tr>
                <tr style="height: 200px">
                    <td>简介:</td>
                    <td>
                        <textarea name="videocontent" style="width: 100%;height: 100%"></textarea>
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input type="submit" id="btn_sub" value="添加">
                        <button style="margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px">
                            <a href="admin_voluntary_style_add_start.php" style="color: black;font-size: 20px;text-decoration: none">重置</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
