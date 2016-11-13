<?php
/**
*添加用户
*@return string 
*/
function adduser(){
	$arr=$_POST;
	$arr['userPwd']=md5($arr['userPwd']);
	$sql="SELECT userName FROM chaoren_user where userName= '".$arr['userName']."'";
	if(SelectNum(connect(),$sql)==0){
		if(Insert(connect(),'chaoren_user',$arr)){
			$mes='添加成功 <br> <a href="adduser.php">继续添加</a> | <a href="listuser.php?page=1">查看用户列表</a>';
		}else{
			$mes='添加失败 <br> <a href="adduser.php">重新添加</a>';
		}
	}else{
		$mes='添加失败,用户名已存在! <br> <a href="adduser.php">重新添加</a>';
	}


	return $mes;
}

/**
*删除用户
*@return string 
*/
function deluser(){
	$id=$_GET['id'];
	$where='useid='.$id;
	if(Delete(connect(),'chaoren_user',$where)>0){
		$mes='删除成功! <a href="adduser.php">添加用户</a>  |  <a href="listuser.php?page=1">查看用户</a>';
	}else{
		$mes='删除失败! <a href="listuser.php?page=1">查看用户</a>';		
	}
	return $mes;

}

/**
*显示指定用户信息
* @return array
*/
function edituser($id){
	$sql="SELECT * FROM chaoren_user WHERE useid=".$id;
	return SelectOnce(connect(),$sql);
}

/**
*修改用户信息
*
*/
function updateuser(){
	$id=$_GET['id'];
	$where='useid='.$id;
	$arr=$_POST;
	$arr['userPwd']=md5($arr['userPwd']);
	if(Update(connect(),'chaoren_user',$arr,$where)>0){
		$mes='修改成功！ <br> <a href="listuser.php?page=1">查看用户列表</a>';
	}else if(Update(connect(),'chaoren_user',$arr,$where)==0){
		$mes="修改失败！不可填写原来信息！ <a href=edituser.php?id={$id} >重新修改</a>";
	}else{
		$mes='修改失败！<br> <a href="listuser.php?page=1">查看用户列表</a>';
	}
	return $mes;
}

/**
*用户登录
*@return string
*/
function userlogin(){
	$arr=$_POST;
	$arr['txt']=addslashes($arr['txt']);//放数据库注入 ' or 1=1 #
	$arr['pwd']=md5($arr['pwd']);
	if(!(empty($arr['txt'])||empty($arr['pwd'])||empty($arr['geetest_challenge']))){//判断用户输入是否为空
	   $sql="SELECT * FROM chaoren_user where userName='{$arr['txt']}' AND userPwd='{$arr['pwd']}'";
		if(@SelectOnce(connect(),$sql)>0){//判断用户输入账号及密码是否正确
			if(@$arr['checkbox']==1){//判断用户是否选择免登陆
				setcookie('username',$arr['txt'],time()+360*24*7,'/');//一周内免登陆
			}
			$_SESSION['username']=$arr['txt'];
			$mes="登陆成功！三秒后自动跳转。。<meta http-equiv='refresh' content='3;url=index.php'>";
		}else{
			$mes="登陆失败,请重新登陆!<meta http-equiv='refresh' content='2;url=login.php'> ";
		}
	}else{
		$mes="非法登陆，请重新登陆!<meta http-equiv='refresh' content='2;url=login.php'> ";
	}
	return $mes;
}

/**
*用户退出
*/
function userOut(){
	session_destroy();
	setcookie('username','',time()-1,'/');
	return "退出成功,3秒后自动跳转 <meta http-equiv='refresh' content='2;url=index.php' > ";
}

?>