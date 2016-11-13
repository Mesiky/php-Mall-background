<?php
require_once('../include.php');
checklogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>addadmin</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="tab">
		<form action="doAdminAction.php?act=addcommodity" method="post" >
			<table border="1" cellspacing="0" width="100%" bgcolor="#eee" >
				<thead>
					<tr>
						<td colspan="4" class="td">添加分类</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="td">分类名称</td>
						<td><input type="text" name="commodityName" class="addadmin"></td>
					</tr>
					<tr>
						<td class="td" colspan="2"><input type="submit" value="提交"></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>