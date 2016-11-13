<?php
header("content-Type:text/html; charset=utf-8");
/**
*封装单文件上传
*/
function uploaded($myFile,$maxsize=2097152,$arr=array('png','jpg','jpeg','gif'),$image=true,$path='uploads'){
if(!$myFile){exit('文件上传失败');}
$size=$myFile['size'];			//文件大小
$tmp_name=$myFile['tmp_name'];	//获取文件的临时存放位置
$name=$myFile['name'];			//获取文件的名称
$type=pathinfo($name,PATHINFO_EXTENSION);	//获取文件的类型
$error=$myFile['error'];		//获取上传文件是否存在错误

/**
*$error 文件错误代号
*检测上传时是否发生错误
*/
if($error>0){	
	switch ($error) {
		case 1:
			$mes='文件超出了服务器限制大小';
			break;
		case 2:
			$mes='文件超出了表单限制的大小';
			break;
		case 3:
			$mes='文件长传中断';
			break;
		case 4:
			$mes='没有找到上传的文件';
			break;
		case 6:
			$mes='没有找到临时目录';
		case 7:
			$mes='PHP拓展程序导致失败';//PHP5.5新增
	}
}

/**
*$size 文件大小
*设置上传文件大小
*/
if($size>$maxsize){
	exit('上传失败！上传文件过大');
}

/**
*$arr 设置允许上传类型
*限制上传类型
*/
if(!in_array(pathinfo($name,PATHINFO_EXTENSION), $arr)){
	exit('上传失败！上传文件类型不合法');
}

/**
*getimagesize() //检测是否为真图片
*/
if(!getimagesize($tmp_name)&&$image){
	exit('上传失败！上传文件异常');
}

/**
*检测是否为post上传
*/
if(!is_uploaded_file($tmp_name)){
	exit('上传失败！上传文件方式不正确');
}

/**
*file_exists()检查文件是否存在
*mk_dir()创建新文件
*/
if(!file_exists($path)){
	mkdir($path,0777,true);
}


$filename=md5(uniqid(microtime(true),true));
$file_path=$path.'/'.$filename.'.'.$type;
move_uploaded_file($tmp_name, $file_path);
echo '上传成功';

}
?>