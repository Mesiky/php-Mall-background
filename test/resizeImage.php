<?php
$filename='qwe.jpg';//设置文件名
$src_img=imagecreatefromjpeg($filename);//使用URL创建一个新图像
$getimg=getimagesize($filename);//获取到文件的信息
list($img_w,$img_h)=$getimg;//获取文件长宽
$scale=0.1;//设置缩放比例
$resize_w=ceil($img_w*$scale);
$resize_h=ceil($img_h*$scale);
$resize_img=imagecreatetruecolor($resize_w, $resize_h);//资源句柄
imagecopyresampled($resize_img,$src_img, 0, 0, 0, 0, $resize_w, $resize_h, $img_w, $img_h);
//重采样拷贝部分图像并调整大小 
imagejpeg($resize_img,'uploads/'.$filename);//输出图像
imagedestroy($src_img);//释放内存
imagedestroy($resize_img);//释放内存



?>