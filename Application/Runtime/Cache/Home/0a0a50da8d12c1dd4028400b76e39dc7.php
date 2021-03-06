<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>雇员新增</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
</head>
<body class="gray-bg">
	<div class="row">
	<div class="ibox float-e-margins">
			<div class="ibox-content"></div>
	</div>
		
	</div>
	<form method="post" class="form-horizontal" action="/index.php/home/employer/add_employer" name="form1" id="form1">
	<div class="row">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
                        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名</label>

                                <div class="col-sm-4">
                                    <input type="text" name="nickname" class="form-control" required="">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">电话</label>

                                <div class="col-sm-4">
                                    <input type="text" name="tel" class="form-control" required=""><span class="help-block m-b-none">请输入手机号码</span>
                                </div>
                            </div>
                            
                        
            </div>
		</div>
	</div>
	<div class="row">
		<div class="ibox float-e-margins">
		<div class="ibox-content">
		<div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">登录用户名</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="username" required="" value=""> <span class="help-block m-b-none">该用户登录系统时使用的用户名称</span>
                                </div>
        					</div>
        					<div class="form-group">
                                <label class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-4">
                                    <input type="password" name="password" class="form-control" required=""> <span class="help-block m-b-none"></span>
                                </div>
        					</div>
        </div>                 
        </div>
	</div>

	<div class="row">
		<div class="ibox float-e-margins">
		<div class="ibox-content">
		<div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">角色选择</label>

                                <div class="col-sm-4">
                                    <select class="form-control m-b" name="user_perm">
                                        <option value="employer">店员</option>
                                        <option value="finances">财务</option>
                                    </select>
        					    </div>
        					    </div>
        

        <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <input  class="btn btn-primary" type="submit" value="保存内容"></input>
                                </div>
                            </div>
        </div>                 
        </div>
	</div>

	</form>
	
	<script src="/public/js/jquery.min.js?v=2.1.4"></script>
	<script src="/public/js/jquery.form.js"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/plugins/iCheck/icheck.min.js"></script>
    <script type="text/javascript">
		$(function(){
    	$('#form1').ajaxForm({
        beforeSubmit:  checkForm,  // 表单提交执行前检测
        success:       complete,  // 表单提交后执行函数
        dataType: 'json'
    });
    	function checkForm(){
    		return true;
    	}
    	function complete(data){
    		if(data.status==1){
    			alert("员工新增成功");
    			$(".form-control").val("");
    		}else{
    		alert(data.res_tip);
    		}
    	}
    	});
   	</script>
</body>
</html>