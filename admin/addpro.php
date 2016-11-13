<?php
require_once('../include.php');
checklogin();
if(!$row=getcate()){
	checkMes('没有分类，请添加分类','addcommodity.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/uploadfile.css">
	<script src="../plugins/ueditor/ueditor.config.js"></script>
	<script src="../plugins/ueditor/ueditor.all.js"></script>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script src="../plugins/uploadfile.js"></script>
</head>
<body>
	<script type="text/javascript">
        var ue = UE.getEditor('sort_content');
        $(document).ready(function(){
        	uploadfile();
        });
    </script>
	<form action="doAdminAction.php?act=addpro" method="post" enctype="multipart/form-data">
		<table border="1" cellspacing="0" style="margin:0 auto">
			<thead>
				<tr>
					<td colspan="2" align="center">添加商品</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>商品名称</td>
					<td><input type="text" name="sort_name" placeholder="请输入商品名称"></td>
				</tr>
				<tr>
					<td>商品类型</td>
					<td><select name="Tid" id="">
						<?php foreach($row as $rows):?>
							<option value=<?php echo $rows['Id']?>><?php echo $rows['commodityName']?></option>
						<?php endforeach?>
					</select></td>
				</tr>
				<tr>
					<td>商品货号</td>
					<td><input type="text" name="sort_no" placeholder="请输入商品货号"></td>
				</tr>
				<tr>
					<td>商品数量</td>
					<td><input type="text" name="sort_num" placeholder="请输入商品数量"></td>
				</tr>
				<tr>
					<td>商品市场价</td>
					<td><input type="text" name="sort_price" placeholder="请输入商品价格"></td>
				</tr>
				<tr>
					<td>商品描述</td>
					<td><textarea name="sort_content" id="sort_content" style="resize:none;width: 700px;"></textarea></td>
				</tr>
				<tr>
					<td>商品图片</td>
					<td>
						<a href="javascript:void(0)" id="selectFileBtn"><span><em></em><strong>  添加图片</strong></span></a>
						<div id="attachList" class="clear"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" value="确定"></td>
				</tr>
			</tbody>
		</table>
	</form>
	
</body>
</html>