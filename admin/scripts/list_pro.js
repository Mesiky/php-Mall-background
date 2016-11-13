$(function(){
	$pagenum=1;//设定默认页面
	var $search1=$search2=false;
	propage($pagenum);//初始化
	//绑定分页事件
	$('body').on('click','#page_box span',function(){
		if($(this).attr('class').indexOf('page_choose')==-1){
			$('#page_box').empty();
			switch($(this).text()){
					 case '首页':
					 	$page=1;
					 	break;
					 case '上一页':
					 	$page=parseInt($pagenum)-1;
					 	break;
					 case '下一页':
					 	$page=parseInt($pagenum)+1;
					 	break;
					 case '尾页':
					 	$page=$totalpage;
					 	break;
					 default:
					 	$page=$(this).text();
					 	break;
			}
			$pagenum=$page;
			typeof $search_id=='undefined'?$type=undefined:$type=$search_id;
			if(typeof $sea_content=='undefined'){$sea_content=undefined};
			propage($pagenum,$type,$sea_content);
			$('#page_box').append(page($pagenum,6));
		}
	})	
	//下拉列表事件
	$('#sea_menu').find('.sel1').change(function(){//当第一个下啦列表改变触发事件
		if(typeof $sea_content=='undefined'){$sea_content=undefined};//判断是否有输入关键字
		$search1=select_sea($search1,$search2,this,$sea_content);
	})
	//下拉列表事件
	$('.time_select').find('.sel2').change(function(){//第二个下拉列表改变触发事件
		if(typeof $sea_content=='undefined'){$sea_content=undefined};//判断是否输入关键字
		$search2=select_sea($search2,$search1,this,$sea_content);
	})
	//关键字搜索事件
	$('.search').find('.sea_btn').click(function(){
		if($('.search').find('.sea_txt').val()!=''){
		$sea_content=$('.search').find('.sea_txt').val();
		$b=$star=$end=undefined;//让ajax重新生成分页行，因为异步$totalpage无法更新
		//$star $end 让分页重新获取到数据库解析出来的页数 //ajax已经判断读取过数据
		typeof $search_id=='undefined'?$type=undefined:$type=$search_id;
		propage($pagenum,$type,$sea_content);
		$('#page_box').empty();//取出前面的分页，由ajax重新生成
		}
	})
	/**
	*封装下拉列表
	*/
function select_sea($self,$sea,$this,$search){//封装下拉列表
	if($sea&&$($this).val()!=0){
		$self=$($this).val();
		$search_id=$sea+','+$self;
	}else if($sea&&$($this).val()==0){
		$self=undefined;	
		$search_id=$sea;
	}else{
		$search_id=$self=($($this).val()==0?undefined:$($this).val());
	}
	propage($pagenum,$search_id,$search);
	return $self;
}




})

/**
*删除商品添加事件
*/
function del_pro($id){
	if(window.confirm('确定要删除吗？删除之后此商品信息将全部删除!')){
		window.location="doAdminAction.php?act=delpro&id="+$id;
	}
}