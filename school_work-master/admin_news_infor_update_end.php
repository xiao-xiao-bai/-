<?php
include_once ("conn.php");
$news_id = $_POST['news_id'];
$news_title = $_POST['news_title'];
$news_content= $_POST['news_content'];
$news_time = $_POST['news_time'];
$sql=<<<SQL
UPDATE news
SET title = '$news_title',content = '$news_content',time = '$news_time'
WHERE id = $news_id
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('update sucess');location='admin_news_infor_show.php';</script>";
}
else
{
    echo "<script>alert('update fail');location='admin_news_infor_show.php';</script>";
}
?>