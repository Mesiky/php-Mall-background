<?php
	require_once('include.php');
	if(!($cases=getcate())){
		checkMes('抱歉网站维护中！！');
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link type="text/css" rel="stylesheet" href="styles/reset.css">
<link type="text/css" rel="stylesheet" href="styles/main.css">
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script>
	$(function(){
	var i=1;
	var j=1;
	setInterval(function(){
		i++;
		if(i>$('.imgbox').find('li').length-1){$('.imgbox').css('left','-810px');i=2};
		$('.imgbox').animate({
			left:-810*i,
		})
		$('.imgnum').children('a').attr('class',' ');
		if(j>=$('.imgnum').find('a').length){j=0;}
		$('.imgnum').find('a').eq(j).attr('class','active');
		j++;
		console.log(j+'---'+i);
	},3000)

	})
</script>
</head>
<body>
<div class="headerBar">
	<div class="topBar">
		<div class="comWidth">
			<div class="leftArea">
				<a href="#" class="collection">收藏潮人</a>
			</div>
			<div class="rightArea">
				欢迎来到潮人网！
				<?php if(isset($_SESSION['username']) || isset($_COOKIE['username'])):?>
				<span>欢迎您</span>
				<?php if(isset($_SESSION['username'])){
							echo $_SESSION['username'];
						}else if(isset($_COOKIE['username'])){
							echo $_COOKIE['username'];
						}
				?>
				<a href="doAction.php?act=userOut">[退出]</a>
			<?php else:?>
				<a href="login.php">[登录]</a><a href="reg.php">[免费注册]</a>
			<?php endif;?>
			</div>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<div class="logo fl">
				<a href="#"><img src="images/logo.png" width="170" height="80"></a>
			</div>
			<div class="search_box fl">
				<input type="text" class="search_text fl">
				<input type="button" value="搜 索" class="search_btn fr">
			</div>
			<div class="shopCar fr">
				<span class="shopText fl">购物车</span>
				<span class="shopNum fl">0</span>
			</div>
		</div>
	</div>
	<div class="navBox">
		<div class="comWidth clearfix">
			<div class="shopClass fl">
				<h3>全部商品分类<i class="shopClass_icon"></i></h3>
				<div class="shopClass_show">
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
					<dl class="shopClass_item">
						<dt><a href="#" class="b">手机</a> <a href="#" class="b">数码</a> <a href="#" class="aLink">合约机</a></dt>
						<dd><a href="#">荣耀3X</a> <a href="#">单反</a> <a href="#">智能设备</a></dd>
					</dl>
				</div>
				<div class="shopClass_list hide">
					<div class="shopClass_cont">
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<dl class="shopList_item">
							<dt>电脑装机</dt>
							<dd>
								<a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a><a href="#">文字字啊</a><a href="#">文字字字啊</a><a href="#">文字啊</a><a href="#">文字</a><a href="#">文字啊</a><a href="#">文字啊</a>
							</dd>
						</dl>
						<div class="shopList_links">
							<a href="#">文字测试内容等等<span></span></a><a href="#">文字容等等<span></span></a>
						</div>
					</div>
				</div>
			</div>
			<ul class="nav fl">
				<li><a href="#" class="active">数码城</a></li>
				<li><a href="#">天黑黑</a></li>
				<li><a href="#">团购</a></li>
				<li><a href="#">发现</a></li>
				<li><a href="#">二手特卖</a></li>
				<li><a href="#">名品会</a></li>
			</ul>
		</div>
	</div>
</div>
<div class="banner comWidth clearfix">
	<div class="banner_bar banner_big">
		<ul class="imgbox">
			<li><a href="#"><img src="images/banner/banner_04.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_01.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_02.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_03.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_04.jpg" alt="banner"></a></li>
			<li><a href="#"><img src="images/banner/banner_01.jpg" alt="banner"></a></li>
		</ul>
		<div class="imgnum">
			<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
		</div>
	</div>
</div>

<?php foreach($cases as $case):?>   	<!--输出全部分类  -->
<?php  if(@checkcate($case['Id'])):?>	<!--判断分类下是否有商品,没有不输出  -->
<div class="shopTit comWidth">
	<span class="icon"></span><h3><?php echo $case['commodityName']?></h3>
	<a href="#" class="more">更多&gt;&gt;</a>
</div>
<div class="shopList comWidth clearfix">
	<div class="leftArea">
		<div class="banner_bar banner_sm">
			<ul class="imgBox">
				<li><a href="#"><img src="images/banner/banner_sm_01.jpg" alt="banner"></a></li>
				<li><a href="#"><img src="images/banner/banner_sm_02.jpg" alt="banner"></a></li>
			</ul>
			<div class="imgNum">
				<a href="#" class="active"></a><a href="#"></a><a href="#"></a><a href="#"></a>
			</div>
		</div>
	</div>
	<div class="rightArea">
		<div class="shopList_top clearfix">
		<?php $sort=get_sortImg($case['Id']);foreach($sort as $sorts):?>
			<div class="shop_item">
				<div class="shop_img">
					<a href=<?php echo 'sortDetail.php?id='.$sorts['id']?> target="_blank"><img src=<?php echo 'img_220/'.$sorts['img_src']?>></a>
				</div>
				<h4><?php echo $sorts['sort_name']?></h4>
				<p class="price_p"><?php echo  $sorts['sort_price']?>元</p>
			</div>	
		<?php endforeach;?>	
		</div>
		<div class="shopList_sm clearfix">
		<?php $smallsort=get_smallImg($case['Id']);foreach($smallsort as $smallsorts):?>
			<div class="shopItem_sm">
				<div class="shopItem_smImg">
					<a href=<?php echo 'sortDetail.php?id='.$smallsorts['id']?>  target="_blank"><img src=<?php echo 'img_50/'.$smallsorts['img_src']?>></a>
				</div>
				<div class="shopItem_text">
					<p><?php echo $smallsorts['sort_name']?></p>
					<h3>￥<?php echo $smallsorts['sort_price']?></h3>
				</div>
			</div>
		<?php endforeach;?>
		</div>
	</div>
</div>
<?php endif;?>
<?php  endforeach;?>

<div class="hr_25"></div>
<div class="footer">
	<p><a href="#">潮人简介</a><i>|</i><a href="#">潮人公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：88888888</p>
	<p>Copyright &copy; 2006 - 2014 潮人版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p>
	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p>
</div>
</body>
</html>
