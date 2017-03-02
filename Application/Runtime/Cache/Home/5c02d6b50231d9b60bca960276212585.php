<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>灵控汽车租赁管理- 系统注册</title>
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

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">LK</h1>

            </div>
            <h3>欢迎注册 LK</h3>
            <p>创建一个新账户</p>
            <form class="m-t" role="form" method="post" action="/index.php/home/index/register" target="_self">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="请输入用户名" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="company" placeholder="请输入公司名称" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="tel" placeholder="请输入联系电话" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="请输入密码" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password2" placeholder="请再次输入密码" required="">
                </div>
                <div class="form-group text-left">
                    <div class="checkbox i-checks">
                        <label class="no-padding">
                            <input type="checkbox" checked="true"><i></i> 我同意注册协议</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>

                <p class="text-muted text-center"><small>已经有账户了？</small><a href="/index.php/home/display/index" target="_self">点此登录</a>
                </p>

            </form>
        </div>
    </div>
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    </script>
    
</body>

</html>