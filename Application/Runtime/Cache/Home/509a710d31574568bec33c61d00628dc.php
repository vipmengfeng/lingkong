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
    <link href="/public/css/plugins/footable/footable.core.css" rel="stylesheet">
    <link href="/public/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    
    <link href="/public/js/uploadify/uploadify.css" type="text/css" rel="stylesheet" />
    <style type="text/css">
    .upl{width: 100px;height: 50px;}
    </style>
</head>

<body class="gray-bg">
<form method="post" class="form-horizontal" id="form1" name="form1" action="/index.php/home/<?php echo ($mod); ?>/add_car">
    <div class="wrapper wrapper-content animated fadeInRight">
        <!--第一步-->
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>第一步：选择车辆 <small>请认真填写各项内容</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                         <div class="form-group">
                                        <label class="col-sm-2 control-label">车辆名称</label>
                                        <div class="col-sm-6">
                                            <div class="input-group">
                                            <input type="text" class="form-control " autocomplete="on" id="car_Search" required="" >
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        
                        </div>

                        <div class="form-group">
                                        <label class="col-sm-2 control-label">车辆别名</label>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="input-group">
                                                    <input type="text" class="form-control " name="nickname" required="">
                                                    <input type="hidden" class="form-control " name="cars_id" id="cars_id">
                                                    <span class="help-block m-b-none">别名可以修改哦</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label class="col-sm-3 control-label">车牌号</label>
                                                    <div class="input-group">
                                                    <input type="text" class="form-control " name="chepai" required="">
                                                    </div>
                                                </div>

                                            </div>
                                        
                        </div>
                        <div class="form-group">
                                        <label class="col-sm-2 control-label">车辆图片</label>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <div class="input-group">
                                                        <input id="img_url" name="img_url" type="hidden">
                                                        <input id="file_upload" name="file_upload" type="file" multiple="true" style="width: 300px; height: 24px;"> 
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div id="imgs"></div>
                                                </div>
                                                
                                            </div>
                                        
                        </div>
                        <div class="hr-line-dashed"></div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">基本配置</label>
                            <div class="footable-row-detail-inner">
                                
                                
                            </div>
                        </div>

                                    
                        </div>
                 </div>   
            </div>   
        </div>
        <!--第一步结束-->
        <!--第二步-->
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>第二步：填写配置 <small>请认真填写各项内容</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">车辆状态</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="" style="float:left;width: 20%;">
                                                    <select class="form-control m-b" name="status" required="">
                                                        <option value="">选择车辆状态</option>
                                                        <option value="待租">待租</option>
                                                        <option value="在租">在租</option>
                                                        <option value="维修/保养">维修/保养</option>
                                                    </select>
                                                </div>
                                                <div class="" style="float:left;width: 22%;">
                                                    <label class="col-sm-4 control-label">当前公里数</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" name="gongli" class="form-control " value="0" required=""  id="">
                                                        <span class="input-group-addon">公里</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="" style="float:left;width: 35%;">
                                                    <label class="col-sm-6 control-label">当前油量</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" name="youliang" class="form-control " required="" value="0"  id="">
                                                        <span class="input-group-addon">升</span>
                                                         <input type="text" name="youliang_2" class="form-control " required="" value="0"  id="">
                                                        <span class="input-group-addon">格</span>
                                                        </div>
                                                    </div>
                                                </div>           
                                            </div>

                                            <!--row end-->
                                        </div>
                                    </div>
                                    <!--line 2 start-->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">购买日期</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="" style="float:left;width: 20%;">
                                                    <div class="col-md-12">
                                                        <div class="form-group" id="data_1">
                            
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" class="form-control" value="2016-11-11" required="" name="buy_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="" style="float:left;width: 30%;">
                                                    <label class="col-sm-4 control-label">保养日期</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group" id="data_2">
                            
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" class="form-control" value="2016-11-11" required="" name="baoyang_date">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="" style="float:left;width: 35%;">
                                                    <label class="col-sm-4 control-label">保险购买日期</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-group" id="data_3">
                            
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="text" class="form-control" value="2016-11-11" name="xubao_date" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>           
                                            </div>
                                            
                                            <!--row end-->
                                        </div>
                                    </div>
                                    <!--line 2 end-->
                                
                        </div>
                 </div>   
            </div>   
        </div>
        <!--第二步结束-->
        <!--第三步-->
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>第三步：租金相关 <small>请认真填写各项内容</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">停靠公司</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <select class="form-control m-b" name="tingkao_company" onchange="javascript:fresh_store();" required="" id="tingkao_company">
                                                        <option value="">停靠公司</option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-4 control-label">停靠门店</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                            <select class="form-control m-b" name="tingkao_store" id="tingkao_store" required="">
                                                                <option value="">停靠门店</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                         
                                            </div>

                                            <!--row end-->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">日租金</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="text" value="0" required="" name="price" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-4 control-label">周租金</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="week_price" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-6 control-label">月租金</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="month_price" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                </div>           
                                            </div>

                                            <!--row end-->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">季租金</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="text" value="0" required="" name="reason_price" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-4 control-label">半年租金</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="half_price" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-6 control-label">年租金</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="year_price" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                </div>           
                                            </div>

                                            <!--row end-->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">车辆押金</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="text" value="0" required="" name="yajin" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-4 control-label">不计免赔</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="bujimianpei" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-6 control-label">车损险</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="chesun" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                </div>           
                                            </div>

                                            <!--row end-->
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">第三者责任</label>

                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="input-group">
                                                        <input type="text" value="0" required="" name="disanzhe" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="col-sm-4 control-label">交强险</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="jiaoqiang" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="col-sm-6 control-label">超时扣款</label>
                                                    <div class="col-sm-6">
                                                        <div class="input-group">
                                                        <input type="text" value="0" required="" name="chaoshi" class="form-control "  id="">
                                                        <span class="input-group-addon">元</span>
                                                        </div>
                                                    </div>
                                                </div>           
                                            </div>

                                            <!--row end-->
                                        </div>
                                    </div>

                                    
                                
                        </div>
                 </div>   
            </div>   
        </div>
        <!--第三步结束-->
        <!--确认保存-->
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>最后：请保存</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        
                                    <div class="form-group">
                                        

                                        <div class="col-sm-10">
                                            <div class="row">
                                                
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
        <!--确认保存结束-->
    </div>       
