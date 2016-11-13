$(function(){
		//极验验证码
	var $code=false;
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

	//提示信息显示
	$('#login').find('.user').find('input').on('focus',function(){
		$(this).next('.user_pmt').show();
		$(this).nextAll('.user_error').hide();
	})
	//用户名提示
	var $txt=$('#login').find('.user').find('.txt');
	$txt.on('blur',function(){
		$(this).next('.user_pmt').hide();
		var ur_reg=/\w{4,20}/i;
		if(!ur_reg.test($txt.val())){
			$(this).nextAll('.user_error').show();
		}
		//判断用户名是否被注册
		$.ajax({
			type:'get',
			url:'doAction.php?act=regadmin',
			data:{
				username:$('#login').find('.txt').val()
			},
			success:function(response){
				if(response==1){
					$txt.nextAll('.user_error').show().find('strong').html('该用户名已被注册，请更换其他用户名!');
				}
			}
		})
	})
	//密码提示
	$('#login').find('.user').find('.pwd').on('blur',function(){
		$(this).next('.user_pmt').hide();
		var pwd_reg=/[0-9a-zA-Z]{6,16}/i;
		if(!pwd_reg.test($('#login').find('.pwd').val())){
			$(this).nextAll('.user_error').show();
		}
	})
	//再次输入密码
	$('#login').find('.user').find('.pwd_te').on('blur',function(){
		$(this).next('.user_pmt').hide();
		if($('#login').find('.pwd').val()!=$('#login').find('.pwd_te').val()){
			$(this).nextAll('.user_error').show();
		}
	})
	//电子邮件
	$email=$('#login').find('.user').find('.email');
	$email.on('blur',function(){
		$(this).next('.user_pmt').hide();
		var email_reg=/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
		if(!email_reg.test($email.val())){
			$(this).nextAll('.user_error').show();
		}
		//判断电子邮件是否被注册
		$.ajax({
			type:'get',
			url:'doAction.php?act=regEmail',
			data:{
				email:$('#login').find('.email').val()
			},
			success:function(response){
				if(response==1){
					$email.nextAll('.user_error').show().find('strong').html('该邮箱已被注册，请更换其他邮箱!');
				}
			}
		})
	})
	//提交事件
	    $('.f1').find('.btn').click(function(){
	    var $flag=true;
    	for(var i=0;i<$('#login').find('.user_error').length;i++){
    		if($('#login').find('.user_error').eq(i).css('display')=='block'){
    			$flag=false;
    		}
    	}
    	if($('.f1').find('.txt').val().length==0){
    		alert('用户名不得为空');
    	}else if(!$code){
    		alert('请输入验证码');
    	}else if(!$flag){
    		alert('注册信息错误，请修改注册信息!');
    	}else{
    		$('.f1').submit();
    	}

    })
	    //复选框触发事件
 	$('.checkbox').change(function(){
		if(!$(this).prop('checked')){
			$('.btn').attr('disabled',true);
		}else{
			$('.btn').attr('disabled',false);
		}
   })

});