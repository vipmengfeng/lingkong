<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1,user-scalable=0" />
	<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/public/css/login.css">
	<script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/public/js/jquery-1.7.1.min.js"></script>
	<script language="javascript" type="text/javascript" src="/public/js/jquery.validate.js"></script>
	<script>
$(function(){
    //jquery.validate
	$("#jsForm").validate({
		submitHandler: function() {
			//验证通过后 的js代码写在这里
		}
	})
		
})

//大于指定数
jQuery.validator.addMethod("gt",function(value, element){
    var returnVal = false;
    var gt = $(element).data("gt");
    if(value > gt && value != ""){
        returnVal = true;
    }
    return returnVal;
},"不能小于0 或空");
</script>
</head>
<body>
	<div class="center">
		<div class="company">
			<h1>泊头民政局</h1>
		</div>
		<div class="biaodan">
			<form method="post" action="/index.php/admin/index/login" id="">
				<div class="user controls">
					<input placeholder="用户名" value="" onFocus="this.value=''" name="username" id="userName" required data-msg-required="不能为空">
				</div>
				<div class="user controls">
					<input placeholder="密码" value="" onFocus="this.value=''" name="password" id="userName" type="password" required data-msg-required="不能为空">
				</div>
				<div class="user">
					<button name="Submit" type="submit" class="Button BlueButton Button18">登陆</button>
					<font>mxc v1.0</font>
				</div>
				
			</form>
		</div>
	</div>


</body>
</html>