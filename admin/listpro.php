<?php
require_once('../include.php');
checklogin();
if(!@$rows=getInfo()){
	checkMes('查询不到商品信息，请添加','addpro.php');
	exit();
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
	<script src="scripts/list_pro.js"></script>
</head>
<body>
	<a href="addpro.php" class="add_a">添加商品</a>
	<div id="sea_menu">
		<div class="sort_select">
		<span>商品价格：</span>
		<select name="sea_name" class="sel1">
			<option value="0">默认</option>
			<option value="sort_price asc">由低到高</option>
			<option value="sort_price desc">由高到底</option>
		</select>
	</div>
	<div class="time_select">
		<span>上架时间：</span>
		<select name="sea_time" class="sel2">
			<option value="0">默认</option>
			<option value="time asc">最新发布</option>
			<option value="time desc" >历史发布</option>
		</select>
	</div>
	<div class="search">
		<span>搜索</span>
		<label for="" class="sea_label">
			<input type="text" style="width: 110px;"  placeholder="请输入搜索关键字" class="sea_txt">
			<button class="sea_btn">查询</button>
		</label>
	</div>
	</div>
	<form action="" method="post">
		<div class="tab">
			<table   cellspacing="0" width="100%" >
				<thead>
					<tr>
						<td colspan="5" bgcolor="#eee" class="td">商品列表</td>
					</tr>
				</thead>
				<tbody class="tbody">
					<tr class="menu">
						<td class="td">编号</td>
						<td class="td">商品名称</td>
						<td class="td">商品分类</td>
						<td class="td">是否上架</td>
						<td class="td">操作</td>
					</tr>	
				</tbody>
			</table>
		</div>
	</form>
	<div id="page_box"></div>
</body>
</html>