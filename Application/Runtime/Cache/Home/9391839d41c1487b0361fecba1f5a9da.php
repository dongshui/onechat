<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>OneChat</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />    
		<meta name="apple-mobile-web-app-status-bar-style" content="default" />
		<meta name="format-detection" content="telephone=no"/>
		<meta name="msapplication-tap-highlight" content="no" />
		<meta name="application-name" content="OneChat">
		<meta name="description" content="OneChat">
		<meta name="keywords" content="OneChat">
		<link rel="apple-touch-icon-precomposed" href="/Public/Home/img/default/icon.png" />
		<link rel="apple-touch-startup-image" href="/Public/Home/img/default/welcome.png" />
		<link rel="icon" href="/Public/Home/img/default/my.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="/Public/Home/img/default/my.ico" type="image/x-icon" />
		<link rel="bookmark" href="/Public/Home/img/default/my.ico" type="image/x-icon" />
		<link rel="stylesheet" href="/Public/Home/css/lib/swiper.min.css" />
		<link rel="stylesheet" href="/Public/Home/css/lib/lightbox.min.css" />
		<link rel="stylesheet" href="/Public/Home/css/moments.css" />
		<link rel="stylesheet" href="/Public/Home/css/messages.css" />
		<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 1200px)" href="/Public/Home/css/pc.css" />
		<script src="/Public/Home/js/lib/formatImg.js"></script>
		<script src="/Public/Home/js/lib/preventOpenLinksInSafari.js"></script>
	</head>
	<body>
		<div id="top" data-role="header" name="<?php echo ($my_name); ?>">
			<div id="return">
				<img id="back_img" src="/Public/Home/img/default/icon_back.png" alt="" />
				<span id="back">News</span>
			</div>
			<span id="current_location" ontouchstart='return false'>OneChat</span>
			<img id="camera" name="<?php echo ($my_name); ?>" src="/Public/Home/img/default/camera.png" alt="" > 
		</div>	
		<div id="slidebar"></div>
		<div id="slidebar_profile"></div>
		<div id="slide_wall">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<div class="swiper-slide"></div>
		            <div class="swiper-slide"></div>
		            <div class="swiper-slide"></div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
			<div id="avatar" name="<?php echo ($my_name); ?>"><img src="/avatar_img/<?php echo ($avatar); ?>" alt=""></div>
		</div>
		<div id='free'></div>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="info-flow">
				<div class="info-flow-left">
					<img src="/avatar_img/<?php echo ($vo["avatar"]); ?>" alt="">
				</div>
				<div class="info-flow-right" id="<?php echo ($vo["moment_id"]); ?>">
					<div class="info-flow-right-user-name"><?php echo ($vo["user_name"]); ?></div>
					<div class="info-flow-right-text"><?php echo ($vo["info"]); ?></div>
					<?php if($vo["img_url"] != ''): ?><div class="info-flow-right-img">
							<a href="/moment_img/<?php echo ($vo["img_url"]); ?>" data-lightbox="<?php echo ($vo["moment_id"]); ?>">
								<img class="lazy" data-original="/moment_img/<?php echo ($vo["img_url"]); ?>" onload="formatImg(this)" />
							</a>
						</div><?php endif; ?>
					<div class="info-flow-right-time"><?php echo ($vo["time"]); ?></div>
					<?php if($vo["user_name"] == $_SESSION['name']): ?><div class="delete-moment">Delete</div><?php endif; ?>
					<div class="info-flow-right-button">
						<img name="button" class="button-img" src="/Public/Home/img/default/feed_comment.png" />
						<div class="divPop">
							<img class="like-png" src="/Public/Home/img/default/logout_like.png" />
							<img class="comment-png" src="/Public/Home/img/default/logout_comment.png" />  
						</div>
					</div>
					<div class="info-flow-right-like"></div>
					<div class="info-flow-right-comment" ></div>
					<div class="info-flow-right-input" name="div_comment">
						<input type="text" class="comment-box" placeholder="Comment" maxlength="140" required/>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		<div id="loading"><img src="/Public/Home/img/default/loading.gif"></div>
		<div id="footer" data-role="footer">
			<div class="info-flow" >
				<div class="footer-left">
					<img src="/Public/Home/img/default/my.ico" alt="">
				</div>
				<div class="footer-right" >
					<div class="footer-right-user-name"></div>
					<div class="footer-right-text">
						About：<br>
						1. 可以浏览所有人的likes<br>
						2. 可以浏览好友关系的comments<br>
						3. 页面刷新：pc端双击或mobile端长按顶部SixChat<br>
						4. 回车键发送moment,comment或其它<br>
					</div>
					<div class="footer-right-img">
						<img src="/Public/Home/img/default/my.ico" alt="">
					</div>
					<div class="footer-right-time">2018年6月</div>
				</div>
			</div>
		</div> 
		<script src="/Public/Home/js/lib/jquery-3.1.0.min.js"></script>	
		<script src="/Public/Home/js/lib/swiper.min.js"></script>
		<script src="/Public/Home/js/lib/lightbox.min.js"></script>
		<script src="/Public/Home/js/lib/jquery.lazyload.min.js"></script>
		<script type='application/javascript' src="/Public/Home/js/lib/fastclick.js"></script>
		<script src="/Public/Home/js/global.js"></script>
		<script src="/Public/Home/js/moments.js"></script>
	</body>
</html>