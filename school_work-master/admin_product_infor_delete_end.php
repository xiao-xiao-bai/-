<?php
include_once ("conn.php");
$productid = $_POST['productid'];
$sql =<<<SQL
DELETE  FROM product
WHERE id= $productid
SQL;
$query=mysqli_query($link,$sql);

if($query)
{
    echo "<script>alert('delete sucess');location='admin_product_infor_show.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_product_infor_show.php';</script>";
}
?>