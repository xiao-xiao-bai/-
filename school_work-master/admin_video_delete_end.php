<?php
include_once ("conn.php");
$videoid = $_GET['videoid'];
var_dump($videoid);

$sql =<<<SQL
DELETE  FROM video
WHERE id= $videoid
SQL;
$query=mysqli_query($link,$sql);

if($query)
{
    echo "<script>alert('delete sucess');location='admin_vider_start.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_vider_start.php';</script>";
}
?>