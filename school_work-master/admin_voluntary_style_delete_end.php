<?php
include_once ("conn.php");
$userid = $_POST['userid'];


$sql =<<<SQL
DELETE  FROM thing
WHERE id= $userid
SQL;
$query=mysqli_query($link,$sql);

if($query)
{
    echo "<script>alert('delete sucess');location='admin_voluntary_style_show.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_voluntary_style_show.php';</script>";
}
?>