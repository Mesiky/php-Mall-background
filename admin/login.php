<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>潮人网-后台登陆</title>
	<link rel="stylesheet" href="css/index.css">
	<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="scripts/login.js"></script>
</head>
<body>
	<div id="header">
		<div class="center">
			<div class="logo" ></div>
			<div class="title">后台管理</div>
		</div>
	</div>
	<div id="login">
		<span class="tit">欢迎登陆</span>
		<form action="dologin.php?act=login" method="post" class="f1">
			<label for="">用户名:</label>
			<div class="user">
				<span class="icon iuser"></span>
				<input type="text" class="txt" name="txt" >
			</div>
			<label for="">密　码:</label>
			<div class="user">
				<span class="icon ipwd"></span>
				<input type="password" class="pwd"  name="pwd">
			</div>
			<label for="">验证码:</label>
			<div class=" code">
				<div class=" user codeipt">
					<span class="icon icode"></span>
					<input type="text" class="code1" name="code1">
				</div>
				<div class="codeimg">
					<img class="img" src="imgcode.php?r=<?php echo rand()?>" alt="">
				</div>
				<div class="iconfont check_icon"></div>
			</div>
			<script type="text/javascript">
				var img=document.getElementsByClassName('img')[0];
				img.onclick=function(){
					img.src='imgcode.php?r='+Math.random();
				}
			</script>
			<!-- 当选择的时候就会传value -->
			<input type="checkbox" value="1"  name="checkbox"  class="checkbox" ><em>一周内免登陆</em>
			<input type="submit" name="btn" value="登陆" class="btn">
		</form>
	</div>
	<div id="footer">
		<div class="foot_t">
			 <a href="javascript:void(0)">关于我们</a>
			 <a href="javascript:void(0)">商务合作</a>
			 <a href="javascript:void(0)">合作案例</a>
			 <a href="javascript:void(0)">商务联系</a>
			 <a href="javascript:void(0)">注册协议</a>
			 <a href="javascript:void(0)">免责声明</a>
			 <a href="javascript:void(0)">版权隐私</a>
			 <a href="javascript:void(0)">新浪微博</a>
		</div><br/>
		<span class="information">Copyright © W3Cfuns.com All Rights Reserved. 京ICP备10055601号-2</span>
	</div>
</body>
</html>