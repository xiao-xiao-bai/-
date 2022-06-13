<?php
include_once('conn.php');
?>
<?php
header("Content-Type: text/html;charset=utf-8");
session_start();
if (empty($_SESSION['user'])) {
    echo "<script>alert('未登录');location='../login.php';</script>";
} elseif (time() - $_SESSION['time'] < 3600) {
    $_SESSION['time'] = time();
    $name = $_SESSION['user'];
    $sql =<<<SQL
select path from user_infor
where name = '{$name}'
SQL;
    $query = mysqli_query($link, $sql);
    $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $image = $infors[0]['path'];
    ?>
    <?php
    $id = $_GET['id'];
    $sql2 = <<<SQL
select * from prevention_project
where id = {$id}
SQL;
    $query2 = mysqli_query($link, $sql2);
    $infors2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
    $integral = $infors2[0]['integral'];
    $count = $infors2[0]['count'];
    $count = $count - 1;
    ?>
    <?php
    if ($count >= 0) {
        //修改人数
        $sql3 = <<<SQL
UPDATE prevention_project
SET count = {$count}
where id = {$id}

SQL;
        $query3 = mysqli_query($link, $sql3);
        //原有的积分
        $sql = <<<SQL
select integral,id from user_infor
where name = '{$name}'
SQL;
        $query = mysqli_query($link, $sql);
        $infors = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $id = $infors[0]['id'];
        $count = $infors[0]['integral'] + 0 + $integral;
//添加积分
        $sql1 = <<<SQL
UPDATE user_infor
SET integral = $count
where id = $id
SQL;
        $query1 = mysqli_query($link, $sql1);
        if ($query1) {
            echo "<script>alert('加入成功');location='prevention_project.php';</script>";
        } else {
            echo "<script>alert('加入失败');location='prevention_project.php';</script>";
        }

    } else {
        echo "<script>alert('人数已满，加入失败');location='prevention_project.php';</script>";

    }
    ?>
    <!--    --><?php
} else {
    session_destroy();
    echo "<script>alert('登录超时');location='../login.php';</script>";
}
?>