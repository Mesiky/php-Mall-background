<?php
require_once('../include.php');
checklogin();
$id=$_GET['id'];
$str="SELECT * FROM sort_pro as s join chaoren_commodity  as c on s.Tid=c.Id WHERE s.id={$id}";
$rows=SelectOnce(connect(),$str);
$select=getcate();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品信息</title>
	<link rel="stylesheet" href="css/sort_pro.css">
	<link rel="stylesheet" href="css/uploadfile.css">
	<script src="../plugins/ueditor/ueditor.config.js"></script>
	<script src="../plugins/ueditor/ueditor.all.js"></script>
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script src="../plugins/uploadfile.js"></script>
</head>
<body>
<script type="text/javascript">
     var ue = UE.getEditor('sortWrite');
		$(function(){
				uploadfile();
			});
   </script>
	<form action=<?php echo 'doAdminAction.php?act=editpro&id='.$id ?> enctype="multipart/form-data" method="post">
		<table id="tab" border="1" cellspacing="0">
		<thead>
			<tr>
				<td colspan="2" align="center">修改商品信息</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="15%" class="td">商品名称</td>
				<td><input type="text" name="sort_name" value=<?php echo $rows['sort_name']?>></td>
			</tr>
			<tr>
				<td>商品编号</td>
				<td><input type="text" name="sort_no" value=<?php echo $rows['sort_no']?>></td>
			</tr>
			<tr>
				<td>商品分类</td>
				<td>
					<select name="Tid" id="">
						<?php foreach($select as $selects):?>
							<option value=<?php echo $selects['Id']?> <?php echo $selects['Id']==$rows['Tid']?"selected='selected'":null ?>><?php echo  $selects['commodityName']?></option>
						<?php endforeach;?>
					</select>
				</td>
			</tr>
			<tr>
				<td>商品数量</td>
				<td><input type="text" name="sort_num" value=<?php echo $rows['sort_num']?>></td>
			</tr>
			<tr>
				<td>商品价格</td>
				<td><input type="text" name="sort_price" value=<?php echo $rows['sort_price']?>></td>
			</tr>
			<tr>
				<td>上架时间</td>
				<td><input type="text" name="time" value="<?php echo date('Y-m-d',$rows['time'])?>"></td>
			</tr>
			<tr>
				<td>是否上架</td>
				<td>
				<input type="radio" name="is_show" value="0" >下架
				<input type="radio" name="is_show" value="1" >上架
				</td>
			</tr>
			<tr>
				<td>是否热销</td>
				<td>
				<input type="radio" name="is_hot" value="1" >热销
				<input type="radio" name="is_hot" value="0" >非热销
				</td>
			</tr>
			<tr>
				<td>商品图片</td>
					<td>	
					<a href="javascript:void(0)" id="selectFileBtn"><span><em></em><strong>  添加图片</strong></span></a>
						<div id="attachList" class="clear"></div>
				</td>
			</tr>
			<tr>
				<td>商品内容</td>
				<td>
					<textarea name="sort_content" id="sortWrite"  class="sort_content" style="width: 100%;" ><?php echo $rows['sort_content']?></textarea>
				</td>
			</tr>
			<tr>
				<td>编辑</td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</tbody>
	</table>
	</form>
</body>
</html>