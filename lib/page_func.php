<?php
// require_once('../include.php');


function page($table,$num){
	$page=$_GET['page'];//获取当前页码
	$str="SELECT * FROM {$table}";
	$row=SelectNum(connect(),$str);//获取所有查询条数
	$num=3;//设置每页显示数
	$totalpage=ceil($row/$num);//获取到总页数
	if($page<0 || $page==null || !is_numeric($page)){$page=1;};//防止页码超出
	if($page>$totalpage){$page=$totalpage;};//防止页码超出
	$offset=($page-1)*$num;//设置偏移量
	$path=$_SERVER ['PHP_SELF'];
	$index=$page>1?"<span  class='page'><a  href='{$path}?page=1'>首页</a></span>":"<span class='page '>首页</span>";	//首页
	$last=$page<$totalpage?"<span  class='page'><a  href='{$path}?page={$totalpage}'>尾页</a></span>":"<span class='page '>尾页</span>";
	$prevpage=$page-1;
	$nextpage=$page+1;
	$prev=$page>1?"<span  class='page'><a  href='{$path}?page=$prevpage'>上一页</a></span>":"<span class='page '>上一页</span>";
	$next=$page<$totalpage?"<span  class='page'><a  href='{$path}?page=$nextpage'>下一页</a></span>":"<span class='page '>下一页</span>";
	$p='';
	for($i=1;$i<=$totalpage;$i++){//遍历选项卡
		if($i==$page){
			$p.="<span class='page page_choose'>{$i}</span>";
		}else{
			$p.= "<span  class='page'><a  href='{$path}?page={$i}'>{$i}</a></span>";
		}
	}
	$mes=$index.$prev.$p.$next.$last;
	return $mes;
}
/**
*$sql 查询数据
*$num每页显示数量
*@return 返回json数据
*/
function Apage($sql,$num=3){
	$totalnum=SelectNum(connect(),$sql);
	$totalpage=ceil($totalnum/$num);
	$page=$_GET['page'];
	$offset=($page-1)*$num;
	$str=$sql." limit {$offset},{$num}";
	$json='';
	$query=mysqli_query(connect(),$str);
	$arr['totalpage']=$totalpage;
	while ($row=mysqli_fetch_assoc($query)) {
		$json.=json_encode($row).',';
	}
	//动态获取$totalpage                    自动获取到key和value   
	return  '{"totalpage":'.$totalpage.',"list":['.substr($json,0,strlen($json)-1).']}';

//ajax可以动态获到totalpage 并且将list进行单独循环遍历 
//{"totalpage":3,"list":[{"Id":"1","commodityName":"\u624b\u673a\u6570\u7801"},{"Id":"2","commodityName":"\u7ae5\u88c5\u73a9\u5177"},{"Id":"3","commodityName":"\u6237\u5916\u5065\u8eab"}]}
}
?>