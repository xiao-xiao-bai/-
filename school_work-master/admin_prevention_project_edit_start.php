<?php
include_once('admin_background_head.php');
?>
<h1 class="layui-bg-green" align="center">防疫项目信息发布</h1>
<hr class="layui-border-cyan">
<div style="font-size: 18px">
    <form enctype="multipart/form-data" class="layui-form layui-form-pane"
          action="admin_prevention_project_edit_end.php" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">项目标题</label>
            <div class="layui-input-block">
                <input type="text" name="project_title" autocomplete="off" placeholder="请输入标题" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">项目积分</label>
                <div class="layui-input-inline">
                    <input type="text" name="project_integral" lay-verify="required" placeholder="请输入"
                           autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">项目人数</label>
                <div class="layui-input-inline">
                    <input type="text" name="project_count" lay-verify="required" placeholder="请输入" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">项目区域</label>
                <div class="layui-input-block">
                    <select name="area" style="width: 301px">
                        <option value="">请选择类别</option>
                        <option value="顺河街道">顺河街道</option>
                        <option value="滨湖街道">滨湖街道</option>
                        <option value="栏杆街道">栏杆街道</option>
                        <option value="桂花街道">桂花街道</option>
                    </select>
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">项目类型</label>
                <div class="layui-input-inline">
                    <select name="type" style="width: 301px">
                        <option value="">请选择类别</option>
                        <option value="日常招募">日常招募</option>
                        <option value="长期招募">长期招募</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">开始日期</label>
                <div class="layui-input-block">
                    <input type="text" name="date" id="date1" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">结束日期</label>
                <div class="layui-input-inline">
                    <input type="text" name="date1" id="date1" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">项目地点</label>
                <div class="layui-input-block">
                    <input type="text" name="site" id="site" placeholder="请输入" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-inline">
                <label class="layui-form-label">提供物资</label>
                <div class="layui-input-inline">
                    <input type="text" name="safeguard" id="safeguard" placeholder="请输入" autocomplete="off"
                           class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">时间安排</label>
            <div class="layui-input-block">
                <input type="text" name="explain" autocomplete="off" placeholder="请输入" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label" style="color: black">内容</label>
            <div style="background-color: white">
                <textarea id="demo" style="display: none;" name="project_content"></textarea>
            </div>
        </div>
        项目图片:
        <input type="file" name="image">
</div>
<div class="layui-form-item">
    <input class="layui-bg-blue"
           style="font-size: 20px;margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px"
           type="submit" value="发布">
    <button style="margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px">
        <a href="admin_product_infor_add_start.php" style="color: black;font-size: 20px;text-decoration: none">重置</a>
    </button>
</div>
</form>
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
    });
</script>
<script>
    layui.use('layedit', function () {
        var layedit = layui.layedit;
        layedit.build('demo', {
            tool: ['strong', 'italic', 'underline', 'del', '|', 'left', 'center', 'right', '|']
        });
    });
</script>


</div>
<?php
include_once('admin_background_foot.php');
?>
