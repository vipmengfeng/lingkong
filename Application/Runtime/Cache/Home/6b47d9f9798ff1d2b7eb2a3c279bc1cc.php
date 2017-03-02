<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>灵控汽车租赁管理 - 客户管理</title>

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-sm-8">
                <div class="ibox">
                    <div class="ibox-content">
                        <span class="text-muted small pull-right"><a href="#" onclick="javascript:fresh_customer_c();return false;">刷新数据</a><i class="fa fa-clock-o"></i> 2015-09-01 12:00</span>
                        <h2>客户管理</h2>
                        <p>
                            右侧可以刷新数据哦
                        </p><form action="" method="post">
                        <div class="input-group">
                        <input type="text" class="form-control " autocomplete="on" id="tab_p_Search">
                        <input type="text" class="form-control " autocomplete="on" id="tab_o_Search" style="display: none;">
                            
                                <span class="input-group-btn">
                                        <button type="submit" class="btn btn btn-primary"> <i class="fa fa-search"></i> 搜索</button>
                                </span>
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                </ul>
                            </div>
                        </div>
                        </form>
                        <div class="clients-list">
                            <ul class="nav nav-tabs">
                                <span class="pull-right small text-muted"><span id="customer_count"></span> </span>
                                <li class="active"><a data-toggle="tab" href="#tab-1" onclick="tab1_click();"><i class="fa fa-user"></i> 个人</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="#tab-2" onclick="tab2_click();"><i class="fa fa-briefcase"></i> 公司</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody id="customer_c_list">
                                                
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover">
                                                <tbody id="org_customer">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--right_personal_start-->
            <div class="col-sm-4 animated fadeInRight" style="display: none;" id="right_detail" >
                <div class="ibox ">

                    <div class="ibox-content">
                        <div class="tab-content">
                            <div id="contact-1" class="tab-pane active">
                                <div class="row m-b-lg">
                                    
                                    
                                </div>
                                <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong id="p_realname" class="">丽君桑</strong>
                                        <input id="edit_id" value="" type="hidden">
                                        

                                        <ul class="list-group clear-list">
                                            <li class="list-group-item fist-item">
                                                <span class="pull-right" id="p_addtime"> 2016-12-16：22：30：00 </span> 注册时间:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="p_user_level"> 普通用户 </span> 用户级别:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="p_sex"> 女</span> 性别:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right m_en" id="p_tel"> 15383110077 </span><input id="e_p_tel" style="display: none;" type="text" value="" class="pull-right m_e"></input> 电话:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right m_en" id="p_email"> sang@163.com </span><input id="e_p_email" style="display: none;" type="text" value="" class="pull-right m_e"> Email:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right " id="p_pincode"> 130182198312110512 </span> 身份证号:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="p_address"> 河北省石家庄市长安区广安大街美东国际B座1803 </span> 身份证地址:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right m_en" id="p_now_address"> 河北省石家庄市长安区广安大街美东国际B座1803 </span><input id="e_p_nowaddress" style="display: none;" type="text" value="" class="pull-right m_e"> 现住址:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="p_driver_code"> 130182198312110512 </span> 驾照:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="p_driver_type"> C1 </span> 驾照类型:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="p_driver_license"> 河北省石家庄市长安区 </span> 驾照颁发机构:
                                            </li>
                                        </ul>
                                        <strong>备注</strong>
                                        <p id="p_beizhu" class="m_en">
                                            
                                        </p>
                                        <textarea id="e_p_beizhu" class="m_e" style="display: none;"></textarea>
                                        
                                        <button type="button" class="btn btn-w-m btn-success m_en" onclick="edit_detail()">编辑</button>
                                        <button type="button" class="btn btn-w-m btn-success m_e" style="display: none;" onclick="save_detail()">保存</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--right_personal_end-->
                <!--right_company_start-->
            <div class="col-sm-4 animated fadeInRight" style="display: none;" id="right_detail_org" >
                <div class="ibox ">

                    <div class="ibox-content">
                        <div class="tab-content">
                            <div id="contact-1" class="tab-pane active">
                                <div class="row m-b-lg">
                                    
                                    
                                </div>
                                <div class="client-detail">
                                    <div class="full-height-scroll">

                                        <strong id="o_realname">丽君桑</strong>

                                        <ul class="list-group clear-list">
                                            <li class="list-group-item fist-item">
                                                <span class="pull-right" id="o_addtime"> 2016-12-16：22：30：00 </span> 注册时间:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="o_user_level"> 普通用户 </span> 用户级别:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="o_tel"> 15383110077 </span> 电话:
                                            </li>
                                            <li class="list-group-item">
                                                <span class="pull-right" id="o_address"> 河北省石家庄市长安区广安大街美东国际B座1803 </span> 公司地址:
                                            </li>
                                        </ul>
                                        <strong>备注</strong>
                                        <p id="p_beizhu">
                                            40亿影帝黄渤先生明明可以靠脸吃饭，可是他却偏偏靠才华，唱歌居然也这么好听！
                                        </p>
                                        
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--right_company_end-->
            </div>
        </div>
    </div>
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/plugins/suggest/bootstrap-suggest.min.js"></script>
    <script>
    $("#tab_o_Search").bsSuggest({
        //url: "/public/js/demo.js",
        url:"/index.php/home/customer/customer_search_ajax_org",
        effectiveFields: ["company_name", "tel","address","addtime"],
        searchFields: [ "company_name", "tel","address"],
        effectiveFieldsAlias:{company_name: "名称"},
        //getDataMethod: "url", 
        ignorecase: true,
        showHeader: true,
        showBtn: false,     //不显示下拉按钮
        delayUntilKeyup: true, //获取数据的方式为 firstByUrl 时，延迟到有输入/获取到焦点时才请求数据
        //idField: "userId",
        keyField: "company_name",
        clearable: true,
        delayUntilKeyup: true
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });

    $("#tab_p_Search").bsSuggest({
        //url: "/public/js/demo.js",
        url:"/index.php/home/customer/customer_search_ajax",
        effectiveFields: ["realname", "tel","address","addtime"],
        searchFields: [ "realname", "tel","address"],
        effectiveFieldsAlias:{realname: "名称"},
        //getDataMethod: "url", 
        ignorecase: true,
        showHeader: true,
        showBtn: false,     //不显示下拉按钮
        delayUntilKeyup: true, //获取数据的方式为 firstByUrl 时，延迟到有输入/获取到焦点时才请求数据
        //idField: "userId",
        keyField: "realname",
        clearable: true,
        delayUntilKeyup: true
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
       /* alert(keyword.realname);
        alert(data);*/
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });
        $(function(){$(".full-height-scroll").slimScroll({height:"100%"})});



        function detail(id){
            $("#right_detail").css("display","none");
            $("#right_detail_org").css("display","none");
                $.ajax({
                    url:'/index.php/home/customer/customer_detail_ajax',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "id":id
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                         $("#edit_id").val(id);
                         $("#p_realname").html(data.realname);
                         $("#p_addtime").html(data.addtime);
                         $("#p_user_level").html(data.user_level);
                         $("#p_sex").html(data.sex);
                         $("#p_tel").html(data.tel);
                         $("#p_email").html(data.email);
                         $("#p_pincode").html(data.pincode);
                         $("#p_address").html(data.address);
                         $("#p_now_address").html(data.now_address);
                         $("#p_driver_code").html(data.driver_code);
                         $("#p_driver_type").html(data.driver_type);
                         $("#p_driver_license").html(data.driver_license);
                         $("#p_beizhu").html(data.beizhu);
                        //save
                         $("#e_p_realname").val(data.realname);
                         $("#e_p_tel").val(data.tel);
                         $("#e_p_email").val(data.email);
                         $("#e_p_pincode").val(data.pincode);
                         $("#e_p_address").val(data.address);
                         $("#e_p_nowaddress").val(data.now_address);
                         $("#e_p_beizhu").val(data.beizhu);


                    },
                    error:function(xhr,textStatus){
                        alert("err");
                    },
                    complete:function(){
                        $("#right_detail").css("display","block");
                        //alert("complete");
                    }
            })
            
            //alert(id);
        }
        function detail_org(id){
            $("#right_detail").css("display","none");
            $("#right_detail_org").css("display","none");
                $.ajax({
                    url:'/index.php/home/customer/customer_detail_ajax_org',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "id":id
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        
                         $("#o_realname").html(data.company_name);
                         $("#o_addtime").html(data.addtime);
                         $("#o_user_level").html(data.user_level);
                         $("#o_tel").html(data.tel);
                         $("#o_address").html(data.address);
                         $("#o_beizhu").html(data.beizhu);


                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        $("#right_detail_org").css("display","block");
                        //alert("complete");
                    }
            })
            
            //alert(id);
        }
        //个人客户数据载入
       function fresh_customer_c(){
            $.ajax({
                    url:'/index.php/home/customer/customer_list_ajax',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        
                        html_store="";
                        $(data).each(function(index, el) {
                            html_store+="<tr id='c"+el.id+"'><td class='client-avatar'> <span class='glyphicon glyphicon-user' aria-hidden='true'></span></td><td><a data-toggle='tab' href='#contact-3' class='client-link'>"+el.realname+" </a></td><td class='contact-type'><i class='fa fa-phone'> </i></td><td> "+el.tel+"</td><td>"+el.addtime+"</td><td class='client-status'><span class='label label-normal' onclick='javascript:detail(&quot;"+el.id+"&quot;);'>查看</span><span class='label label-danger' onclick='javascript:del_customer_c(&quot;"+el.id+"&quot;);'>删除</span></td></tr>";
                           
                        });
                         $("#customer_c_list").html(html_store);
                        $("#customer_count").html(data[0].count_c+"个人客户");

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }
    //企业客户数据载入
       function fresh_customer_o(){
            $.ajax({
                    url:'/index.php/home/customer/customer_list_ajax_org',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        
                        html_store="";
                        $(data).each(function(index, el) {
                            html_store+="<tr id='c"+el.id+"'><td class='client-avatar'> </td><td><a data-toggle='tab' href='#contact-3' class='client-link'>"+el.company_name+" </a></td><td class='contact-type'><i class='fa fa-phone'> </i></td><td> "+el.tel+"</td><td>"+el.addtime+"</td><td class='client-status'><span class='label label-normal' onclick='javascript:detail_org(&quot;"+el.id+"&quot;);'>查看</span><span class='label label-warning'><span class='label label-danger' onclick='javascript:del_customer_o(&quot;"+el.id+"&quot;);'>删除</span></td></tr>";
                           
                        });
                         $("#org_customer").html(html_store);
                        $("#customer_count").html(data[0].count_c+"个人客户");

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        
                      
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }
    function tab1_click(){
        $("#tab_o_Search").css("display","none");
        $("#tab_p_Search").css("display","block");
    }
    function tab2_click(){
         $("#tab_o_Search").css("display","block");
         $("#tab_p_Search").css("display","none");
    }
    function test(id,name){
        $('.page-tabs-content a', window.parent.document).removeClass('active');
        var t="<a href='javascript:;'' class='active J_menuTab' data-id='/index.php/home/<?php echo ($mod); ?>/add_customer'>"+name+"--编辑<i class='fa fa-times-circle'></i></a>";
        var c="<iframe class='J_iframe' name='iframe0' width='100%' height='100%' src='/index.php/home/<?php echo ($mod); ?>/add_customer?v=4.0' frameborder='0' data-id='/index.php/home/<?php echo ($mod); ?>/add_customer' seamless='' style='inline'></iframe>";
        $('#content-main iframe', window.parent.document).css("display","none");
        $('.page-tabs-content', window.parent.document).append(t);
        $('#content-main', window.parent.document).append(c);

    }
    function del_customer_c(id){
        $.ajax({
                    url:'/index.php/home/customer/del_customer_c',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "id":id
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        if(data==1){
                            alert("删除成功");
                            $("#c"+id).remove();

                        }
                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }
    fresh_customer_c();
    fresh_customer_o();

    function edit_detail(){
        $(".m_en").css('display', 'none');
        $(".m_e").css('display', 'block');
    }
    function save_detail(){
        $(".m_en").css('display', 'block');
        $(".m_e").css('display', 'none');
        $.ajax({
            url: '/index.php/home/customer/save_detail?id='+$("#edit_id").val(),
            type: 'POST',
            dataType: 'text',
            data: {
                id:$("#edit_id").val(),
                tel:  $("#e_p_tel").val(),
                email:$("#e_p_email").val(),
                nowaddress:$("#e_p_nowaddress").val(),
                beizhu:$("#e_p_beizhu").val()

            },
        })
        .success(function(data) {
            detail($("#edit_id").val());
            console.log(data);
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