<?php
include_once ("conn.php");
$news_id = $_POST['news_id'];


$sql =<<<SQL
DELETE  FROM news
WHERE id= $news_id
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('delete sucess');location='admin_news_infor_show.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_news_infor_show.php';</script>";
}
?>