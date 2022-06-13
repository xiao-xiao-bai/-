<?php
include_once('conn.php');
?>
<?php
include_once('admin_background_head.php');
?>
<div class="news_edit">
    <h1 class="layui-bg-green" align="center"><span class="layui-bg-orange">新闻发布</span></h1>
    <hr class="layui-bg-red">
    <div class="" style="width: 80%;margin: 0 auto;height: 50%;">
        <form enctype="multipart/form-data" class="layui-form layui-form-pane" action="admin_news_edit_end.php" method="post" style="font-size: 18px;">
            <div class="layui-form-item">
                <label class="layui-form-label" style="color: black">题目</label>
                <div class="layui-input-inline">
                    <input type="text" name="news_title" lay-verify="required" placeholder="请输入" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                    <label class="layui-form-label" style="color: black">日期选择</label>
                    <div class="layui-input-block">
                        <input type="text" name="news_time" id="date1" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label" style="color: black">内容</label>
                <div>
                    <textarea id="demo" style="display: none;" name="news_content"></textarea>
                </div>
            </div>
            <div>
                上传图片:
                <input type="file" name="pic">
            </div>
            <div class="layui-form-item">
                <button style="height: 40px" class="layui-btn" lay-submit="" lay-filter="demo2"><input type="submit" value="发布" style="background-color: forestgreen;width: 150px;height: 40px;">
                </button>
                <button style="margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px">
                    <a href="admin_news_edit_face.php" style="color: black;font-size: 20px;text-decoration: none">重置</a>
                </button>
            </div>
        </form>
    </div>
</div>
<script>
    layui.use('layedit', function(){
        var layedit = layui.layedit;
        layedit.build('demo', {
            tool: [  'strong','italic','underline','del' ,'|' ,'left', 'center', 'right', '|']
        });
    });
</script>
<script src="//res.layuion.com/layui/dist/layui.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
<script>
    layui.use(['form', 'layedit', 'laydate'], function () {
        var form = layui.form
            , layer = layui.layer
            , layedit = layui.layedit
            , laydate = layui.laydate;

        //日期
        laydate.render({
            elem: '#date'
        });
        laydate.render({
            elem: '#date1'
        });

        //创建一个编辑器
        var editIndex = layedit.build('LAY_demo_editor');

    });
</script>

</body>
</html>
<?php
include_once('admin_background_foot.php');
?>
