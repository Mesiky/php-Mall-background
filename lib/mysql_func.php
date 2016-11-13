<?php
/**
*函数库，被调用时路径与这个没有联系
*/
header("Content-Type:text/html; charset=utf-8");
// function checkcode(){
// 	if($_POST['code1']==$_SESSION['code']){
// 		return 1;
// 	}else{
// 		return 0;
// 	}
// }


/**
*链接数据库
*/
function connect(){
	$conn=mysqli_connect(HOST,NAME,PASSWORD,'chaoren') or die('链接数据库失败'.mysqli_error());
	return $conn;
}

/**
*数据库插入
*/
function Insert($conn,$table,$arr){
	$key=join(',',array_keys($arr));
	$value="'".join("','",array_values($arr))."'";//中间使用','插入
	$sql="INSERT INTO {$table}($key) VALUES ({$value}) ";
	$query=mysqli_query($conn,$sql);
	// return mysqli_affected_rows($conn); 
	return mysqli_insert_id($conn); //返回INSERT ID
	// return $sql;
}

// $arr=array('user'=>'admin','pwd'=>'924256520');
// $table='chaoren_login';
// echo Insert(connect(),$table,$arr);


/**
*修改数据库
*/ 
function Update($conn,$table,$array,$where=null){
	foreach ($array as $key => $value) {
		if(@$str==null){
			$sep='';
		}else{
			$sep=',';
		}
			@$str.=$sep.$key."='".$value."'";
		}
		$sql="UPDATE {$table} SET {$str}".($where==null?null:"where".' '.$where);
		$query=mysqli_query($conn,$sql); 
		return mysqli_affected_rows($conn);
		// return $sql;
	
}
// $arr=array('user'=>'admin','pwd'=>'924256520');
// $table='chaoren_login';
// $where='id=1';
// echo Update(connect(),$table,$arr,$where);



/**
*删除数据库
*/
function Delete($conn,$table,$where){
	$sql="DELETE FROM {$table} ".($where==null?null:'where'.' '.$where);
	$query=mysqli_query($conn,$sql);
	return mysqli_affected_rows($conn);
}
// $table='chaoren_login';
// $where='id=1';
// echo Delete(connect(),$table,$where);


/**
*查询一条数据库
*/
function SelectOnce($conn,$sql){
	$query=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($query);
	return $row;
}
// $sql='SELECT * FROM chaoren_login';
// print_r(SelectOnce(connect(),$sql);


/**
*查询所有数据库数据
*/
function SelectAll($conn,$sql){
	$query=mysqli_query($conn,$sql);
	while (@$row=mysqli_fetch_assoc($query)) {
		$rows[]=$row;
	}
	return $rows;
}
// $sql='SELECT * FROM chaoren_login';
// print_r(SelectAll(connect(),$sql));

/**
*查询所有数据库条数
*@return  @row 返回查询条数
*/
function SelectNum($conn,$sql){
	$query=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($query);
	return $row;
}


/**
*转换成json数据  获取数据库数据转换成json数据提供给前台
*/
function SelectJson($conn,$sql){
	$json='';
	$query=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($query)) {
		$json.=json_encode($row).',';
	}

	return '['.substr($json, 0,strlen($json)-1).']';
}

