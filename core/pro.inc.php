<?php
// require_once('../include.php');
/**
*添加商品
*/

 function addpro(){
 	$arr=$_POST;
 	$arr['time']=time();
 	$path='uploads';
 	$upload=uploads($path);
 	if(is_array($upload)&&$upload){
 		foreach ($upload as $uploadfile) {
 			thumb($path.'/'.$uploadfile['name'],'../img_50/'.$uploadfile['name'],50,50);
  			thumb($path.'/'.$uploadfile['name'],'../img_220/'.$uploadfile['name'],220,220);
   			thumb($path.'/'.$uploadfile['name'],'../img_350/'.$uploadfile['name'],350,350);
   			thumb($path.'/'.$uploadfile['name'],'../img_800/'.$uploadfile['name'],800,800);
 		}
 	if($pid=Insert(connect(),'sort_pro',$arr)){
 		foreach ($upload as $uploadfile ) {
 			$arr1['pid']=$pid;
 			$arr1['img_src']=$uploadfile['name'];
 			InsetImg(connect(),$arr1);
 		}
 		$mes="添加成功<br/><a href='addpro.php'>继续添加</a> | <a href='listpro.php?page=1'>查看商品列表</a>";
 	}

 	}else{
 		foreach ($upload as $uploadfile) {
 			if(file_exists("../img_50/".$uploadfile['name'])){
 				unlink("../img_50/".$uploadfile['name']);
 			};
 			if(file_exists("../img_220/".$uploadfile['name'])){
 				unlink("../img_220/".$uploadfile['name']);
 			};
 			if(file_exists("../img_350/".$uploadfile['name'])){
 				unlink("../img_350/".$uploadfile['name']);
 			};
 			if(file_exists("../img_800/".$uploadfile['name'])){
 				unlink("../img_800/{$uploadfile['name']}");
 			};
 		}
 		$mes="添加失败<br/><a href='addpro.php'>重新添加</a> | <a href='listpro.php'>查看商品列表</a>";
 	}
 	return $mes;
 }
/**
*获取商品信息
*/
function getInfo(){
	$str="SELECT * FROM sort_pro";
	$rows=SelectAll(connect(),$str);
	return $rows;
}
/**
*删除商品信息
*/
function delpro(){
	$id=$_GET['id'];
	$where='id='.$id;
	$str="SELECT `img_src` FROM sort_img WHERE id={$id}";
	$name=SelectOnce(connect(),$str);
	if(file_exists("uploads/".$name['img_src'])){
		unlink("uploads/{$name['img_src']}");
	}
	if(file_exists("../img_50/".$name['img_src'])){
		unlink("../img_50/".$name['img_src']);
	}
	if(file_exists("../img_220/".$name['img_src'])){
		unlink("../img_220/".$name['img_src']);
	}
	if(file_exists("../img_350/".$name['img_src'])){
		unlink("../img_350/".$name['img_src']);
	}
	$row=Delete(connect(),'sort_pro',$where);
	$rows=Delete(connect(),'sort_img',$where);//后删除文件名
	if($row && $rows){
		 $mes='删除成功 <br><a href="listpro.php?page=1">查看商品列表</a>';
	}else{
		$mes='删除失败 <br><a href="listpro.php?page=1">查看商品列表</a>'; 
	}
	return $mes;
}
/**
*获取img_src路径
*/
function getAllImgPath($id){
	$str="SELECT `img_src` FROM sort_img where pid={$id}";
	$rows=SelectAll(connect(),$str);
	return $rows;
}
/**
*修改商品信息
*/
function editpro($id){
	$arr=$_POST;
	$arr['time']=strtotime($arr['time']);
	$path='uploads';
	@$uploads=uploads($path);
	if(is_array($uploads)&&$uploads){
		foreach ($uploads as $uploadfile){
			thumb($path.'/'.$uploadfile['name'],'../img_50/'.$uploadfile['name']);
			thumb($path.'/'.$uploadfile['name'],'../img_220/'.$uploadfile['name']);
			thumb($path.'/'.$uploadfile['name'],'../img_350/'.$uploadfile['name']);
			thumb($path.'/'.$uploadfile['name'],'../img_800/'.$uploadfile['name']);
		}
	}
	$where='id='.$id;
	if(Update(connect(),'sort_pro',$arr,$where)){
		if($uploads){
		foreach ($uploads as $uploadfile){
			$arr1['img_src']=$uploadfile['name'];
			Update(connect(),'sort_img',$arr1,$where);
		}
	}
		$mes='修改成功 <br> <a href="addpro.php" target="targetiframe">添加商品信息</a> | <a href="listpro.php?page=1" target="targetiframe">查看商品列表</a>';
	
	}else{
		if(file_exists($path.'/'.$uploadfile['name'])){
			unlink($path.'/'.$uploadfile['name']);
		}
		if(file_exists('../img_50/'.$uploadfile['name'])){
			unlink('../img_50/'.$uploadfile['name']);
		}
		if(file_exists('../img_220/'.$uploadfile['name'])){
			unlink('../img_220/'.$uploadfile['name']);
		}
		if(file_exists('../img_350/'.$uploadfile['name'])){
			unlink('../img_350/'.$uploadfile['name']);
		}
		if(file_exists('../img_800/'.$uploadfile['name'])){
			unlink('../img_800/'.$uploadfile['name']);
		}
		$mes="修改失败 <br> <a href='editpro.php?id={$id}'>重新修改</a> | <a href='listpro.php?page=1'>查看商品列表</a>";
	}
	return $mes;
}

/**
*判断该分类下是否存在商品
*@return Array 
*/
function checkcate($id){
	$sql="SELECT * FROM sort_pro WHERE Tid=".$id;
	return SelectAll(connect(),$sql);
}


/**
*获取商品信息并且获取一张图片
*@return Array
*/
function get_sortImg($id){
	$sql="SELECT s.id,s.sort_name,s.sort_price,i.img_src FROM sort_pro AS s JOIN sort_img AS i ON s.id=i.pid WHERE Tid={$id} GROUP BY s.id limit 4";
	$rows=SelectAll(connect(),$sql);
	return $rows;
}

/**
*获取副商品的商品信息
*/
function get_smallImg($id){
	$sql="SELECT s.id,s.sort_name,s.sort_price,i.img_src FROM sort_pro AS s JOIN sort_img AS i ON s.id=i.pid WHERE Tid={$id} GROUP BY s.id limit 4,4";
	$rows=SelectAll(connect(),$sql);
	return $rows;
}
/**
*获取商品信息
*@return array
*/
function getProInfo($id){
	// $sql="SELECT * FROM sort_pro AS p inner join sort_img AS i ON p.id=i.pid WHERE p.id={$id} GROUP BY i.pid";
	$sql="SELECT * FROM sort_pro AS p inner join chaoren_commodity AS c ON p.Tid=c.Id  WHERE p.id={$id}";
	$rows=SelectOnce(connect(),$sql);
	return $rows;
}

/**
*获取商品信息
*/
function getAllImg($id){
	$sql="SELECT * FROM sort_img WHERE pid={$id}";
	$rows=SelectAll(connect(),$sql);
	return $rows;
}