<?php
include_once ("conn.php");
$user_id = $_POST['userid'];
$user_integral = $_POST['userintegral'];

$sql=<<<SQL
UPDATE user_infor
SET integral = '{$user_integral}'
WHERE id = $user_id
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('update sucess');location='admin_user_integral_show.php';</script>";
}
else
{
    echo "<script>alert('update fail');location='admin_user_integral_show.php';</script>";
}
?>