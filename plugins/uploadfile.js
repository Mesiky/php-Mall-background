function uploadfile(){
        	$("#selectFileBtn").click(function(){
        		$fileField = $('<input type="file" name="thumbs[]"/>');
        		$fileField.hide();
        		$("#attachList").append($fileField);
        		$fileField.trigger("click");
        		$fileField.change(function(){
        		$path = $(this).val();
        		$attachItem = $('<div class="attachItem"><div class="left">a.gif</div><div class="right"><a href="javascript:void(0)" title="删除" class="close"></a></div></div>');
        		$attachItem.find(".left").html($path);
        		$("#attachList").append($attachItem);		
        		});
        	});
        	$('body').on('click','#attachList .attachItem a',function(){
        		$(this).parents('.attachItem').prev('input').remove();
        		$(this).parents('.attachItem').remove();
        	})
        	$('#selectFileBtn').hover(function(){
        		$(this).find('em').css('backgroundPosition','right top');
        	},function(){
        		$(this).find('em').css('backgroundPosition','left top');
        	});
}