<?php
include_once ("conn.php");
$message_id = $_GET['messageid'];

$sql =<<<SQL
DELETE  FROM newcomment
WHERE id= $message_id
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('delete sucess');location='admin_news_usermessage_face.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_news_usermessage_face.php';</script>";
}
?>