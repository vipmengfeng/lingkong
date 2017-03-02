<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>订单</title>
    

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet">
    <link href="/public/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/public/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-datetimepicker.min.css">

</head>

<body class="gray-bg">
<form method="post" action="/index.php/home/<?php echo ($mod); ?>/price" name="form2" id="form3">
<div class="wrapper wrapper-content">
    <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>车辆信息：</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                           <div class="row show-grid">
                                <div class="col-sm-2">
                                    <strong>车辆名称：</strong>
                                </div>
                                <div class="col-sm-2">
                                    <?php echo ($nickname); ?>
                                </div>
                                <div class="col-sm-2">
                                    <strong>车牌号码：</strong>
                                </div>
                                <div class="col-sm-2">
                                    <?php echo ($chepai); ?>
                                </div>
                                <div class="col-sm-2">
                                   所属：<?php echo ($company_name); ?>
                                </div>
                                <div class="col-sm-2">
                                    所属：<?php echo ($store_name); ?>
                                </div>
                            </div>
                            <div class="row show-grid">
                                <div class="col-sm-2">
                                    <strong>当前油量：</strong>
                                </div>
                                <div class="col-sm-2">
                                    <?php echo ($youliang); ?>
                                </div>
                                <div class="col-sm-2">
                                    <strong>油箱容积：</strong>
                                </div>
                                <div class="col-sm-2">
                                    <?php echo ($youxiang); ?> 升
                                </div>
                                <div class="col-sm-2">
                                   <strong>当前里程：</strong>
                                </div>
                                <div class="col-sm-2">
                                   <?php echo ($gongli); ?>
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
                     <h5>查找用户：</h5>
                    <div class="col-sm-4">
                                    <div class="radio checkbox-inline">
                                           <label>
                                            <input type="radio" checked="checked" value="personal_user" id="optionsRadios1" name="optionsRadios">个人用户</label>
                                    </div>
                                    <div class="radio checkbox-inline">
                                        <label>
                                            <input type="radio" value="company_user" id="optionsRadios2" name="optionsRadios">企业用户</label>
                                    </div>
                    </div>

                       
                        <div class="input-group">
                            <input type="text" class="form-control col-md-6 " autocomplete="off" id="user_Search" >
                            <input type="text" class="form-control col-md-6 " autocomplete="off" id="user_company_Search" style="display: none;" >
                            
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                </ul>
                            </div>
                        </div>
                                            </div>
                    <div class="ibox-content">
                        <div class="row show-grid">
                                <div class="col-sm-2">
                                    <strong>甲方名称：</strong>
                                </div>
                                <div class="col-sm-2" id="user_name">
                                    丽君桑

                                </div>
                                <div class="col-sm-2">
                                    <strong>电话：</strong>
                                </div>
                                <div class="col-sm-2" id="user_tel">
                                    15383110077
                                </div>
                                <div class="col-sm-2">
                                   <strong>会员级别</strong>
                                </div>
                                <div class="col-sm-2" id="user_level">
                                    普通会员
                                </div>
                        </div>
                        <div class="row show-grid">
                                <div class="col-sm-2">
                                    <strong>证件名称：</strong>
                                </div>
                                <div class="col-sm-2">
                                    身份证
                                </div>
                                <div class="col-sm-2">
                                    <strong>证件号码：</strong>
                                </div>
                                <div class="col-sm-2" id="user_pincode">
                                    130182918327651923
                                </div>
                                <div class="col-sm-2">
                                   <strong>驾驶证：</strong>
                                </div>
                                <div class="col-sm-2" id="user_jscode">
                                    130182918763720933
                                </div>
                        </div>
                        <div class="row show-">
                                <div class="col-sm-2">
                                    <strong>联系地址：</strong>
                                </div>
                                <div class="col-sm-4" id="user_address">
                                    <?php echo ($address); ?>
                                </div>
                                <div class="col-sm-2">
                                    <label class="">紧急联系人地址：</label>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="order_contract_address" id="" required="" >
                                </div>
                                
                        </div>
                        <div class="row show">
                                <div class="col-sm-2">
                                    <strong>紧急联系人：</strong>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control " name="order_contract" id="" required="" >
                                </div>
                                <div class="col-sm-2">
                                    <strong>紧急联系人电话：</strong>
                                </div>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control " name="order_contract_tel" id="" required="" >
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
                        <h5>租金/保险：</h5>
                        <div class="col-sm-8">
                                    <div class="radio checkbox-inline">
                                           <label>
                                            <input type="radio" checked="checked" value="personal_user" id="options_Radios1" name="options_Radios">日租</label>
                                    </div>
                                    <div class="radio checkbox-inline">
                                        <label>
                                            <input type="radio" value="company_user" id="options_Radios2" name="options_Radios">周租</label>
                                    </div>
                                    <div class="radio checkbox-inline">
                                        <label>
                                            <input type="radio" value="company_user" id="options_Radios3" name="options_Radios">月租</label>
                                    </div>
                                    <div class="radio checkbox-inline">
                                        <label>
                                            <input type="radio" value="company_user" id="options_Radios4" name="options_Radios">季租</label>
                                    </div>
                                    <div class="radio checkbox-inline">
                                        <label>
                                            <input type="radio" value="company_user" id="options_Radios5" name="options_Radios">年租</label>
                                    </div>
                                    <div class="radio checkbox-inline">
                                        <label>
                                    保险：</label>
                                    </div>
                                    
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" checked="checked" disabled="disabled" value="option1"> 交强险
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" value="option2"> 不计免赔
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> 车损险
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox4" value="option4"> 第三者责任险
                            </label>
                        
                    </div>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-4">
                            <label class="col-sm-3 control-label">开始时间</label>
                                <div class="input-group">
                                 
                                    <input type="text" class="form-control " name="start_time" readonly="readonly" id="start_time" required="">
                                
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-3 control-label">结束时间</label>
                                <div class="input-group">
                                    <input type="text" class="form-control " name="end_time" id="end_time" readonly="readonly" required="required">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-12 control-label">(除日租以外其他租赁方式只需选择开始日期即可.)</label>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            <label class="col-sm-3 control-label">日租金</label>
                                <div class="input-group">
                                
                                    <input type="text" class="form-control " value="<?php echo ($price); ?>" name="price" id="price" required="">
                                    <span class="input-group-addon">元</span>
                                
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-3 control-label">超时扣款</label>
                                <div class="input-group">
                                    <input type="text" class="form-control " value="<?php echo ($chaoshi); ?>" name="chaoshi" required="">
                                    <span class="input-group-addon">元/时</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-12 control-label">(超时4小时以内以小时计算，超过4小时按一天计算.)</label>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            <label class="col-sm-3 control-label">会员折扣</label>
                                <div class="input-group">
                                
                                    <input type="text" class="form-control " value="100" name="zhekou" onchange="price_zk();" id="zhekou" required="">
                                    <span class="input-group-addon">%</span>
                                
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-3 control-label">优惠减免</label>
                                <div class="input-group">
                                    <input type="text" class="form-control " name="order_youhui" id="youhui" onchange="price_yh();" required="" value="0">
                                    <span class="input-group-addon">元</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-12 control-label"></label>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                            <label class="col-sm-3 control-label">共计</label>
                                <div class="input-group">
                                
                                    <input type="text" class="form-control " name="order_price" id="all_price" required="">
                                    <span class="input-group-addon">元</span>
                                
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="col-sm-3 control-label">押金</label>
                                <div class="input-group">
                                    <input type="text" class="form-control " name="order_yajin" value="<?php echo ($yajin); ?>" required="">
                                    <span class="input-group-addon">元</span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                               
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <label class="col-sm-1 control-label">备注</label>
                                <div class="input-group col-md-11">
                                
                                    <input type="text" class="form-control " name="order_beizhu" required="">
                                    <input type="hidden" class="form-control " value="" id="h_u_id" name="customer_id">
                                    <input type="hidden" class="form-control " value="<?php echo ($cars_id); ?>" name="cars_id">
                                    <input type="hidden" value="" id="h_customer_name" name="customer_name" />
                                    <input type="hidden" value="" id="car_chepai" name="car_chepai" />

                                
                                </div>
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
                        <h5>保险相关：</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div>
                            
                            
                            <button class="btn btn-primary" type="submit">保存内容</button>
                        </div>
                    </div>
                 </div>   
            </div>   
    </div>
