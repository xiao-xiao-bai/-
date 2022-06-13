<?php
include_once ('admin_background_head.php');
include_once('conn.php');
ini_set("error_reporting","E_ALL & ~E_NOTICE");
date_default_timezone_set("PRC");
header("Content-Type: text/html;charset=utf-8");
?>
<?php
$upfile = $_FILES['video'];
$videoname = $_POST['videoname'];
$videocontent = $_POST['videocontent'];

$time = time();
$path="./video/";//定义一个上传后的目录
$fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
do{
    $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
}while(file_exists($path.$newfile));
if(is_uploaded_file($upfile["tmp_name"])){
    //执行文件上传(移动上传文件)
    if(move_uploaded_file($upfile["tmp_name"],$path.$newfile)){
        echo "文件上传成功!";

        //将文件名和路径存储到数据库
        $dbms = 'mysql'; //数据库类型
        $host = 'localhost';  //数据库主机名
        $dbName = 'test';  // 使用的数据库
        $user = 'root';  //数据库连接用户名
        $pass = 'root'; //对应的密码
        $dsn ="mysql:host = $host;dbname=$dbName";
        $pdo = new PDO($dsn,$user,$pass);
        $data = addslashes(fread(fopen($image,"r"),filesize($image)));
        //将图片的名称和路径存入数据库
        $new = $path . $newfile;
        $query = "INSERT INTO video (video_name,video_path,video_content,time) VALUES('{$videoname}','{$new}','{$videocontent}','{$time}')";
        $result = $pdo -> query($query);
        if($result){
            echo "<script>alert('添加成功');location='admin_video_start.php';</script>";
        }
        else{
            echo "<script>alert('添加失败');location='admin_video_start.php';</script>";
        }
    }else{
        die("上传文件失败！");
        echo "<script>alert('添加失败');location='admin_video_start.php';</script>";
    }
}else{
    echo "<script>alert('添加失败');location='admin_video_start.php';</script>";
}
?>