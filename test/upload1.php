<?php
header("Content-type:text/html; charset=utf-8");
/**
*多文件上传
*/
/*
*@return $file 二维数组
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



?>
<!-- 单文件上传形式 -->
<!-- 
	Array(
		['Myfile']=>Array(
			['name']='sadsadasd.png',
			['size']=1000,
			[error]=0,
			[tmp_name]=xxxxx
		)
	)

 -->

 <!-- 多文件上传形式 -->
 <!-- 
	Array(
		['Myfile']=>Array(
			['name']=>Array(
				[0]=>'sadsad.png',
				[1]=>'sadsad.jpg',
				[2]=>'xcxcxz.png'
			)
			['error']=>Array(
				[0]=>0,
				[1]=>1,
				[2]=>0
			)
		)
	)
  -->

