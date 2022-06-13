<?php
/**
 *User:chenqian
 *Date:2022/1/8
 *Time:22:40
 */
session_start();
$str="123456789abcdefghijklmnopqrst";
$strNew = str_shuffle($str);//字符串打乱
$content = substr($strNew,0,4);
$_SESSION['code'] = $content;
$i = imagecreatetruecolor(100,30);//创建画布
$bgcolor = imagecolorallocate($i,mt_rand(100,255),mt_rand(100,255),mt_rand(100,255));
imagefill($i,0,0,$bgcolor);
//画点
for($num = 0;$num < 100;$num ++){
    $color = imagecolorallocate($i,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imagesetpixel($i,mt_rand(0,100),mt_rand(0,30),$color);
}
//画线
for($num = 0;$num < 3;$num ++){
    $color = imagecolorallocate($i,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
    imageline($i,0,mt_rand(0,30),100,mt_rand(0,30),$color);
    
}
for($index = 0;$index < strlen($content);$index ++){
    //写图片
    $x = 15 + 20 * $index;
    $char = $content[$index];
    $color = imagecolorallocate($i,mt_rand(0,155),mt_rand(0,155),mt_rand(0,155));
    imagefttext($i,16,mt_rand(-15,15),$x,28,$color,'./font/msyhbd.ttf',$char);
}
header("content-type:image/png");
imagepng($i);//magepng()是PHP中的一个内置函数，用于在浏览器或文件中显示图像。

?>