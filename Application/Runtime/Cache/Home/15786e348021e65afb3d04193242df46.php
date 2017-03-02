<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>灵控汽车租赁管理系统</title>
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico">
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet">
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/public/js/demo/peity-demo.min.js"></script>
    <script src="/public/js/jquery.confirm.js"></script>
    <script src="/public/js/plugins/nestable/jquery.nestable.js"></script>
    <script src="/public/js/jquery.form.js"></script>
    <script>
    //开启模态框
    function open_model(id){
         $('#modal-form').modal('show');
         $("#hidden_id").val(id);
    }
       //关闭模态对话框
       function close_model(){
        $('#modal-form').modal('hide');
       }
       //删除分公司
       function deletes(id){
            $.ajax({
                    url:'/index.php/home/store/del_child_company',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        id:id
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){
                        //alert("删除成功");
                        //fresh_store();
                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        //alert("complete");
                        $("#d"+id).remove();
                        fresh_store();
                    }
            })
       }
       //删除门店
       function delete_store(id){
            $.ajax({
                    url:'/index.php/home/store/del_store',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        id:id
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){
                        //alert("删除成功");
                        //fresh_store();
                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        //alert("complete");
                        $("#s"+id).remove();
                        //fresh_store();
                    }
            })
       }
       function del_child_company(id){
        $("#d"+id).confirm({
            title:"删除确认",
            text:"确定要删除这条信息吗?",
            confirm: function(button) {
                deletes(id);

            },
            cancel: function(button) {
            },
            confirmButton: "是的",
            cancelButton: "不"
            });
       }
       function del_store(id){
        $("#s"+id).confirm({
            title:"删除确认",
            text:"确定要删除这条信息吗?",
            confirm: function(button) {
                delete_store(id);

            },
            cancel: function(button) {
            },
            confirmButton: "是的",
            cancelButton: "不"
            });
       }
       //初始数据载入
       function fresh_store(){
            $.ajax({
                    url:'/index.php/home/store/fresh_store_company',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        html_store="";
                        $(".fresh_del").html("");
                        $(data).each(function(index, el) {
                            cl="warning";
                            if(index%2==0){
                                 cl="warning";
                            }else{
                                cl="info";
                            }
                            html_store+="<li class='dd-item' id='s"+el.id+"'><div class='dd-handle'>";
                            if(el.store_type==0){
                                html_store+="<span class='pull-right label label-danger' onclick='del_store(&quot;"+el.id+"&quot;);'> 删 </span>";
                            }
                            html_store+="<span class='label label-"+cl+"t'><i class='fa fa-cog'></i></span> "+el.store_name+"</div></li>";
                            $("#stores"+el.parent_id).append(html_store);
                            html_store="";
                        });
                        

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }
       
       function fresh_data(){
        $.ajax({
                    url:'/index.php/home/store/fresh_store',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        html_div="";
                        $(data).each(function(index, el) {

                            cl="warning";
                            if(index%2==0){
                                 cl="warning";
                            }else{
                                cl="info";
                            }
                            html_div+="<li class='dd-item' id='d"+el.id+"'><div class='dd-handle'><span class='pull-right'>";
                            if(el.company_type==0)
                                {
                                  html_div+=" <a data-toggle='modal' class='' href='#' onclick='del_child_company(&quot;"+el.id+"&quot;);return false;'>删除</a>";
                                }
                            html_div+="  <a data-toggle='modal' class='' href='#' onclick='open_model(&quot;"+el.id+"&quot;);return false;'>新增门店</a> </span><span class='label label-"+cl+"'><i class='fa fa-users'></i></span> "+el.company_name+"</div></li><ol class='dd-list fresh_del' id='stores"+el.id+"'></ol>";
                        });
                        $("#child_company").html(html_div);

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        fresh_store();
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }
    fresh_data();
    </script>
</head>


<body class="gray-bg">
<div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12 b-r">
                            <h3 class="m-t-none m-b">门店新增</h3>
                            <form role="form" method="post" action="/index.php/home/store/add_store" id="store_form">
                                <div class="form-group">
                                    <input type="text" placeholder="请输入门店名" class="form-control" name="store_name" required="">
                                    <input type="hidden" value="" name="parent_id" id="hidden_id">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>保存</strong>
                                   
                                    </button>
                                     <span>保存后点击页面任意处或<a href="#" onclick="close_model();">关闭</a>返回。</span>

                                </div>
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
       <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>公司管理</h5>
                        
                    </div>
                    <div class="ibox-content">
                        <form role="form" class="form-inline" id="child_company_form" method="post" name="child_company_form" action="/index.php/home/store/add_child_company">
                            <div class="form-group">
                                <label for="exampleInputEmail2" class="sr-only">分公司名称</label>
                                <input type="text" name="company_name" placeholder="请输入分公司名称" id="exampleInputEmail2" class="form-control" required="">
                            </div>
                            <div class="checkbox m-l m-r-xs">
                                <label class="i-checks">
                                    <div class="icheckbox_square-green" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div><i></i> </label>
                            </div>
                            <button class="btn btn-white" type="submit">保存</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
                <div class="col-sm-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>门店管理</h5>
                    </div>
                    <div class="ibox-content">

                        <p class="m-b-lg">
                            您的账户默认拥有公司总部与公司总店，该数据不可删除。其他自定义分公司与门店可自行删除
                        </p>

                        <div class="dd" id="nestable2">
                            <ol class="dd-list" id="child_company">
                                
                            </ol>
                        </div>
                        <div class="m-t-md">
                            <h5>数据：</h5>
                        </div>
                        <textarea id="nestable2-output" class="form-control"></textarea>


                    </div>

                </div>
            
        </div>
    </div>

  
    
   <script type="text/javascript">
        $(function(){
        $('#child_company_form').ajaxForm({
        beforeSubmit:  checkForm,  // 表单提交执行前检测
        success:       complete,  // 表单提交后执行函数
        dataType: 'json'
         });
        function checkForm(){
            return true;
        }
        function complete(data){
            if(data.status==1){
                alert("分公司新增成功");
                fresh_data();
                $(".form-control").val("");
            }else{
            alert(data.res_tip);
            }
        }
        });
        ////
        $(function(){
        $('#store_form').ajaxForm({
        beforeSubmit:  checkForm,  // 表单提交执行前检测
        success:       complete,  // 表单提交后执行函数
        dataType: 'json'
         });
        function checkForm(){
            return true;
        }
        function complete(data){
            if(data.status==1){
                alert("门店新增成功");
                fresh_data();
                $(".form-control").val("");
            }else{
            alert(data.res_tip);
            }
        }
        });
    </script>
</body>

</html>