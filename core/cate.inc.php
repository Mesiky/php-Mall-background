<?php
// require_once('../include.php');
/**
*添加新分类
*@return string
*/
function addcommodity(){
	$arr=$_POST;
	if($_POST['commodityName']==''){return $mes='分类名不能为空';};
	if(Insert(connect(),'chaoren_commodity',$arr)){
		$mes='添加成功！<br/> <a href="addcommodity.php">继续添加</a> <a href="listcommodity.php?page=1">查看商品分类</a>';
	}else{
		$mes='添加失败!<br/> <a href="addcommodity.php">重新添加</a> <a href="listcommodity.php?page=1">查看商品分类</a>';		
	}
	return $mes;
}
/**
*修改分类
*@return string
*/
function editcommdity(){
	$arr=$_POST;
	$where=" id={$_GET['id']}";
	if(Update(connect(),'chaoren_commodity',$arr,$where)>0){
		$mes='修改成功!<br/> <a href="addcommodity.php">添加新分类</a> <a href="listcommodity.php?page=1">继续修改</a>';		
	}else{
		$mes='修改失败!<br/> <a href="listcommodity.php">重新修改</a> <a href="listcommodity.php?page=1">查看商品分类</a>';			
	}
	return $mes;
	
}
/**
*删除分类
*@return string
*/
function delcate(){
	$where="id={$_GET['id']}";
	if(Delete(connect(),'chaoren_commodity',$where)>0){
		$mes='删除成功!<br/> <a href="addcommodity.php">添加新分类</a> <a href="listcommodity.php?page=1">继续删除</a>';
	}else{
		$mes='删除失败!<br/> <a href="listcommodity.php">重新删除</a> <a href="listcommodity.php?page=1">查看商品分类</a>';		
	}
	return $mes;
}

/**
*获取分类条数
*@return number
*/
function getcate(){
	$sql="SELECT * FROM chaoren_commodity";
	$row=SelectAll(connect(),$sql);
	return $row;
}


?>