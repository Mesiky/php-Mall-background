<?php
require_once('../include.php');
checklogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="tab">
		<table border="1" cellspacing="0" width="100%" bgcolor="#eee" >
			<thead>
				<tr>
					<td colspan="2" align="center">版本信息</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="20%" class="td"> 操作系统</td>
					<td><?php echo PHP_OS?> </td>
				</tr>
				<tr>
					<td class="td">Apache版本</td>
					<td><?php echo apache_get_version()?></td>
				</tr>
				<tr>
					<td class="td">PHP版本</td>
					<td><?php echo phpversion()?></td>
				</tr>

			</tbody>
		</table>
	</div>
	<div class="tab">
		<table border="1" cellspacing="0" width="100%" bgcolor="#eee" >
			<thead>
				<tr>
					<td colspan="2" align="center">软件信息</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td width="20%" class="td">系统名称</td>
					<td>潮人信息网</td>
				</tr>
				<tr>
					<td class="td">开发团队</td>
					<td>*******************</td>
				</tr>
				<tr>
					<td class="td">网站地址</td>
					<td>http://www.biucrw.com</td>
				</tr>

			</tbody>
		</table>
	</div>
</body>
</html>