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
		<div id="login" data_role="page">
			<div id="header">OneChat</div>			
			<div id="content">
				<img src="/Public/Home/img/default/default_head.jpg" />
				<br />
				<form action="" method="post" autocomplete="off">
					<input type="text" id="id" name="id" class="input-box" placeholder="<?php echo ($text_placeholder); ?>" maxlength="20" required>
					<input type="password" id="password" name="password" class="input-box" placeholder="设置密码" maxlength="20" required>
					<input type="password" id="password_2" class="input-box" placeholder="确认密码" maxlength="20" onkeyup="this.value=this.value.replace(/^ +| +$/g,'')" required>
					<button id="submit_button" type="button">注 册</button>
					<a href="<?php echo U('Login/index');?>">现在登录</a>
				</form>
			</div>
			<div id="footer"></div>
		</div>
		<script src="/Public/Home/js/lib/jquery-3.1.0.min.js"></script>
		<script type="text/javascript">
			function validate() {	
				if(!$.trim($("#id").val())){   
					$("#id").focus();
					return;
				}   
				else if( !$.trim($("#password").val()) ){   
					$("#password").focus();
					return;
				} 
				else if(!$.trim($("#password_2").val())  ){   
					$("#password_2").focus();
					return;
				} 
			    else if( $.trim($("#password").val()) != $.trim($("#password_2").val()) ){   
			        alert("您输入的密码不一致，请重新输入");
			        $("#password_2").focus();
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
		</script>
	</body>
</html>