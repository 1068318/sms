<?php /*a:1:{s:101:"D:\Program Files (x86)\EasyPHP14.1VC11\data\localweb\t5\sms/application/home\template\user\login.html";i:1514431679;}*/ ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php echo htmlentities(app('config')->get('site.meta_charset')); ?>">
	<title><?php echo htmlentities(app('config')->get('site.title')); ?></title>
	<script type="text/javascript">var base_path="/t5/sms/public/static/css";</script>
	
	<link rel="stylesheet" type="text/css" href="/t5/sms/public/static/css/colorbox.css" /><link rel="stylesheet" type="text/css" href="/t5/sms/public/static/css/ui/ui.base.css" /><link rel="stylesheet" type="text/css" href="/t5/sms/public/static/css/ui/ui.login.css" />
	<link href="/t5/sms/public/static/css/themes/black_rose/ui.css" rel="stylesheet" title="style" media="all" />

	<script type="text/javascript" src="/t5/sms/public/static/js/jquery-1.8.3.min.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.core.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.widget.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.mouse.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/superfish.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/live_search.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/tooltip.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/cookie.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.sortable.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.draggable.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.position.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.button.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.dialog.js"></script><script type="text/javascript" src="/t5/sms/public/static/js/custom.js"></script>



	

	

</head>
<body>
	<div id="page_wrapper">
		<div id="page-header">
			<div id="page-header-wrapper">
				<div id="top">
					<a href="__ROOT__" style="background:url('/t5/sms/public/static/upload/logo/logo.png') left 40% no-repeat;" class='logo'></a>
				</div>
			</div>
		</div>

<script type="text/javascript" src="/t5/sms/public/static/js/ui/ui.tabs.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	// Tabs
	$('#tabs').tabs();
	$("#username").focus();

	//回车提交
	$("#validate").keydown(function(e){  
		var curKey = e.which;  
		if(curKey == 13){
			$("#UserLoginForm").submit();  
		}
	});
});
</script>
		<div id="sub-nav">
          
            <div id="top-buttons">
			</div>           
		</div>
		<div class="clear"></div>
		<div id="page-layout">
			<div id="page-content">
				<div id="page-content-wrapper">

				<div id="tabs">
					<ul>

						<li><a href="#login">用户登录</a></li>
						
						
					</ul>
					<div id="login">
						<form action="<?php echo url(); ?>" id="UserLoginForm" name="UserLoginForm" method="post">
							<ul>
								<li>
									<label for="username" class="desc">
										用户名:
									</label>
									<div>
										<input type="text" tabindex="1" maxlength="20"  name="username" id="username" class="field text full"  />
									</div>
								</li>
								<li>
									<label for="passwd" class="desc" id="validate">
										密　码:
									</label>
				
									<div>
										<input type="password" tabindex="1" maxlength="20"  class="field text full" name="passwd" id="passwd"/>
										<?php echo token(app('config')->get('site.form_token_name'), 'sha1'); ?>
									</div>
								</li>
								<li>
									<div>
										<input type="hidden" value="0" name="rememberme">
										<input type="checkbox" value="1" name="rememberme">&nbsp;30天免登录
									</div>
								</li>
								<li class="buttons">
									<div>
										<button class="ui-state-default ui-corner-all float-right ui-button" type="submit" name="form_sub">登 录</button>
									</div>
								</li>
							</ul>
						</form>
					</div>
					
				</div>

				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
</html>