<?php
include_once ('conn.php');
$projectid = $_GET['projectid'];
$sql =<<<SQL
DELETE  FROM prevention_project
WHERE id= {$projectid}
SQL;
$query=mysqli_query($link,$sql);
if($query)
{
    echo "<script>alert('delete sucess');location='admin_prevention_project_show.php';</script>";
}
else
{
    echo "<script>alert('delete fail');location='admin_prevention_project_show.php';</script>";
}


?>