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
		<form action="doAdminAction.php?act=adduser" method="post" >
			<table border="1" cellspacing="0" width="100%" bgcolor="#eee" >
				<thead>
					<tr>
						<td colspan="2" class="td">添加用户</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="td">用户名</td>
						<td><input type="text" name="userName" class="addadmin"></td>
					</tr>
					<tr>
						<td class="td">密码</td>
						<td><input type="password" name="userPwd" class="addadmin"></td>
					</tr>
					<tr>
						<td class="td">邮箱</td>
						<td><input type="text" name="userEmail" class="addadmin"></td>
					</tr>
					<tr>
						<td colspan="2" class="td"><input type="submit" value="提交" ></td>
					</tr>
				</tbody>
			</table>
		</form>
	</div>
</body>
</html>