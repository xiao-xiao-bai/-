<?php
include_once('conn.php');
?>
<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
date_default_timezone_set("PRC");
header("Content-Type: text/html;charset=utf-8");
$id = $_POST['videoid'];
$upfile = $_FILES['video'];
$videoid = $_POST['videoid'];
$videocontent = $_POST['videocontent'];
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
        $query = "UPDATE video SET video_path = '$new',video_content = '{$videocontent}'  WHERE id = $id";
        $result = $pdo -> query($query);
        if($result){
            echo "<script>alert('修改成功');location='admin_video_start.php';</script>";
        }
        else{
            echo "<script>alert('修改成功');location='admin_video_start.php';</script>";
        }
    }else{
        die("上传文件失败！");
        echo "<script>alert('修改成功');location='admin_video_start.php';</script>";
    }
}else{
    echo "<script>alert('修改成功');location='admin_video_start.php';</script>";
}

?>