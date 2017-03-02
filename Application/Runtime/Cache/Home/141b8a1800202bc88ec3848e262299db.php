<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>客户新增</title>

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet">

</head>

<body class="gray-bg">
<form method="post" class="form-horizontal" id="form1" name="form1" action="/index.php/home/customer/add_customer_o">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>企业客户新增 <small>请认真填写各项内容</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系人</label>

                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="text" name="contract" placeholder="姓名" class="form-control" required="">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="mobile" placeholder="手机号码" class="form-control" required="">
                                    </div>
                                    <div class="col-md-4">
                                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                         <div class="form-group">
                                        <label class="col-sm-2 control-label">企业名称</label>

                                        <div class="col-sm-4">
                                            <input type="text" placeholder="企业名称" class="form-control" required="" name="company_name">
                                        </div>
                                    </div>
                        <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">联系地址</label>

                                        <div class="col-sm-10">
                                            <input type="text" placeholder="企业所在地址" class="form-control" required="" name="address">
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">联系电话</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="联系电话" required="" name="tel" class="form-control"> <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                                    <div class="hr-line-dashed"></div>  
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">备注</label>
                                        <div class="col-sm-10">
                                            <input type="text" placeholder="备注" name="beizhu" class="form-control"> <span class="help-block m-b-none"></span>
                                        </div>
                                    </div>
                        </div>
                 </div>   
            </div>   
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>其他信息 <small>请认真填写各项内容</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                                    <div class="hr-line-dashed"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">会员类型</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                     <select class="form-control m-b" name="user_level" required="">
                                                                    <option value="">选择会员类型</option>
                                                                    <option value="普通会员">普通会员</option>
                                                                    <option value="黄金会员">黄金会员</option>
                                                                    <option value="铂金会员">铂金会员</option>
                                                                </select>
                                                </div>
                                                <div class="col-md-2">
                                                              <button class="btn btn-primary" type="submit">保存内容</button>
                                                </div>
                                                            
                                            </div>
                                        </div>
                                    </div>
                                
                        </div>
                 </div>   
            </div>   
        </div>
    </div>       
</form>          
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/public/js/jquery.form.js"></script>
    <script>
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
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
                alert("客户新增成功");
               
                $(".form-control").val("");
            }else{
            alert(data.res_tip);
            }
        }
        });
    </script>
</body>

</html>