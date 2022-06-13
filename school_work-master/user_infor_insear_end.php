<?php
include_once('conn.php');
?>
<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
date_default_timezone_set("PRC");
header("Content-Type: text/html;charset=utf-8");
$upfile = $_FILES['image'];
$name = $_POST['username'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$phone = $_POST['tel'];
$userage = $_POST['userage'];
$passwords = $_POST['passwords'];
//两次输入的密码进行比较
if($password != $passwords){
    echo "<script>alert('两次密码输入不同');location='login.php';</script>";

}
//查询用户输入的手机号是否注册过
$sql =<<<SQL
select * from user_infor
where phone = '{$phone}'
SQL;
$query = mysqli_query($link,$sql);
$infors = mysqli_fetch_all($query,MYSQLI_ASSOC);
if($infors){
    echo "<script>alert('该手机号已经存在');location='login.php';</script>";
}
//上传头像
$typelist=array("image/jpeg","image/jpg","image/png","image/gif","image/webp");
$path="./userimage/";//定义一个上传后的目录
//2.过滤上传文件的错误号
if($upfile["error"]>0){
    switch($upfile['error']){//获取错误信息
        case 1:
            $info="上传得文件超过了 php.ini中upload_max_filesize 选项中的最大值.";
            break;
        case 2:
            $info="上传文件大小超过了html中MAX_FILE_SIZE 选项中的最大值.";
            break;
        case 3:
            $info="文件只有部分被上传";
            break;
        case 4:
            $info="没有文件被上传.";
            break;
        case 5:
            $info="找不到临时文件夹.";
            break;
        case 6:
            $info="文件写入失败！";break;
    }die("上传文件错误,原因:".$info);
}
//3.本次上传文件大小的过滤（自己选择）
if($upfile['size']>100000){
    die("上传文件大小超出限制");
}
//4.类型过滤
if(!in_array($upfile["type"],$typelist)){
    echo $upfile["type"];
    die("上传文件类型非法!".$upfile["type"]);
}
//5.上传后的文件名定义(随机获取一个文件名)
$fileinfo=pathinfo($upfile["name"]);//解析上传文件名字
do{
    $newfile=date("YmdHis").rand(1000,9999).".".$fileinfo["extension"];
}while(file_exists($path.$newfile));
//6.执行文件上传
//判断是否是一个上传的文件
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
        $query = "INSERT INTO user_infor(name,password,sex,phone,birthday,age,path)VALUES('{$name}','{$password}','{$gender}','{$phone}','{$birthday}','{$userage}','{$new}')";
        $result = $pdo -> query($query);
        if($result){
            echo "<script>alert('注册成功');location='login.php';</script>";
        }
        else{
            echo "<script>alert('注册失败');location='login.php';</script>";
        }
    }else{
        die("上传文件失败！");
        echo "<script>alert('注册失败');location='login.php';</script>";
    }
}else{
    echo "<script>alert('注册失败');location='login.php';</script>";
}
?>
