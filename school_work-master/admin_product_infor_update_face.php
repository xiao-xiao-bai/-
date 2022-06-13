<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$product_id = $_GET["productid"];
$sql =<<<SQL
SELECT * FROM product
WHERE id= $product_id
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$product_id = $infors[0]['id'];
$product_name = $infors[0]['name'];
$product_money = $infors[0]['money'];
$product_count = $infors[0]['count'];

?>
<div>
    <h1 align="center"><?php echo $product_name;?>信息修改</h1>
    <form enctype="multipart/form-data" action="admin_product_infor_update_end.php" method="post">

        <div ng-show="show">
            <table cellpadding="10" cellspacing="1" border="soild 1px #000">
                <tr>
                    <td>编号:</td>
                    <td>
                        <input type="text" name="productid"  disabled value="<?php echo $infors[0]['id']; ?>">
                        <input type="text" id="productid" name="productid" hidden readonly value="<?php echo $infors[0]['id']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>名称:</td>
                    <td>
                        <input type="text" name="productname"  disabled value="<?php echo $infors[0]['name']; ?>">
                        <input type="text" id="productname" name="productname" hidden readonly value="<?php echo $infors[0]['name']; ?>">
                    </td>
                    </td>
                </tr>
                <tr>
                    <td>图片:</td>
                    <td>
                        <input type="file" name="image" style="width: 301px">
                    </td>
                </tr>
                <tr>
                    <td>费用</td>
                    <td><input type="text" placeholder="productmoney" name="productmoney" value="<?php echo $product_money;?>"></td>
                </tr>
                <tr>
                    <td>总量:</td>
                    <td><input type="text"  name="productcount" value="<?php echo $product_count;?>"></td>
                </tr>
                <tr>
                    <td>商品类型:</td>
                    <td>
                        <select name="type"  style="width: 301px">
                            <option value="<?php echo $infors[0]['type']; ?>"><?php echo $infors[0]['type']; ?></option>
                            <option value="项目回馈">项目回馈</option>
                            <option value="保障类">保障类</option>
                            <option value="交流学习">交流学习</option>
                            <option value="商品">商品</option>
                            <option value="感恩卡">感恩卡</option>
                        </select>
                    </td>
                </tr>

                <tr align="center">
                    <td colspan="2"><input type="submit" id="btn_sub" value="修改"></td>
                </tr>
            </table>
        </div>
    </form>
</div>
<?php
include_once ('admin_background_foot.php');
?>
