<?php
// require_once('../include.php');

/**
*检查用户是否存在,登陆是否成功
*/
function checkadmin($ver,$user,$pwd,$ipt){
	$sql="SELECT * FROM chaoren_login WHERE user='{$user}' AND pwd='{$pwd}' ";
	if($ver!=@strtolower($_POST['code1'])){
	checkMes('验证码错误','../admin/login.php');
	exit;
	}
	if($row=SelectOnce(connect(),$sql)){
		$_SESSION['username']=$row['user'];//创建一个session ，识别是否非法进入
		if($ipt){
			date_default_timezone_set('Asia/Shanghai');
			setcookie('username',$row['user'],time()+7*24*3600,'/');
			// setcookie('userId',$row['Id'],time()+7*24*3600);
		}
		checkMes('登录成功','../admin/manager.php');
	}else{
		checkMes('用户名或密码错误','../admin/login.php');
	}
}
/**
*检测用户是否非法登陆
*/
function checklogin(){
	if(@$_SESSION['username']=='' && @$_COOKIE['username']==''){//判断是否登陆过
		checkMes('请登陆','login.php');
	}	
}

/**
*添加管理员
*/
function addadmin(){
	$arr=$_POST;
	if($_POST['user']==' ' || $_POST['pwd']==' '){return $mes='添加失败！用户名或密码不得为空<br/> <a href="addadmin.php">重新添加</a>';}
	$arr['pwd']=md5($arr['pwd']);
	if($arr['email']==''){
		$arr['email']=' ';
	}
	if(Insert(connect(),'chaoren_login',$arr)){
		$mes='添加成功！<br/> <a href="addadmin.php">继续添加</a> <a href="listadmin.php?page=1">查看管理员</a>';
	}else{
		$mes='添加失败！<br/> <a href="addadmin.php">重新添加</a>';
	}
	return $mes;
}
/**
*查看管理员
*/
function listadmin(){
	$sql="SELECT * FROM chaoren_login";
	$mes=SelectAll(connect(),$sql);
	return $mes;
}
/**
*获取修改管理员信息
*/
function editadmin($id){
	$sql="SELECT * FROM chaoren_login WHERE Id={$id}";
	$mes=SelectOnce(connect(),$sql);
	return $mes;
}
/**
*提交修改管理员信息
*/
function changeadmin(){
	$arr=$_POST;
	$arr['pwd']=md5($arr['pwd']);
	$id=$_GET['id'];
	$where='id='.$id;
	if($arr['user']==''|| $arr['pwd']=='d41d8cd98f00b204e9800998ecf8427e'){
	   $mes='账号或者密码不能为空，重新修改。<br/><a href="listadmin.php?id={$id}">重新修改</a>';
	   return $mes;
	}
	if($mes=Update(connect(),'chaoren_login',$arr,$where)>0){
		$mes='信息修改成功<br/> <a href="listadmin.php">查看管理员</a>  <a href="addadmin.php">添加管理员</a>';
	}else{
		$mes='修改失败<br/> <a href="listadmin.php?id={$id}">重新修改</a>' ;
	}
	return $mes;
}
/**
*删除管理员
*/
function deleteadmin(){
	$id=$_GET['id'];
	$where='id='.$id;
	if(Delete(connect(),'chaoren_login',$where)){
		$mes='删除成功<br/> <a href="listadmin.php?page=1">查看管理员</a>';
	}else{
		$mes='删除失败 <br/> <a href="listadmin.php?page=1">重新删除</a>';
	}
	return $mes;
}


