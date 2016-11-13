<?php
require_once dirname(__FILE__) . '/lib/class.geetestlib.php';
require_once dirname(__FILE__) . '/configs/configcode.php';
$GtSdk = new GeetestLib(CAPTCHA_ID, PRIVATE_KEY);
session_start();
$user_id =uniqid(true);
$status = $GtSdk->pre_process($user_id); //成功返回1
$_SESSION['gtserver'] = $status;
$_SESSION['user_id'] = $user_id;
echo $GtSdk->get_response_str();
?>