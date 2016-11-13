<?php
/**
*使用GD库制作动态验证码
*$code 选择验证码类型（单数字，数字加字母，）
*$num 验证码个数
*$small_n 字母干扰元素个数
*$$line_n 线条干扰元素个数
*/

function imagecode($codetype='$code2',$num=4,$small_n=20,$line_n=5){
	$width=100;
	$height=40;
	$image=imagecreatetruecolor($width, $height);
	$white=imagecolorallocate($image,255, 255, 255);
	imagefill($image, 0, 0, $white);
	$code=range('a', 'z');
	$code1=range('A', 'Z');
	$code2=array_merge(range(0, 9),range('a', 'z'),range('A', 'Z'));//合并成一个数组
	shuffle($code2);//乱序
	$str='';
	foreach ($code2 as $key => $value) {
		$str.=$value;
	}
	$fontarr=array('msyh.ttf','msyhbd.ttf','simhei.ttf','ygyxsziti2.0.ttf');
	$sessionName='';
	for($j=0;$j<$small_n;$j++){
		$text=substr($str, $j,1);
		shuffle($fontarr);
		$fontfile='../font/'.$fontarr[0];
		$color1=imagecolorallocate($image, rand(150,255), rand(150,255),rand(150,255));
		imagettftext($image,10, rand(-40,40), rand(0,100), rand(0,40),$color1, $fontfile, $text);
	}
	for($i=0;$i<$num;$i++){
		$text=substr($str, $i,1);
		$sessionName.=$text;
		shuffle($fontarr);
		$fontfile='../font/'.$fontarr[0];
		$x=$width*$i/$num+rand(7,12);
		$color=imagecolorallocate($image, rand(0,120), rand(0,120), rand(0,120));
		imagettftext($image, 18, rand(-40, 40),$x, rand(25, 30), $color, $fontfile, $text);
	}
	$_SESSION['code']=strtolower($sessionName);
	for($q=0;$q<$line_n;$q++){
		$color1=imagecolorallocate($image, rand(150,255), rand(150,255),rand(150,255));
		imageline($image, rand(0,100), rand(0,40), rand(0,100), rand(0,40), $color1);

	}

	header("Content-Type:image/gif");
	imagegif($image);
	imagedestroy($image);
}
/**
*生成缩略图
*$filename 文件路径
*$path 保存路径
*$dst_w $dst_h 缩略图片尺寸
*$scale 缩略图比例
*/
function thumb($filename,$destination,$dst_w=null,$dst_h=null,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);//获取到要源图像的信息
						//$imagetype获取的是0-5
	if(is_null($dst_w) || is_null($dst_h)){
		$dst_w=$src_w*$scale;
		$dst_h=$src_h*$scale;
	}
	$mime=image_type_to_mime_type($imagetype);//image/png 判断文件的mime类型
	$src_fun=str_replace('/', 'createfrom', $mime); //生成字符串函数imagecreatefrompng/jpg
	$src_image=$src_fun($filename);//生成源目标图像
	$out_fun=str_replace('/', null, $mime);//生成字符串函数imagepng/jpg 
	$dst_image=imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_image, $src_image,0,0,0,0, $dst_w, $dst_h, $src_w, $src_h);
	if(!file_exists($destination)){
		@mkdir(dirname($destination),0777,true);//判断存放文件路径是否存在，不存在则新建
	}
	$out_fun($dst_image,$destination);//输出图片并保存图片
	imagedestroy($src_image);
	imagedestroy($dst_image);



}
?>