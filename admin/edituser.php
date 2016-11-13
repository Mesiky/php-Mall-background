<?php
require_once('../include.php');
checklogin();
$id=$_GET['id'];
if(!$id){
	checkMes('系统错误1，请重新修改','listadmin.php');
}
$rows=edituser($id);
if(!$rows){
	checkMes('系统错误2，请重新修改','listadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>edituser</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<form action=<?php echo 'doAdminAction.php?act=edituser&id='.$id ?> method="post">
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
						<td ><input type="text" value=<?php echo $rows['userName'] ?> name="userName"  class="changeadmin"></td>
					</tr>
					<tr>
						<td class="td">密码</td>
						<td ><input type="password" value="" name="userPwd"  class="changeadmin"></td>
					</tr>
					<tr>
						<td class="td">邮箱</td>
						<td ><input type="text" name="userEmail"  value=<?php echo $rows['userEmail'] ?>  class="changeadmin"></td>
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