<?php
require_once('../include.php');
checklogin();
/**
*判断是否查询到分类信息
*/
if(!getcate()){
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
	<script type="text/javascript">
		function del_cate($id){
			if(window.confirm('确定要删除此分类么？')){
				window.location='doAdminAction.php?act=delcate&id='+$id;
			}
		}
		$(function(){
			$pagenum=1;//设定默认页面
			catepage($pagenum);//初始化
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
					catepage($pagenum);
					$('#page_box').append(page($pagenum));
				}
			})	
		})

	</script>
</head>
<body>
	<a href="addcommodity.php" class="add_a">添加分类</a>
	<form action="" method="post">
		<div class="tab">
			<table   cellspacing="0" width="100%" >
				<thead>
					<tr>
						<td colspan="3" bgcolor="#eee" class="td">分类列表</td>
					</tr>
				</thead>
				<tbody class="tbody">
					<tr class="menu">
						<td class="td" width="20%">编号</td>
						<td  class="td">分类名称</td>
						<td  class="td"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
	<div id="page_box"></div>
</body>
</html>