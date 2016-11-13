<?php
header("Content-type:text/html; charset=utf-8");
/**
*多文件上传
*/
/*
*@return $file 
*单文件上传返回的是二维数组
*多文件上传返回的是三维数组
*/
function bulidfile(){
	$i=0;
	foreach ($_FILES as $v) {//去掉一维数组
		if(is_string($v['name'])){
			//单文件上传
			$file[$i]=$v;
			$i++;
		}else{
			//多文件上传
			foreach ($v['name'] as $key => $value) {//去掉一维数组
				$file[$i]['name']=$value;//获取到name的一个value
				$file[$i]['size']=$v['size'][$key];//利用多维数组获取方式获取 [$key]为0
				$file[$i]['error']=$v['error'][$key];
				$file[$i]['tmp_name']=$v['tmp_name'][$key];
				$i++;
				//$file[$i] 多维数组
			}
		}

	}
	return $file;//外层数组
}

// 单文件上传形式
 
//	Array(
//		['Myfile']=>Array(
//			['name']='sadsadasd.png',
//			['size']=1000,
//			[error]=0,
//			[tmp_name]=xxxxx
//		)
//	)



 // 多文件上传形式
//	Array(
//		['Myfile']=>Array(
//			['name']=>Array(
//				[0]=>'sadsad.png',
//				[1]=>'sadsad.jpg',
//				[2]=>'xcxcxz.png'
//			)
//			['error']=>Array(
//				[0]=>0,
//				[1]=>1,
//				[2]=>0
//			)
//		)
//	)
/**
*文件上传封装
*
*/
function uploads($path,$maxsize=2097152,$arr=array('png','jpg','jpeg','gif'),$checkImg=true){
	if(!file_exists($path)){//存放文件路径是否存在
		mkdir($path,0777,true);
	}
	$i=0;
	foreach (bulidfile() as $file) {//去一维数组
		if($file['error']==0){ //判断文件上传是否有出错
			//判断上传大小是否超出设置大小
			if($file['size']>$maxsize){
				exit('上传失败！上传文件过大');
			}
			//判断上传类型是否合法
			$ext=pathinfo($file['name'],PATHINFO_EXTENSION);
			if(!in_array($ext, $arr)){
				exit('上传失败！上传文件类型不合法');
			}
			//检测是否为真的图片
			if(!getimagesize($file['tmp_name'])){
				exit('上传失败！上传文件异常');
			}
			//检查是否为post上传
			if(!is_uploaded_file($file['tmp_name'])&&$checkImg){
				exit('上传失败！上传文件方式不正确');
			}
			//设置唯一文件名
			$filename=md5(uniqid(microtime(true),true)).'.'.$ext;
			$destination=$path.'/'.$filename;
			//判断移动文件是否成功
			if(move_uploaded_file($file['tmp_name'], $destination)){
				$file['name']=$filename;//重新获取上传名
				unset($file['error'],$file['size'],$file['tmp_name']);//将$_FILES中没用的删除
				$uploadFile[$i]=$file;//将去除一维数组的数组重新放到一个二维数组中
				$i++;
			}
		}else{
			switch ($file['error']) {
				case 1:
					$mes='文件超出了服务器大小限制';
					break;
				case 2:
					$mes='文件超出了表单限制大小';
					break;
				case 3:
					$mes='文件上传中断';
					break;
				case 4:
					$mes='没有找到上传的文件';
					break;
				case 6:
					$mes='没有找到临时目录';
					break;
				case 7:
					$mes='PHP拓展程序导致失败';
			}
			echo $mes;
		}
	}
	return $uploadFile;
}


//<!-- 结果 -->
// <!-- 
// Array
// (
//     [0] => Array
//         (
//             [name] => 5a404d5bb6fe58d6991b9556fc04b3ed.png
//             [size] => 1336
//             [error] => 0
//             [tmp_name] => E:\wamp\tmp\php7185.tmp
//         )

//     [1] => Array
//         (
//             [name] => 055985a2481b9e886452d903303bf35a.png
//             [size] => 1342
//             [error] => 0
//             [tmp_name] => E:\wamp\tmp\php7186.tmp
//         )

//     [2] => Array
//         (
//             [name] => 521bf6e47d7bf219e1392090da7a2e52.png
//             [size] => 1356
//             [error] => 0
//             [tmp_name] => E:\wamp\tmp\php7197.tmp
//         )

// )
//  -->