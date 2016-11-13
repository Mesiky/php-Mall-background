<?php
require_once 'include.php';

if($_GET['act']=='register'){
	echo regAdmin();
}
if($_GET['act']=='regadmin'){
	$username=$_GET['username'];
	if(ckAdmin($username)>0){
		echo 1;
	}else{
		echo 0;
	}
}
if($_GET['act']=='regEmail'){
	$email=$_GET['email'];
	if(checkEmail($email)>0){
		echo 1;
	}else{
		echo 0;
	}
}
if($_GET['act']=='login'){
	echo userlogin();
}
if($_GET['act']=='userOut'){
	echo userOut();
}

?>