</form>          
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script src="/public/js/plugins/iCheck/icheck.min.js"></script>
    <script src="/public/js/jquery.form.js"></script>
    <script src="/public/js/plugins/suggest/bootstrap-suggest.min.js"></script>
    <script src="/public/js/plugins/footable/footable.all.min.js"></script>
    <script src="/public/js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="/public/js/uploadify/jquery.uploadify.js"></script>
    <script>

    function set_car_detail(id){
        $.ajax({
                    url:'/index.php/home/car/get_car_detail',
                    type:'POST',
                    async:true,
                    data:{
                        "id":id,
                    },
                    dataType:'text',
                    success:function(data){

                        //alert(data);
                        //html_store="";
                        $(".footable-row-detail-inner").html(data);
                        $("#cars_id").val(id);
                        
                        

                    },
                    error:function(xhr,textStatus){
                    },
                    complete:function(){
                        
                        //alert("complete");
                        //$("#d"+id).parent().parent().remove();
                    }
            })
    }
        $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",});$("#data_1 .input-group.date,#data_2 .input-group.date,#data_3 .input-group.date").datepicker({todayBtn:"linked",keyboardNavigation:!1,forceParse:!1,calendarWeeks:!0,autoclose:!0})});
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
                alert("车辆新增成功");
               
                $(".form-control").val("");
            }else{
            alert(data.res_tip);
            }
        }
        });

        $("#car_Search").bsSuggest({
        //url: "/public/js/demo.js",
        url:"/index.php/home/car/car_search_ajax",
        effectiveFields: ["name", "brand","fadongji","jiegou","jibie"],
        searchFields: ["name", "brand","fadongji","jiegou","jibie"],
        effectiveFieldsAlias:{name: "名称",brand:"品牌",fadongji:"发动机",jiegou:"结构",jibie:"级别"},
        //getDataMethod: "url", 
        ignorecase: true,
        showHeader: true,
        showBtn: false,     //不显示下拉按钮
        delayUntilKeyup: true, //获取数据的方式为 firstByUrl 时，延迟到有输入/获取到焦点时才请求数据
        //idField: "userId",
        keyField: "name",
        clearable: true,
        delayUntilKeyup: true
    }).on('onDataRequestSuccess', function (e, result) {
        console.log('onDataRequestSuccess: ', result);
    }).on('onSetSelectValue', function (e, keyword, data) {
        //alert(keyword.id);
        //alert(keyword.key);

        set_car_detail(keyword.id);
        console.log('onSetSelectValue: ', keyword, data);
    }).on('onUnsetSelectValue', function () {
        console.log("onUnsetSelectValue");
    });

    function fresh_data(){
        $.ajax({
                    url:'/index.php/home/store/fresh_store',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        html_div="<option value=''>选择停靠公司</option>";
                        $(data).each(function(index, el) {
                            html_div+="<option value="+el.id+">"+el.company_name+"</option>";
                            
                        });
                        $("#tingkao_company").html(html_div);

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
    function fresh_store(){
        var id=$("#tingkao_company").val();
        $.ajax({
                    url:'/index.php/home/store/fresh_store_company_si',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        "id":id
                    },
                    dataType:'json',
                    success:function(data,textStatus,jqXHR){
                        html_div="<option value=''>选择停靠门店</option>";
                        $(data).each(function(index, el) {
                            html_div+="<option value="+el.id+">"+el.store_name+"</option>";
                            
                        });
                        $("#tingkao_store").html(html_div);

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

    $(function() {
            $('#file_upload').uploadify({
                'swf'      : '/public/js/uploadify/uploadify.swf',
                'buttonText':'选择',
                'uploader' : '/index.php/home/<?php echo ($mod); ?>/upload',
                 'onUploadSuccess' : function(file, data, response) {
                 //把所有上传的图片都放入DIV中
                 img = "<img width='200px' src='/public/Uploads/"+data+"'>";
                $('#imgs').html(img);
                $('#img_url').val('/public/Uploads/'+data);
            }
            });
        });
    </script>
</body>

</html>