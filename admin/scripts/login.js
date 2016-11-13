$(function(){
	$('#login').find('.code1').bind('keyup',function(){
		if($(this).val().length==4){
		$('#login').find('.check_icon').html('<img src="images/loading.gif"/>');		
			$.ajax({
				type:'post',
				url:'../lib/login_func.php',
				data:{
					code1:$(this).val()
				},
				
				success:function(response){
					if(response==1){
						$('#login').find('.check_icon').html('&#xe601;').css('color','green');
					}else{
						$('#login').find('.check_icon').html('&#xe602;').css('color','red');
					}
				}
			})
		}
	})

/**
*后台侧边栏
*/
// $('#box').find('.cen_l_bottom').find('strong').click(function(){
// 	if($(this).html()=='-'){
// 		$(this).html('+');
// 		$('#menu').hide();	
// 	}else{
// 		$(this).html('-');
// 		$('#menu').show();
// 	}
	
// })



})

