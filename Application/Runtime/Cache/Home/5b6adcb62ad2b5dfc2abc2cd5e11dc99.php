<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>OneChat</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="default" />
		<meta name="format-detection" content="telephone=yes"/>
		<meta name="msapplication-tap-highlight" content="no" />
		<link rel="apple-touch-icon-precomposed" href="/Public/Home/img/default/icon.png" />
		<link rel="apple-touch-startup-image" href="/Public/Home/img/default/welcome.png" />
		<link rel="icon" href="/Public/Home/img/default/my.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="/Public/Home/img/default/my.ico" type="image/x-icon" />
		<link rel="bookmark" href="/Public/Home/img/default/my.ico" type="image/x-icon" />
		<link rel="stylesheet" href="/Public/Home/css/login.css" type="text/css" />
		<script src="/Public/Home/js/lib/preventOpenLinksInSafari.js"></script>
	</head>
	<body>
		<div id="login" data-role="page">
			<div id="header">OneChat</div>
			<div id="content">
				<img src="/avatar_img/<?php echo ($head_image); ?>">
				<br>
				<form method="post" autocomplete="off">
					<input type="text" name="id" id="id" class="input-box" placeholder="<?php echo ($text_placeholder); ?>" value="<?php echo ($id); ?>" maxlength="20" required="required">
					<input type="password" name="password" id="password" class="input-box" placeholder="<?php echo ($pw_placeholder); ?>" value="<?php echo ($password); ?>" maxlength="" required="required">
					<button id="submit_button" type="button">log In</button>
				</form>
				<a href="<?php echo U('Register/index');?>">Register Account</a>
				<a id="notice" >I'm a diver >></a>
			</div>
			<div id="footer"></div>
		</div>
		<script src="/Public/Home/js/lib/jquery-3.1.0.min.js"></script>
		<script>
			//验证用户输入
			function validate() {
				if(!$.trim($("#id").val())) {
					$("#id").focus();
					return;
				} else if(!$.trim($("#password").val())) {
					$("#password").focus();
					return;
				}
				$("form").submit();
			}
			document.onkeypress=function EnterPress(e) {
				var e = e || window.event;   
				if(e.keyCode == 13){
					validate();
				}
			};
			$("#submit_button").bind("click",function() {
				validate();
			});
			$("#notice").bind("click",function() {
				$("#id").val("游客");
				$("#password").val("221");
				validate();
			});
		</script>
	</body>
	
</html>