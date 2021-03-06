<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>黑名单查询</title>
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <!-- Data Tables -->
    <link href="/public/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

    <base target="_blank">

</head>

<body class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>黑名单</h5>
                        
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-inline" id="child_company_form" method="post" name="child_company_form" action="/index.php/home/order/blacklist_add">
                            <div class="form-group">
                                <label for="exampleInputEmail2" class="sr-only">分公司名称</label>
                                <input type="text" name="company_name" placeholder="请输入姓名" id="name" class="form-control">
                                <input type="text" name="company_name" placeholder="电话" id="tel" class="form-control">
                                <input type="text" name="company_name" placeholder="身份证" id="pincode" class="form-control">
                                <input type="text" name="company_name" placeholder="原因" id="reason" class="form-control">
                            </div>
                            
                            <button class="btn btn-white" type="button" onclick="add()">新增</button>
                        </form>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <div class="input-group" style="width: 50%;">
                            <input type="text" placeholder="查找黑名单" class="form-control" id="searchbar" required="">  
                            <span class="input-group-btn">
                            <button type="button" class="btn btn btn-primary" onclick="search_action();"> <i class="fa fa-search"></i> 搜索</button>
                            </span>
                            </div>
                         </div>
                        
                    </div>
                    <div class="ibox-content">
                       
                        <div class="well well-lg">
                            <h3>
                                    查询结果:

                                </h3> 
                                <div id="showres" style="display: none;">
                                <span >姓名：<span id="s_name"></span> 电话:<span id="s_tel"></span> 身份证：<span id="s_pincode"></span></span>
                                <div id="s_reason"></div>
                                </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/public/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/layer/layer.js"></script>
    <script>
       //
       function search_action(){
        var vl;
        if($("#searchbar").val()==""){
             vl="uioiuiasudifisdaufoufidsuiaduisaufd";
        }else{
             vl=$("#searchbar").val();
        }
            $.ajax({
            url:'/index.php/home/order/blacklist_search',
            type:'POST',
            dataType: 'json',
            data: {
                name:             vl

            },
            success:function(data){
              
                if(data!==null){
                    $("#showres").css('display', 'block');
                    $("#s_name").html(data.name);
                    $("#s_tel").html(data.tel);
                    $("#s_pincode").html(data.pincode);
                    $("#s_reason").html(data.beizhu);
                }else
                {
                    $("#showres").css('display', 'none');
                    alert("暂无查询结果!");
                }
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
       }
       function add(){
        $.ajax({
            url:'/index.php/home/order/blacklist_add',
            type:'POST',
            dataType: 'text',
            data: {
                name:              $("#name").val(),
                tel:               $("#tel").val(),
                pincode:           $("#pincode").val(),
                reason:            $("#reason").val()

            },
            success:function(data){
                if(data==1){
                    alert("黑名单新增成功!");
                }else{
                    alert("黑名单新增失败!");
                }
            }
        })
        .done(function() {
            console.log("success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
    }
    </script>
    
    </body>
</html>