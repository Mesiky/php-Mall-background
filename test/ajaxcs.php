<?php
require_once('../include.php');
$sql="SELECT * FROM chaoren_commodity";
$totalnum=SelectNum(connect(),$sql);
$num=3;
$totalpage=ceil($totalnum/$num);
$page=$_GET['page'];
$offset=($page-1)*$num;
$str="SELECT * FROM chaoren_commodity limit {$offset},{$num}";
$json='';
$query=mysqli_query(connect(),$str);
$arr['totalpage']=$totalpage;
while ($row=mysqli_fetch_assoc($query)) {
	$arr['list'][]=array(
			'Id'=>$row['Id'],
			'commodityName'=>$row['commodityName']
		);
};
echo json_encode($arr);

?>