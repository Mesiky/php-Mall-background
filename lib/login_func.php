<?php
/**
*注册登录验证码判断
*/
require_once('../include.php');
if(strtolower($_POST['code1'])==$_SESSION['code']){
	echo 1;
}else{
	echo 0;
}

?>