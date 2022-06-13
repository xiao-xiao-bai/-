<?php
include_once ("conn.php");
$userid = $_GET['userid'];
$sql =<<<SQL
DELETE  FROM help
WHERE id= $userid
SQL;
$query=mysqli_query($link,$sql);

if($query)
{
    echo "<script>alert('delete sucess');location='admin_seek_help_show.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_seek_help_show.php';</script>";
}
?>