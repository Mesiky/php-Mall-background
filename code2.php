<?php
require_once dirname(__FILE__) . '/lib/class.geetestlib.php';
require_once dirname(__FILE__) . '/configs/configcode.php';
session_start();
$GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
$user_id = $_SESSION['user_id'];
$id=$_GET['id'];
if ($_SESSION['gtserver'] == 1) {
	$_SESSION['code']=$id;//防止非法注册
	echo 1;
}else{
	echo 0;
}
?>