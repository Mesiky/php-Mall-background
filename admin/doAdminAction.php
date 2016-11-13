<?php
require_once('../include.php');
/**
*新增管理员
*/
if($_GET['act']=='addadmin'){
	echo addadmin();
	// print_r(addadmin());
}
if($_GET['act']=='changeadmin'){
	echo changeadmin();
	// print_r(changeadmin());
}
if($_GET['act']=='del'){
	echo deleteadmin();
}
if($_GET['act']=='addcommodity'){
	echo addcommodity();
}
if($_GET['act']=='editcommdity'){
	echo editcommdity();
}
if($_GET['act']=='delcate'){
	$id=$_GET['id'];
	if(@checkcate($id)){
		checkMes('此分类下存在商品，不能删除！请先删除商品','listpro.php');
		exit();
	}
	echo delcate();
}
if($_GET['act']=='addpro'){
	echo addpro();
}
if($_GET['act']=='delpro'){
	echo delpro();
}
if($_GET['act']=='deluser'){
	echo deluser();
}
if($_GET['act']=='editpro'){
	$id=$_GET['id'];
	echo editpro($id);
}
if($_GET['act']=='listcommodity'){
	$sql="SELECT * FROM chaoren_commodity";
	echo Apage($sql);
}
if($_GET['act']=='listadmin'){
	$sql="SELECT * FROM chaoren_login";
	echo Apage($sql);
}
if($_GET['act']=='listuser'){
	$sql="SELECT * FROM chaoren_user";
	echo Apage($sql);
}
if($_GET['act']=='listpro'){
	$sql="SELECT * FROM sort_pro AS p join chaoren_commodity AS c ON p.Tid=c.Id ".(isset($_GET['search'])?"where sort_name like '%".$_GET['search']."%' ":'').(isset($_GET['type'])?'order by p.'.$_GET['type']:'');
	echo Apage($sql);	
	// echo $sql;
}
if($_GET['act']=='adduser'){
	echo adduser();
}
if($_GET['act']=='edituser'){
	echo updateuser();
}

?>
