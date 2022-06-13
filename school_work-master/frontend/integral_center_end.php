<?php
header("Content-Type: text/html;charset=utf-8");
include_once ('conn.php');
session_start();
if (empty($_SESSION['user'])) {
    echo "<script>alert('未登录');location='../login.php';</script>";
} elseif (time() - $_SESSION['time'] < 3600) {
    $_SESSION['time'] = time();
    $name = $_SESSION['user'];
    $productid = $_GET['productid'];
    ?>
<!--    商品总数-->
    <?php
    $sql1 =<<<SQL
select * from product
where id = $productid
SQL;
    $query1 = mysqli_query($link, $sql1);
    $infors1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
    $product_count = $infors1[0]['count'];
    $product_id = $infors1[0]['id'];
    $product_sell = $infors1[0]['sell'];
    $product_money = $infors1[0]['money'];//商品的价格
    ?>
<!--    原有的积分-->
    <?php


//原有的积分
    $sql = <<<SQL
select integral,id from user_infor
where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $id = $infors[0]['id'];
    $user_money = $infors[0]['integral'];//用户已有积分

    ?>
    <?php

    if($product_money > $user_money ){
        echo "<script>alert('积分不足');location='integral_center_face.php';</script>";
    }else if(($product_count - 1) < 0){
        echo "<script>alert('存货不足');location='integral_center_face.php';</script>";

    }else{
        $product_count = $product_count - 1;//商品库存
        $product_sell = $product_sell + 1;//商品销售量
      $sql2=<<<SQL
UPDATE product
SET sell = '{$product_sell}'
WHERE id = $product_id
SQL;
        $query2 = mysqli_query($link, $sql2);//商品库存量
        $user_money = $user_money - $product_money;
        $sql3 =<<<SQL
UPDATE user_infor
SET integral = '{$user_money}'
WHERE name = '{$name}'
SQL;
        $query3 = mysqli_query($link, $sql3);//用户积分
        //积分数量和商品存量是否还有
if($query3 and $query2){
    echo "<script>alert('购买成功');location='integral_center_face.php';</script>";
}else{
    echo "<script>alert('购买失败');location='integral_center_face.php';</script>";
}


    }

    ?>

    <?php
}else{
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>
