<?php
$filename='qwe.jpg';
list($src_w,$src_h,$imagetype)=getimagesize($filename);
$mime=image_type_to_mime_type($imagetype);  //image/jpeg
$src_fun=str_replace('/', 'createfrom', $mime);  //$src_fun=imagecreatefromjpeg
$src_img=$src_fun($filename);  //$src_fun=imagecreatefromjpeg($filename)//变成一个函数 //源目标
$out_fun=str_replace('/', null, $mime);//imagejpeg
$img_50=imagecreatetruecolor(50, 50);//创建相应的画布资源
$img_220=imagecreatetruecolor(220, 220);
$img_350=imagecreatetruecolor(350, 350);
$img_800=imagecreatetruecolor(800, 800);
imagecopyresampled($img_50, $src_img, 0, 0, 0, 0, 50, 50, $src_w, $src_h);//拷贝图像并调整大小
imagecopyresampled($img_220, $src_img, 0, 0, 0, 0, 220, 220, $src_w, $src_h);
imagecopyresampled($img_50, $src_img, 0, 0, 0, 0, 350, 350, $src_w, $src_h);
imagecopyresampled($img_220, $src_img, 0, 0, 0, 0, 800, 800, $src_w, $src_h);
$out_fun($img_50,'uploads/img_50/'.$filename);//输出所有资源
$out_fun($img_220,'uploads/img_220/'.$filename);
$out_fun($img_350,'uploads/img_350/'.$filename);
$out_fun($img_800,'uploads/img_800/'.$filename);
imagedestroy($img_50);//销毁所有画布资源
imagedestroy($img_220);
imagedestroy($img_350);
imagedestroy($img_800);


?>