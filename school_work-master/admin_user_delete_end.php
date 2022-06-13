<?php
include_once ("conn.php");
$admin_id = $_POST['userid'];
$sql =<<<SQL
DELETE  FROM user_infor 
WHERE id= $admin_id
SQL;
$query=mysqli_query($link,$sql);

if($query)
{
    echo "<script>alert('delete sucess');location='admin_background_face.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_background_face.php';</script>";
}
?>