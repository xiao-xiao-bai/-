<?php
include_once ('admin_background_head.php');
?>
<div>
    <h1 class="layui-bg-orange" align="center" style="font-size: 25px">添加商品</h1>
    <form enctype="multipart/form-data" action="admin_product_infor_add_end.php" method="post">

        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>商品名:</td>
                    <td><input type="text" placeholder="请输入商品名" name="productname" ></td>
                </tr>
                <tr>
                    <td>图片:</td>
                    <td>
                        <input type="file" name="image" style="width: 301px">
                    </td>
                </tr>
                <tr>
                    <td>总量:</td>
                    <td><input type="text" placeholder="请输入总量" name="productcount" ></td>
                </tr>
                <tr>
                    <td>单价:</td>
                    <td><input type="text" placeholder="请输入单价" name="productmoney"></td>
                </tr>
                <tr>
                    <td>商品类型:</td>
                    <td>
                        <select name="type"  style="width: 301px">
                            <option value="">请选择类别</option>
                            <option value="项目回馈">项目回馈</option>
                            <option value="保障类">保障类</option>
                            <option value="交流学习">交流学习</option>
                            <option value="商品">商品</option>
                            <option value="感恩卡">感恩卡</option>
                        </select>
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2">
                        <input type="submit" id="btn_sub" value="添加">
                        <button style="margin-left: 80px;background-color: red;border: 1px solid #FFD026;height: 40px;width: 150px">
                            <a href="admin_product_infor_add_start.php" style="color: black;font-size: 20px;text-decoration: none">重置</a>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
<?php
include_once ('admin_background_foot.php');
?>
