<?php
require_once('../include.php');
checklogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>潮人网-后台管理</title>
	<link rel="stylesheet" href="css/manager.css">
	<script src="http://libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
	<script src="scripts/login.js"></script>
</head>
<body>
	<div id="header">
		<div class="center">
			<div class="logo"></div>
			<div class="tit">后台管理系统</div>
		</div>
	</div>
	<div id="nav">
		<ul>
			<li>欢迎 <?php 
			if(isset($_SESSION['username'])){
				echo $_SESSION['username'];
			}else if(isset($_COOKIE['username'])){
				echo $_COOKIE['username'];
			}
			
			 ?></li>
			<li><span class="nav_icon index_ic"></span><a href="">首页</a></li>
			<li><span class="nav_icon forward_ic"></span><a href="">前进</a></li>
			<li><span class="nav_icon back_ic"></span><a href="">后退</a></li>
			<li class="out"><span class="nav_icon out_ic"></span>退出</li>
		</ul>
	</div>
	<script>
		window.onload=function(){
			var onav=document.getElementById('nav');
			var oli=onav.getElementsByTagName('li');
			for(var i=0;i<oli.length;i++){
				if(oli[i].getAttribute('class')!=null){
					oli[i].style.cursor='pointer';
					oli[i].onclick=function(){
					if(window.confirm('确定要退出么？')){
							window.location='../core/outlogin.php';
					}
				}
			}
		}
	}
	</script>
	<div id="box">
		<div class="side_l">
			<div class="cen_top" >管理员</div>
			<div class="cen_l_bottom">
				<ul>
					<li><strong id="change1" onclick="show('menu1','change1')">+</strong> 商品管理
						<dl id="menu1" >
                        	<dd><a href="addpro.php" target="targetiframe">添加商品</a></dd>
                            <dd><a href="listpro.php?page=1" target="targetiframe">商品列表</a></dd>
                        </dl>
					</li> 
					<li><strong id="change2" onclick="show('menu2','change2')">+</strong> 分类管理
                        <dl id="menu2" >
                        	<dd><a href="addcommodity.php" target="targetiframe">添加分类</a></dd>
                            <dd><a href="listcommodity.php?page=1" target="targetiframe">查看分类</a></dd>
                        </dl>
					</li>
					<li><strong id="change3" onclick="show('menu3','change3')">+</strong> 订单管理</li>
					<li><strong id="change4" onclick="show('menu4','change4')">+</strong> 用户管理
                    <dl id="menu4" >
                    	<dd><a href="adduser.php" target="targetiframe">添加用户</a></dd>
                        <dd><a href="listuser.php?page=1" target="targetiframe">用户列表</a></dd>
                    </dl>
					</li>
					<li><strong id="change5" onclick="show('menu5','change5')">+</strong> 管理员管理
                        <dl id="menu5" >
                        	<dd><a href="addadmin.php" target="targetiframe">添加管理员</a></dd>
                            <dd><a href="listadmin.php?page=1" target="targetiframe">管理员列表</a></dd>
                        </dl>
					</li>
				</ul>
			</div>
		</div>
		<div class="side_r">
			<div class="cen_top cen_r_top">管理信息</div>
			<div class="cen_r_bottom">
					<iframe src="main.php" frameborder="0" width="100%" height="480" name="targetiframe" ></iframe>
			</div>
		</div>
	</div>
	<script>

		var height=document.documentElement.clientHeight;//获取屏幕高度
		var head=document.getElementById('header');
		var head_h=getHeight(head);
		var nav=document.getElementById('nav');
		var nav_h=getHeight(nav);
		var side_l=document.getElementsByClassName('side_l')[0];
		var side_r=document.getElementsByClassName('side_r')[0];
		setHeight(side_l);
		setHeight(side_r);
		//获取计算后的样式
		function getHeight(obj){
			if(window.getComputedStyle){
				return parseInt(window.getComputedStyle(obj,null).height);
			}else if(obj.currentStyle){
				return parseInt(obj.currentStyle['height']);
			}
		}
		function setHeight(obj){
			obj.style.height=height-head_h-nav_h+'px';
		}
   	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='block'){
    	             menu.style.display='none';
    		    }else{
    		         menu.style.display='block';
    		    }
        }
	</script>
</body>
</html>