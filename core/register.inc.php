<?php
/**
*查询用户名是否存在
*@return  int 查询返回条数
*/
function ckAdmin($username){
	$sql="SELECT userName FROM chaoren_user where userName= '".$username."'";
	return SelectNum(connect(),$sql);
}

/**
*查询电子邮件是否存在
*@return  int 查询返回条数
*/
function checkEmail($email){
	$sql="SELECT userEmail FROM chaoren_user where userEmail= '".$email."'";
	return SelectNum(connect(),$sql);
}
function regAdmin(){
	$arr=$_POST;
	$arr['userPwd']=md5($arr['userPwd']);
	if(empty($arr['geetest_challenge'])||empty($arr['geetest_validate'])){
		 $mes='注册失败!! <br/> <a href="reg.php">重新注册</a> ';

	}else{
		unset($arr['geetest_challenge'],$arr['geetest_validate'],$arr['geetest_seccode'],$arr['checkbox']);
		if(Insert(connect(),'chaoren_user',$arr)){
			$mes="注册成功!!3秒后自动跳转 <meta http-equiv='refresh' content='3;url=index.php' >";
		}else{
			$mes='注册失败!! <br/> <a href="reg.php">重新注册</a> ';
		}
		
	}
	return $mes;
}

?>