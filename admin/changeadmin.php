<?php
require_once('../include.php');
checklogin();
$id=$_GET['id'];
if(!$id){
	checkMes('系统错误1，请重新修改','listadmin.php');
}
$rows=editadmin($id);
if(!$rows){
	checkMes('系统错误2，请重新修改','listadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>changeadmin</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<form action=<?php echo 'doAdminAction.php?act=changeadmin&id='.$id ?> method="post">
		<div class="tab">
			<table   cellspacing="0" width="100%" bgcolor="#eee">
				<thead>
					<tr>
						<td colspan="5" class="td">管理员信息修改</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="td">用户名</td>
						<td ><input type="text" value=<?php echo $rows['user'] ?> name="user"  class="changeadmin"></td>
					</tr>
					<tr>
						<td class="td">密码</td>
						<td ><input type="password" value="" name="pwd"  class="changeadmin"></td>
					</tr>
					<tr>
						<td class="td">邮箱</td>
						<td ><input type="text" name="email"  value=<?php echo $rows['email'] ?>  class="changeadmin"></td>
					</tr>
					<tr>
						<td class="td" colspan="2" ><input type="submit" value="确认修改"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</form>
</body>
</html>