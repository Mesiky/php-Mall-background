<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>潮人网-用户注册</title>
	<link rel="stylesheet" href="styles/register.css">
	<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://static.geetest.com/static/tools/gt.js"></script>
	<script src="scripts/register.js"></script>

</head>
<body>
	<div id="header">
		<div class="center">
			<div class="logo" ></div>
			<div class="title">用户注册</div>
		</div>
	</div>
	<div id="login">
		<span class="tit">用户注册</span>
		<form action="doAction.php?act=register" method="post" class="f1">
			<div class="user">
				<label for="">用户名:</label>
				<span class="icon iuser"></span>
				<input type="text" class="txt" name="userName" autocomplete="off" >
				<div class="user_pmt">
					<span class="pmt_ico_i"></span>
					<span class="pmt_ico"></span>
					<span class="pmt_node">&#xe603;</span>
					<strong>可使用4-20位字符,数字,英文,下划线或组合。</strong>
				</div>
				<div class="user_error">
					<span class="error_ico_i"></span>
					<span class="error_ico"></span>
					<span class="error_node">&#xe602;</span>
					<strong>用户名不合法，请重新输入。</strong>
				</div>
			</div>
			<div class="user">
				<label for="">密　码:</label>
				<span class="icon ipwd"></span>
				<input type="password" class="pwd" name="userPwd" autocomplete="off" >
				<div class="user_pmt">
					<span class="pmt_ico_i "></span>
					<span class="pmt_ico"></span>
					<span class="pmt_node">&#xe603;</span>
					<strong>6-16个字符,可为字母，数组或组合,区分大小写。</strong>
				</div>
				<div class="user_error">
					<span class="error_ico_i"></span>
					<span class="error_ico"></span>
					<span class="error_node">&#xe602;</span>
					<strong>密码格式不合法，请重新输入。</strong>
				</div>
			</div>
			<div class="user">
				<label for="">确认密码:</label>
				<span class="icon ipwd"></span>
				<input type="password" class="pwd_te"  name="userPwd" autocomplete="off">
				<div class="user_pmt">
					<span class="pmt_ico_i"></span>
					<span class="pmt_ico"></span>
					<span class="pmt_node">&#xe603;</span>
					<strong>请在输入一遍相同的密码。</strong>
				</div>
				<div class="user_error">
					<span class="error_ico_i"></span>
					<span class="error_ico"></span>
					<span class="error_node">&#xe602;</span>
					<strong>两次密码输入不想同,请重新输入。</strong>
				</div>
			</div>
			<div class="user">
				<label for="">电子邮箱:</label>
				<span class="icon ipwd"></span>
				<input type="email" class="email"  name="userEmail" autocomplete="off">
				<div class="user_pmt">
					<span class="pmt_ico_i"></span>
					<span class="pmt_ico"></span>
					<span class="pmt_node">&#xe603;</span>
					<strong>请输入您的常用电子邮箱。</strong>
				</div>
				<div class="user_error">
					<span class="error_ico_i"></span>
					<span class="error_ico"></span>
					<span class="error_node">&#xe602;</span>
					<strong>电子邮箱格式不正确，请重新输入。</strong>
				</div>
			</div>
			<div id="popup-captcha" class="user ur_code">
			<!-- 验证 -->
			</div>
			<div class="user ur_check">
				<input type="checkbox" value="1"  name="checkbox"  class="checkbox" checked="checked" ><em>同意注册协议</em>
			</div>
			<div style="text-align: center;"><input type="button" name="btn" value="登陆" class="btn"></div>
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