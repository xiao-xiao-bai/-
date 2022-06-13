<?php
include_once ("conn.php");
$admin_name = $_POST['username'];
$admin_password = $_POST['password'];
$admin_phone = $_POST['tel'];
$admin_sex = $_POST['gender'];
$sql=<<<SQL
UPDATE admin_infor
SET password = '$admin_password',sex = '$admin_sex',phone = '$admin_phone'
WHERE name = '$admin_name'
SQL;
$query=mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
if($infors)
{
    echo "<script>alert('update sucess');location='admin_background_face.php';</script>";
}
else
{
    echo "<script>alert('update fail');location='admin_background_face.php';</script>";
}
?>