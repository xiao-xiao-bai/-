<?php
header("Content-Type: text/html;charset=utf-8");
include_once ("conn.php");
$user_id = $_POST['userid'];
$user_thing = $_POST['thing'];
$time = $_POST['time'];
$sql=<<<SQL
UPDATE thing
SET things = '{$user_thing}',time = '{$time}'
WHERE id = $user_id
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('update sucess');location='admin_voluntary_style_show.php';</script>";
}
else
{
    echo "<script>alert('update fail');location='admin_voluntary_style_show.php';</script>";
}
?>