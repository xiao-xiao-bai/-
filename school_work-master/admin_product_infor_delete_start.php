<?php
include_once ('admin_background_head.php');
?>
<?php
include_once ('conn.php');

$id = $_GET["productid"];
$sql =<<<SQL
SELECT * FROM product
WHERE id= $id
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
$product_id = $infors[0]['id'];
$product_name = $infors[0]['name'];
?>
    <div>
        <form action="admin_product_infor_delete_end.php" method="post">
            <div><h1 align="center" style="font-size: 15px">删除<?php echo $product_name;?>的信息</h1></div>
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
                        <td>题目:</td>
                        <td>
                            <input type="text" name="productname"  disabled value="<?php echo $product_name; ?>">
                        </td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <input type="submit" id="btn_sub" value="删除">
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
<?php
include_once ('admin_background_foot.php');
?>