<?php
require_once('../include.php');
		session_destroy();
		setcookie('username','',time()-1,'/');
		checkMes('退出成功','../admin/login.php');		
?>