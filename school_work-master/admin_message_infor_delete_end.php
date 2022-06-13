<?php
include_once ("conn.php");
$message_id = $_POST['messageid'];
$sql =<<<SQL
DELETE  FROM message
WHERE id= $message_id
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('delete sucess');location='admin_message_infor_show.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_message_infor_show.php';</script>";
}
?>