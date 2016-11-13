<?php
require_once('../include.php');
if(!listadmin()){
	checkMes('没有管理员信息请添加','addadmin.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>listadmin</title>
	<link rel="stylesheet" href="css/main.css">
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script type="text/javascript" src="../plugins/pageAjax.js"></script>
	<script>
		//删除事件
		function del_admin($id){
			if(window.confirm("确定删除么？")){
				window.location="doAdminAction.php?act=del&id="+$id;
			}
		}
		$(function(){
			$pagenum=1;//设定默认页面
			adminpage($pagenum);//初始化
			//绑定事件
			$('body').on('click','#page_box span',function(){
				if($(this).attr('class').indexOf('page_choose')==-1){
					$('#page_box').empty();
					switch($(this).text()){
							 case '首页':
							 	$page=1;
							 	break;
							 case '上一页':
							 	$page=parseInt($pagenum)-1;
							 	break;
							 case '下一页':
							 	$page=parseInt($pagenum)+1;
							 	break;
							 case '尾页':
							 	$page=$totalpage;
							 	break;
							 default:
							 	$page=$(this).text();
							 	break;
					}
					$pagenum=$page;
					adminpage($pagenum);
					$('#page_box').append(page($pagenum,5));
				}
			})	
		})
	</script>
</head>
<body>
	<a href="addadmin.php" class="add_a">添加管理员</a>
	<form action="" method="post">
		<div class="tab">
			<table   cellspacing="0" width="100%" >
				<thead>
					<tr>
						<td colspan="5" bgcolor="#eee" class="td">管理员列表</td>
					</tr>
				</thead>
				<tbody class="tbody">
					<tr class="menu">
						<td class="td">编号</td>
						<td class="td">管理员名称</td>
						<td class="td">管理员邮箱</td>
						<td class="td">修改/删除</td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<div id="page_box"></div>
</body>
</html>