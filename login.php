<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>潮人网-用户登录</title>
	<link rel="stylesheet" href="styles/login.css">
	<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://static.geetest.com/static/tools/gt.js"></script>
</head>
<body>
<script>
	var $code=false;
	$(function(){
	//极验验证码
    var handlerPopup = function (captchaObj) {
    	//验证码成功之后执行事件
        captchaObj.onSuccess(function () {
            var validate = captchaObj.getValidate();
            $.ajax({
            	url:'code2.php?id='+Math.random(),
            	data:{},
            	type:'get',
            	success:function(response){
            		if(response==1){
            			$code=true;
            		}
            	}
            });
        });

        //仅对弹出式（popup）有效 show有效的条件
        // $("#popup-submit").click(function () {
        //     captchaObj.show();
        // });

        // 将验证码加到id为captcha的元素里
        captchaObj.appendTo("#popup-captcha");
    };
    // 验证开始需要向网站主后台获取id，challenge，success（是否启用failback）
    //初始化执行
    $.ajax({
        url: "code.php?r=" + Math.random(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "float", 
                offline: !data.success
            }, handlerPopup);
        }
    })

	})
</script>
	<div id="header">
		<div class="center">
			<div class="logo" ></div>
			<div class="title">用户登录</div>
		</div>
	</div>
	<div id="login">
		<span class="tit">欢迎登录</span>
		<form action="doAction.php?act=login" method="post" class="f1">
			<label for="">用户名:</label>
			<div class="user">
				<span class="icon iuser"></span>
				<input type="text" class="txt" name="txt" autocomplete="off" placeholder="请输入用户名" id="txt" >
			</div>
			<label for="">密　码:</label>
			<div class="user">
				<span class="icon ipwd"></span>
				<input type="password" class="pwd"  name="pwd" autocomplete="off" placeholder="请输入密码" id="pwd">
			</div>
			<div id="popup-captcha" class="user ur_code">
			<!-- 验证 -->
			</div>
			<!-- 当选择的时候就会传value -->
			<input type="checkbox" value="1"  name="checkbox"  class="checkbox" ><em>一周内免登陆</em>
			<input type="button" name="btn" value="登陆" class="btn">
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
	<script>
		$(function(){
			var $f1=$('#login').find('.f1');
			$f1.find('.btn').click(function(){
				if($f1.find('#txt').val()==''){
					alert('用户名不得为空，请重新输入!');
				}else if($f1.find('#pwd').val()==''){
					alert('密码不得为空，请重新输入!');
				}else if(!$code){
					alert('请滑动验证码！');
				}else{
					$f1.submit();
				}
			})
		})
	</script>
</body>
</html>