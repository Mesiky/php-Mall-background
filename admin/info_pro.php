<?php
require_once('../include.php');
checklogin();
$id=$_GET['id'];
$str="SELECT * FROM sort_pro as s join sort_img as i on s.id=i.pid WHERE s.id={$id}";
$rows=SelectOnce(connect(),$str);
$img_src=getAllImgPath($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品信息</title>
	<link rel="stylesheet" href="css/sort_pro.css">
</head>
<body>
	<table id="tab" border="1" cellspacing="0">
		<thead>
			<tr>
				<td colspan="2" align="center">商品详细信息</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td width="15%">商品名称</td>
				<td><?php echo $rows['sort_name']?></td>
			</tr>
			<tr>
				<td>商品编号</td>
				<td><?php echo $rows['sort_no']?></td>
			</tr>
			<tr>
				<td>商品分类</td>
				<td><?php echo $rows['pid']?></td>
			</tr>
			<tr>
				<td>商品数量</td>
				<td><?php echo $rows['sort_num']?></td>
			</tr>
			<tr>
				<td>商品价格</td>
				<td><?php echo $rows['sort_price']?></td>
			</tr>
			<tr>
				<td>商品内容</td>
				<td><?php echo $rows['sort_content']?></td>
			</tr>
			<tr>
				<td>商品图片</td>
				<td class="pic">
					<?php foreach($img_src as $img):?>
						<img src=<?php echo 'uploads/'.$img['img_src']?> width="30%" height="30%" alt="">&nbsp;&nbsp;
					<?php endforeach;?>
				</div>
				</td>
			</tr>
			<tr>
				<td>上架时间</td>
				<td><?php echo date('Y-m-d',$rows['time'])?></td>
			</tr>
			<tr>
				<td>是否上架</td>
				<td>
					<?php
						if($rows['is_show']==1){
							echo '上架';
						}else{
							echo '下架';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>是否热销</td>
				<td>
					<?php
						if($rows['is_hot']==1){
							echo '是';
						}else{
							echo '否';
						}
					?>
				</td>
			</tr>
			<tr>
				<td>编辑</td>
				<td><a href=<?php echo 'edit_pro.php?id='.$id?>>修改信息</a> <a href=<?php echo 'del_pro.php?id='.$id?>>删除信息</a></td>
			</tr>
		</tbody>
	</table>
</body>
</html>