<?php
header("Content-Type: text/html;charset=utf-8");
include_once('conn.php');
?>
<?php
$username = $_POST['username'];
$warm_time = $_POST['time'];
$user_warm = $_POST['userwarm'];
?>
<?php
if ($warm_time == 'Morning') {//判断用户输入的时间段进行体温登记
    $sql = <<<SQL
UPDATE user_infor
SET Morning = '{$user_warm}'
WHERE name = '{$username}'
SQL;
    $query=mysqli_query($link,$sql);
    if($query)
    {
        echo "<script>alert('提交成功');location='warm_infor_face.php';</script>";
    }
    else
    {
        echo "<script>alert('提交失败');location='warm_infor_face.php';</script>";
    }

}elseif ($warm_time == 'Noon'){
    $sql = <<<SQL
UPDATE user_infor
SET Noon = '{$user_warm}'
WHERE name = '{$username}'
SQL;
    $query=mysqli_query($link,$sql);
    if($query)
    {
        echo "<script>alert('提交成功');location='warm_infor_face.php';</script>";
    }
    else
    {
        echo "<script>alert('提交失败');location='warm_infor_face.php';</script>";
    }

}else{
    $sql = <<<SQL
UPDATE user_infor
SET Night = '{$user_warm}'
WHERE name = '{$username}'
SQL;
    $query=mysqli_query($link,$sql);
    if($query)
    {
        echo "<script>alert('提交成功');location='warm_infor_face.php';</script>";
    }
    else
    {
        echo "<script>alert('提交失败');location='warm_infor_face.php';</script>";
    }

}


?>