</div>

    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/demo/peity-demo.min.js"></script>
    <script src="/public/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="/public/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/public/js/plugins/clockpicker/clockpicker.js"></script>
    <script src="/public/js/plugins/suggest/bootstrap-suggest.js"></script>
    <script src="/public/js/bootstrap-datetimepicker.js"></script>
    <script src="/public/js/jquery.form.js"></script>
    <script>
       $(document).ready(function(){
        var myDate=new Date();
    $('#start_time').datetimepicker({
        startDate:myDate,
        format: 'yyyy-mm-dd hh:ii',
        endDate:new Date((myDate/1000+86400*90)*1000),
        language: 'zh-CN', /*加载日历语言包，可自定义*/
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0
    });
    $("#end_time").datetimepicker({
            endDate:new Date((myDate/1000+86400*90)*1000),
            format: 'yyyy-mm-dd hh:ii',
            language: 'zh-CN', /*加载日历语言包，可自定义*/
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });

        $(".radio").change(function(){
            var $selectedvalue = $("input[name='optionsRadios']:checked").val();
        if($selectedvalue=='company_user'){
            $("#user_company_Search").css("display","block");
            $("#user_Search").css("display","none");
        }else if($selectedvalue=='personal_user'){
            $("#user_company_Search").css("display","none");
            $("#user_Search").css("display","block");
        }
    })
        
        $("#user_company_Search").bsSuggest({
        //url: "/public/js/demo.js",
        url:"/index.php/home/admin/customer_search_ajax_org",
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
        set_user_detail(keyword.id);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });
        $("#user_Search").bsSuggest({
        //url: "/public/js/demo.js",
        url:"/index.php/home/admin/customer_search_ajax",
        effectiveFields: ["realname", "tel","address","addtime"],
        searchFields: [ "realname", "tel","address"],
        effectiveFieldsAlias:{realname: "名称"},
        getDataMethod: "firstByUrl", 
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
        //alert(keyword.id);
        //alert(keyword.key);

        set_user_detail(keyword.id);
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });
    });

       $(function(){
        $('#form1').ajaxForm({
        beforeSubmit:  checkForm,  // 表单提交执行前检测
        success:       complete,  // 表单提交后执行函数
        dataType: 'json'
         });
        function checkForm(){
            var st_time=$("#start_time").val();
            if(st_time==""){
                alert("请选择开始时间!");
                return false;
            }
            var end_time=$("#end_time").val();
            if(end_time==""){
                alert("请选择结束时间!");
                return false;
            }
            var order_contract=$("#order_contract").val();
            if(order_contract==""){
                alert("请填写紧急联系人!");
                return false;
            }
            var order_contract_tel=$("#order_contract_tel").val();
            if(order_contract_tel==""){
                alert("请填写紧急联系人电话!");
                return false;
            }
            return true;
        }
        function complete(data){
            if(data.status==1){
                alert("订单新增成功");
                order_end(<?php echo ($cars_id); ?>)
               
               // $(".form-control").val("");
            }else{
            alert(data.res_tip);
            }
        }
        });



    function set_user_detail(datas){
        $("#h_u_id").val(datas);
        var $selectedvalue = $("input[name='optionsRadios']:checked").val();
        //customer_detail_ajax
        //customer_detail_ajax_org
        if($selectedvalue=='personal_user'){
        $.ajax({
                    url:'/index.php/home/<?php echo ($mod); ?>/customer_detail_ajax',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "id":datas
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        $("#user_name").html(data.realname);
                        $("#user_tel").html(data.tel);   
                        $("#user_level").html(data.level);
                        $("#user_pincode").html(data.pincode);
                        $("#user_jscode").html(data.pincode);
                        $("#user_address").html(data.address);
                       $("#customer_name").val(data.realname);
                       $("#car_chepai").val(data.chepai);

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        //fresh_store();
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }else if($selectedvalue=='company_user'){
        $.ajax({
                    url:'/index.php/home/<?php echo ($mod); ?>/customer_detail_ajax_org',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "id":datas
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        $("#user_name").html(data.company_name);
                        $("#user_tel").html(data.tel);
                        $("#user_level").html(data.level);
                        $("#user_pincode").html(data.pincode);
                        $("#user_jscode").html(data.pincode);
                        $("#user_address").html(data.address);
                        $("#customer_name").val(data.company_name);
                        $("#car_chepai").val(data.chepai);
                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        //fresh_store();
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })

    }

    }


////////////////

$('#start_time,#end_time')
.datetimepicker()
.on('changeDate', function(ev){

    var st_time=$("#start_time").val();
    var ed_time=$("#end_time").val();
    var price=$("#price").val();

    $.ajax({
                    url:'/index.php/home/<?php echo ($mod); ?>/price_all',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "st_time":st_time,
                        "ed_time":ed_time,
                        "price":price
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        if(data>0){
                        $("#all_price").val(data);}
                       

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        //fresh_store();
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    
    

});
function price_yh(){
    data=parseInt($("#all_price").val())-parseInt($("#youhui").val());
    $("#all_price").val(data);
}

function price_zk(){
    data=parseInt($("#all_price").val())*(parseInt($("#zhekou").val())/100);
    $("#all_price").val(data);
}
    


function order_end(id){
        //$('.page-tabs-content a', window.parent.document).removeClass('active');
        var t="<a href='javascript:;'' class='active J_menuTab' data-id='/index.php/home/<?php echo ($mod); ?>/order_add/car_id/"+id+"'>--订单<i class='fa fa-times-circle'></i></a>";
        var c="<iframe class='J_iframe' name='iframe0' width='100%' height='100%' src='/index.php/home/<?php echo ($mod); ?>/order_add/car_id/"+id+"' frameborder='0' data-id='/index.php/home/<?php echo ($mod); ?>/order_add/car_id/"+id+"' seamless='' style='inline'></iframe>";
        $('#content-main iframe', window.parent.document).css("display","none");
        $('.page-tabs-content', window.parent.document).remove(t);
        $('#content-main', window.parent.document).remove(c);
    }
</script>


    
</form>
    
</body>

</html>