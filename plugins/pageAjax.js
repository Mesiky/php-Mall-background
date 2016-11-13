	
/**
*$page 获取页码
*$totalpage 获取总页数  从数据库中获取
*/
function catepage($page){
				$.ajax({
				type:'GET',//使用get方式提交
				url:'doAdminAction.php?act=listcommodity',//提交到指定页面
				data:{'page':$page},//将页码上传到指定页面，返回数据
				success:function(response){
					$('.tbody').find('.menu').siblings().remove();//将tbody内部清除，防止数据累加
					var json=JSON.parse(response);//转换成json数据
					$totalpage=json.totalpage;//获取到总页数
					list=json.list;//
					var html='';
					$.each(list,function(index,array){
						html+='<tr><td class="td">'+array['Id']+'</td><td class="td">'+array['commodityName']+'</td><td class="td" width="20%"><a href="changecommodity.php?id='+array['Id']+'">修改</a><a href="javascript:void(0)" onclick="del_cate('+array['Id']+')">删除</a></td></tr>';						
					});
					$('.tbody').append(html);
				},
				complete:function(){//complete不管返回是否成功，都执行
					if(typeof $b=='undefined'){//初始化
						$('#page_box').append(page($pagenum));	//插入分页
					}
					$b=1;
				}
			});
		}
function adminpage($page){
				$.ajax({	
				type:'GET',//使用get方式提交
				url:'doAdminAction.php?act=listadmin',//提交到指定页面
				data:{'page':$page},//将页码上传到指定页面，返回数据
				success:function(response){
					$('.tbody').find('.menu').siblings().remove();//将tbody内部清除，防止数据累加
					var json=JSON.parse(response);//转换成json数据
					$totalpage=json.totalpage;//获取到总页数
					list=json.list;//
					var html='';
					$.each(list,function(index,array){
						html+='<tr><td class="td">'+((index+1)+($page-1)*3)+'</td><td class="td">'+array['user']+'</td><td class="td">'+array['email']+'</td><td class="td" width="20%"><a href="changeadmin.php?id='+array['Id']+'">修改</a><a href="javascript:void(0)" onclick="del_admin('+array['Id']+')">删除</a></td></tr>';
					});
					$('.tbody').append(html);
				},
				complete:function(){//complete不管返回是否成功，都执行
					if(typeof $b=='undefined'){//初始化
						$('#page_box').append(page($pagenum,5));	//插入分页
					}
					$b=1;
				}
			});
		}


/**
*$page当前页面
$type 下拉列表排序
*$search 搜索关键字
*/
function propage($page,$type,$search){
				$.ajax({	
				type:'GET',//使用get方式提交
				url:'doAdminAction.php?act=listpro'+($type==undefined?'':'&type='+$type)+($search==undefined?'':'&search='+$search),//提交到指定页面
				data:{'page':$page},//将页码上传到指定页面，返回数据
				success:function(response){
					$('.tbody').find('.menu').siblings().remove();//将tbody内部清除，防止数据累加
					var json=JSON.parse(response);//转换成json数据
					$totalpage=json.totalpage;//获取到总页数
					list=json.list;//
					var html='';
					$.each(list,function(index,array){
						html+='<tr><td class="td">'+array['id']+'</td><td class="td">'+(array['sort_name'].length>10?array['sort_name'].substring(0,10)+'...':array['sort_name'])+'</td><td class="td">'+array['commodityName']+'</td><td class="td">'+(array['is_show']==1?'上架':'下架')+'</td><td class="td"><a href="info_pro.php?id='+array['id']+'">详细</a><a href="edit_pro.php?id='+array['id']+'">修改</a><a href="javascript:void(0)" onclick="del_pro('+array['id']+')">删除</a></td></tr>';
					});
					$('.tbody').append(html);
				},
				complete:function(){//complete不管返回是否成功，都执行
					if(typeof $b=='undefined'){//初始化
						$('#page_box').append(page($pagenum,6));	//插入分页
					}
					$b=1;
				}
			});
		}

/**
*显示用户数据
*
*/
function userpage($page){
				$.ajax({	
				type:'GET',//使用get方式提交
				url:'doAdminAction.php?act=listuser',//提交到指定页面
				data:{'page':$page},//将页码上传到指定页面，返回数据
				success:function(response){
					$('.tbody').find('.menu').siblings().remove();//将tbody内部清除，防止数据累加
					var json=JSON.parse(response);//转换成json数据
					$totalpage=json.totalpage;//获取到总页数
					list=json.list;//
					var html='';
					$.each(list,function(index,array){
						html+='<tr><td class="td">'+((index+1)+($page-1)*3)+'</td><td class="td">'+array['userName']+'</td><td class="td">'+array['userEmail']+'</td><td class="td" width="20%"><a href="edituser.php?id='+array['useid']+'">修改</a><a href="javascript:void(0)" onclick="del_admin('+array['useid']+')">删除</a></td></tr>';
					});
					$('.tbody').append(html);
				},
				complete:function(){//complete不管返回是否成功，都执行
					if(typeof $b=='undefined'){//初始化
						$('#page_box').append(page($pagenum,5));	//插入分页
					}
					$b=1;
				}
			});
		}

/**
*分页按钮显示界面
*/
function page($page,$shownum){
				var $p='';
				if(typeof $end=='undefined' || typeof $star=='undefined'){//设定初始值
					$star=1;//起始点
					$end=($totalpage>$shownum)?$shownum:$totalpage;//分页结束点
				}
				if($page>Math.ceil($end/2)&&$end<$totalpage){$star+=1;$end+=1}//判断尾页是否添加
				if($page<=Math.ceil($end/2)&&$star>1){$star-=1;$end-=1}//判断起始点
				if($star<=$end){
					for(var i=$star;i<$end+1;i++){//循环遍历分页
						$index=$page==1?'<span class="page page_choose">首页</span>':'<span class="page"><a href="javascript:void(0)">首页</a></span>';
						$last=$page==$totalpage?'<span class="page page_choose">尾页</span>':'<span class="page"><a href="javascript:void(0)">尾页</a></span>';
						$prev=$page>1?'<span class="page"><a href="javascript:void(0)">上一页</a></span>':'<span class="page page_choose">上一页</span>';
						$next=$page<$totalpage?'<span class="page"><a href="javascript:void(0)">下一页</a></span>':'<span class="page page_choose">下一页</span>';
						if(i==$page){//判断是否当前页面，取消超链接
							$p+='<span class="page page_choose">'+i+'</span>';
						}else{
							$p+='<span class="page"><a href="javascript:void(0)">'+i+'</a></span>';
						}
					}
				}else{
					alert('查询不到数据,换个关键字搜索吧');
				}
				return $index+$prev+$p+$next+$last;//将分页格式输出
			}