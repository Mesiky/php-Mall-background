<?php
/**
*生成缩略图
*/
function thumb($filename,$path,$dst_w=null,$dst_h=null,$scale=0.5){
	list($src_w,$src_h,$imagetype)=getimagesize($filename);
	if($dst_w==null || $dst_h==null){
		$dst_w=ceil($src_w*$scale);
		$dst_h=ceil($src_h*$scale);
	}
	$mime=image_type_to_mime_type($imagetype);
	$src_fun=str_replace('/', 'createfrom', $mime);
	$out_fun=str_replace('/', null, $mime);
	$src_img=$src_fun($filename);
	$dst_img=imagecreatetruecolor($dst_w, $dst_h);
	imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h);
	if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	$out_fun($dst_img,$path.'/'.$filename);
	imagedestroy($src_img);
	imagedestroy($dst_img);
}
?>