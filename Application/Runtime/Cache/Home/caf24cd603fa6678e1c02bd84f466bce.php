<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title></title>

   <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet">
    <link href="/public/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/public/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-datetimepicker.min.css">
    <link href="/public/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <style type="text/css">
    .tr_bg{background-color: #ccc;}
    </style>
<script>
	function doPrint() { 
        //
        $.ajax({
            url:'/index.php/home/order/order_database',
            type:'POST',
            dataType: 'text',
            data: {
                order_sn:         $("#sn").html(),
                customer_id:      $("#h_o_u_id").val(),
                car_id:           $("#h_o_c_id").val(),
                order_start:      $("#o_start_time").html(),
                order_end:        $("#o_end_time").html(),
                order_contact:    $("#o_contact").html(),
                order_contact_tel:$("#o_contact_tel").html(),
                order_price:      $("#o_price").html(),
                yajin:            $("#o_yajin").html(),
                order_youhui:     $("#order_youhui").val(),
                order_chepai:     $("#o_chepai").html(),
                customer_name:    $("#o_name").html(),
                car_name:         $("#o_carname").html(),
                order_jiaoqiang:  $("#o_jq").html(),
                order_chesun:     $("#o_cs").html(),
                order_disanzhe:   $("#o_dsz").html(),
                order_bujimianpei:$("#o_bjmp").html(),
                heji_price:$("#o_price3").html(),
                shishou_price:$("#o_price2").html()

            },
            success:function(data){
                //alert(data);
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
        
		 //获取当前页的html代码  
            var bodyhtml = window.document.body.innerHTML;  
            //设置打印开始区域、结束区域  
            var startFlag = "<!--startprint-->";
            var endFlag = "<!--endprint-->";
            // 要打印的部分
            var printhtml = bodyhtml.substring(bodyhtml.indexOf(startFlag),bodyhtml.indexOf(endFlag));  
            // 生成并打印ifrme  
            var f = document.getElementById('printf'); 
            f.contentDocument.write("<link href='/public/css/bootstrap.min.css?v=3.3.5' rel='stylesheet'>")
            f.contentDocument.write(printhtml);
            f.contentDocument.close();
            f.contentWindow.print();
}
	function step_one(){
		$("#step_2").addClass('animated fadeOutLeft');
		$("#step_2").css(
			'display', 'none'
		);
		$("#step_1").removeClass('animated fadeOutLeft');
		$("#step_1").addClass('animated fadeInLeft');
		$("#step_1").css(
			'display', 'block'
		);
		$("#o_start_time").html($("#start_time").val());
		$("#o_end_time").html($("#end_time").val());
		
	}
	function step_two(){
		$("#step_1").addClass('animated fadeOutLeft');
		$("#step_1").css({
			display: 'none'
		});
		

		$("#step_3").css({
			display: 'none'
		});
		$("#step_4").css({
			display: 'none'
		});

		$("#step_2").removeClass('animated fadeOutLeft');
		$("#step_2").addClass('animated fadeInLeft');
		$("#step_2").css({
			display: 'block'
		});
	}
	function step_three(){
		$("#step_2").addClass('animated fadeOutLeft');
		$("#step_2").css(
			'display', 'none'
		);
        $("#step_4").addClass('animated fadeOutLeft');
        $("#step_4").css(
            'display', 'none'
        );
		$("#step_3").removeClass('animated fadeOutLeft');
		$("#step_3").addClass('animated fadeInLeft');
		$("#step_3").css({
			display: 'block'
		});
	}
    function add_user(){

        $.ajax({
                    url:'/index.php/home/order/user_add',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{

                        order_realname:$("#order_realname").val()
                    },
                    dataType:'text',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){
                        if(data!==0){
                            alert(data);
                            $("#order_user_id").val(data);
                        }
                        },
                    error:function(xhr,textStatus){
                         
                    },
                    complete:function(){
                    }
            });


        
    }
	function step_four(adu){
        if(adu==1){

            if($("#user_id").val()==""){
                add_user();
            }
        }
		


		$("#step_3").addClass('animated fadeOutLeft');
		$("#step_3").css({
			display: 'none'
		});
        $("#step_5").addClass('animated fadeOutLeft');
        $("#step_5").css({
            display: 'none'
        });

		$("#step_4").removeClass('animated fadeOutLeft');
		$("#step_4").addClass('animated fadeInLeft');
		$("#step_4").css({
			display: 'block'
		});
		//doPrint();
        }
	function step_five(){
		$("#step_1").css(
			'display', 'none'
		);
		$("#step_2").css(
			'display', 'none'
		);
		$("#step_3").css(
			'display', 'none'
		);
		$("#step_4").css(
			'display', 'none'
		);
		$("#step_5").removeClass('animated fadeOutLeft');
		$("#step_5").addClass('animated fadeInLeft');
		$("#step_5").css({
			display: 'block'
		});

        var checkIds= '';
        $('input[name="baoxian"]:checked').each(function(){
        checkIds += $(this).val()+","
        })
        checkIds = checkIds.substring(0,checkIds.length-1);
         $.ajax({
                    url:'/index.php/home/order/order_post',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{

                        
                        order_start_time:$("#start_time").val(),
                        order_end_time:$("#end_time").val(),
                        order_days:$("#d_6").val(),
                        order_car_id:$("#car_id").val(),
                        order_user_id:$("#user_id").val(),
                        baoxian:checkIds,
                        order_contact:$("#order_contact").val(),
                        order_contact_tel:$("#order_contact_tel").val(),
                        yh:$("#order_youhui").val()
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){
                        $("#sn").html(data.order_sn);
                        $("#o_name").html(data.user_name);
                        $("#o_tel").html(data.user_tel);
                        $("#o_pin_org").html(data.pincode_org);
                        $("#o_pin").html(data.pincode);
                        $("#o_address").html(data.address);
                        $("#o_now_address").html(data.now_address);
                        $("#o_contact").html(data.contact_name);
                        $("#o_contact_tel").html(data.contact_tel);
                        $("#o_chepai").html(data.car_chepai);
                        $("#o_price").html(data.car_zujin);
                        $("#o_start_time").html(data.start_time);
                        $("#o_end_time").html(data.end_time); 
                        $("#o_price2").html(data.shishou);
                        $("#o_price3").html(data.heji);
                        $("#h_o_u_id").val(data.userid);
                        $("#h_o_c_id").val(data.carid);
                        $("#o_yh").html(data.youhui);
                        $("#o_carname").html(data.carname);

                        if(!data.jiaoqiang){
                            $("#o_jq").html("无购买");

                        }else{
                             $("#o_jq").html(data.jiaoqiang_);
                        }
                        if(!data.disanzhe){
                            $("#o_dsz").html("无购买");

                        }else{
                             $("#o_dsz").html(data.disanzhe_);
                        }
                        if(!data.bujimianpei){
                            $("#o_bjmp").html("无购买");

                        }else{
                             $("#o_bjmp").html(data.bujimianpei_);
                        }
                        if(!data.chesun){
                            $("#o_cs").html("无购买");

                        }else{
                             $("#o_cs").html(data.chesun_);
                        }
                         $("#o_yajin").html(data.yajin); 
                         $("#o_chaoshi").html(data.chaoshi); 

                        },
                    error:function(xhr,textStatus){
                         
                    },
                    complete:function(){
                    }
            });



		var index = parent.layer.getFrameIndex(window.name); 
            //$("#layui-layer"+index,window.parent.document).css('width', '1260px');
            $("#layui-layer"+index,window.parent.document).css('height', '800px');
            //$("#layui-layer"+index,window.parent.document).css('left', '39px');
		//doPrint();
	}
	function user_add_step(){
		$("#step_3").addClass('animated fadeOutLeft');
		$("#step_3").css(
			'display', 'none'
		);
		$("#user_add").removeClass('animated fadeOutLeft');
		$("#user_add").addClass('animated fadeInLeft');
		$("#user_add").css({
			display: 'block'
		});
	}
	function select_car(id){
		$("#car_id").val(id);
		$(".test_bj").remove('btn-waring');
		$(".test_bj").addClass('btn-primary');
		$(".test_bj").html('选择');

		$("#car_"+id).css('color', 'red');
		$("#car_"+id).siblings().css('color', '#676a6c');
		$("#car_"+id+" .test_bj").removeClass('btn-primary');
		$("#car_"+id+" .test_bj").addClass('btn-waring');
		$("#car_"+id+" .test_bj").html('已选');
		$("#button_2").removeClass('disabled');


		$.ajax({
                    url:'/index.php/home/order/car_detail',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        id:id
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){

                    	var html_data="";
                    		
                    		var price=$("#d_6").val()*data["price"];
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_price").html(price+"元");
                 			$("#o_price2").html(price+"元");
                 			$("#o_price3").html(price+"元");
                 			$("#o_yajin").html(data["yajin"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                 			$("#o_chepai").html(data["chepai"]);
                    	 
                    	 //$("#html_user").html(html_data);

                         //车辆信息赋值
                         $("#d_name").html(data["nickname"]);
                         $("#d_chepai").html(data["chepai"]);
                         $("#d_jibie").html(data["jibie"]);
                         $("#d_ranyou").html(data["ranyou"]);
                         $("#d_fadongji").html(data['fadongji']);
                         $("#d_qudong").html(data["qudong"]);
                         $("#d_jiegou").html(data["jiegou"]);
                         $("#d_zuowei").html(data["zuowei"]);
                         $("#d_status").html(data["status"]);
                         $("#d_gongli").html(data["gongli"]);
                         $("#d_youliang").html(data["youliang"]);
                         $("#d_youxiang").html(data["youxiang"]+"升");
                         $("#d_buy_date").html(data["buy_date"]);
                         $("#d_baoyang_date").html(data["baoyang_date"]);
                         $("#d_xuyao_date").html(data["xubao_date"]);
                         $("#d_md").html(data["tingkao_company"]);
                         $("#d_yajin").html(data["yajin"]);
                         $("#d_price").html(data["price"]);
                         $("#d_week_price").html(data["week_price"]);
                         $("#d_reason_price").html(data["reason_price"])
                         $("#d_month_price").html(data["month_price"]);
                         $("#d_half_price").html(data["half_price"]);
                         $("#d_year_price").html(data["year_price"]);
                         $("#d_chaoshi").html(data["chaoshi"]);
                         //保险赋值
                         $("#inlineCheckbox1").val(data["jiaoqiang"]);
                         $("#inlineCheckbox4").val(data["bujimianpei"]);
                         $("#inlineCheckbox3").val(data["disanzhe"]);
                         $("#inlineCheckbox2").val(data["chesun"]);
                        },
                    error:function(xhr,textStatus){
                    	 
                    },
                    complete:function(){
                    }
            })
		

	}
    function cancle_user(id){
        $("#user_id").val('');
        $("#button_3").addClass('disabled');
        $(".user_bj").html('选择');

        $("#user_"+id).css('color', '#676a6c');
        $("#user_"+id).siblings().css('color', '#676a6c');
        $("#user_"+id+" .user_bj").parent().html("<a href='#' class='user_bj' onclick=select_user(&quot;"+id+"&quot;)>选择</a>");
        EnableAddUser();

    }
	function select_user(id){
		$("#user_id").val(id);
		$("#button_3").removeClass('disabled');
		$(".user_bj").html('选择');

		$("#user_"+id).css('color', 'red');
		$("#user_"+id).siblings().css('color', '#676a6c');
		$("#user_"+id+" .user_bj").parent().html("<a href='#' class='user_bj' onclick=cancle_user(&quot;"+id+"&quot;)>取消</a>");
        DisableAddUser();
        check_form();
        

	}
    function check_form(){
        if($("#user_id").val()==""){
            if($("#order_realname").val()==""||$("#order_sex").val()==""||$("#order_user_level").val()==""||$("#order_pincode").val()==""||$("#order_pin_address").val()==""||$("#order_org").val()==""||$("#order_tel").val()==""||$("#order_address").val()==""||$("#order_jzhm").val()==""||$("#order_jzorg").val()==""||$("#order_jiazhao").val()==""||$("#order_contact").val()==""||$("#order_contact_tel").val()==""||$("#order_contact_address").val()==""){
                $("#button_3").addClass('disabled');
            }else{
                $("#button_3").removeClass('disabled');
            }
        }else{
            if($("#order_contact").val()==""||$("#order_contact_tel").val()==""||$("#order_contact_address").val()==""){
                $("#button_3").addClass('disabled');
            }else{
                $("#button_3").removeClass('disabled');
            }

        }

    }
    function EnableAddUser(){
        $("#order_realname,#order_sex,#order_user_level,#order_pincode,#order_org,#order_pin_address,#order_tel,#order_address,#order_email,#order_jzhm,#order_jiazhao,#order_jzorg").removeAttr('disabled')
    }
    function DisableAddUser(){
        $("#order_realname,#order_sex,#order_user_level,#order_pincode,#order_org,#order_pin_address,#order_tel,#order_address,#order_email,#order_jzhm,#order_jiazhao,#order_jzorg").attr({
            disabled: 'disabled'
        });
    }
	 function change_time(t){
	 	$("#d"+t).removeClass(' btn-white').addClass(' btn-primary');
	 	$("#d"+t).siblings().removeClass(' btn-primary').addClass('btn-white');
	 	$("#button_2").addClass('disabled');
        $("#car_list").html("");
	 	
	 	$.ajax({
                    url:'/index.php/home/order/date_add',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        d:t,ti:$("#start_time").val(),s:$("#d_6").val()
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){
                    	if(data['info']==1){
                    	$("#end_time").val(data['date']);
                    	$("#d_6").val(data['days']);
                    	$('#button_1').removeClass('disabled');
                    	$("#button_2").addClass('disabled');
                    	$("#car_list").html("");

                    }else{
                    		alert('时间错误，请重新选择');
                    		$("#d_6").val(data['days']);
                    		$('#button_1').addClass('disabled');
                    	}
                    },
                    error:function(xhr,textStatus){
                    	 
                    },
                    complete:function(){
                    }
            })
    	

    }

    function set_search(keywords){
    	$("#searchbar").val(keywords);
    	search_action();

    	
    }
    function search_user_action(){
    	$("#button_3").addClass('disabled');
    	var keywords=$("#searchbar_user").val();
    	$.ajax({
                    url:'/index.php/home/order/search_user',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        keywords:keywords
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){

                    	var html_data="";
                    	
                    	 $(data).each(function(index, el) {
                    	 	
                    	 	html_data+=" <tr id='user_"+el.id+"'><td></td><td>"+el.realname+"</td><td>"+el.sex+"</td><td>"+el.pincode+"</td><td>"+el.tel+"</td><td>"+el.user_level+"</td><td><a href='#' class='user_bj' onclick=select_user(&quot;"+el.id+"&quot;)>选择</a></td></tr>";

                    	 	
                    	 })
                    	 html_data+="<tr><td colspan='4'><i class='fa fa-warning'></i> 没有找到用户？请尝试键入手机号码或者身份证号进行检索,或者您也可以进行新增用户！</td><td></td><td  ></td><td></td></tr>";
                    	 
                    	 $("#html_user").html(html_data);
                    },
                    error:function(xhr,textStatus){
                    	 
                    },
                    complete:function(){
                    }
            })
    }
    function search_action(){
    	$("#button_2").addClass('disabled');
    	var keywords=$("#searchbar").val();
    	$.ajax({
                    url:'/index.php/home/order/search_car',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        keywords:keywords
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){

                    	var html_data="";
                    	var i=0;
                    	 $(data).each(function(index, el) {
                    	 	i=i+1;
                    	 	html_data+=" <tr id='car_"+el.id+"'><td class='client-avatar'><div class='glyphicon glyphicon-ok'></div> </td><td><a data-toggle='tab' href='#contact-1' class='client-link'>"+el.nickname+"</a></td><td>"+el.nickname+"</td><td class='contact-type'><i class='fa fa-envelope'> </i></td><td> "+el.chepai+"</td><td class='client-status'><button  type='button' class='btn btn-primary test_bj' onclick=select_car(&quot;"+el.id+"&quot;)>选择</button></td> </tr>";

                    	 	
                    	 })
                    	 if(i>=1){
                    	 	$('#no_search').css('display', 'none');
                    	 }else{
                    	 	$('#no_search').css('display', 'block');
                    	 }

                    	 if(i>=3){
                    	 	$(".search-result").css('overflow', 'auto');
                    	 	$(".search-result").css('overflow-x', 'hidden');
                    	 }else{
                    	 	$(".search-result").css('overflow', 'hidden');
                    	 }
                    	 $("#car_list").html(html_data);
                    },
                    error:function(xhr,textStatus){
                    	 
                    },
                    complete:function(){
                    }
            })
    }
    
</script>
</head>
<body class="">
<div id="step_1">

<div class="wrapper wrapper-content">
	<div class="row">
	<form id="form_order" action="/index.php/home/order/order_post" method="post" name="form_order" class="wizard-big wizard clearfix" role="application" novalidate="novalidate">


		<div class="steps clearfix"><ul role="tablist"><li role="tab" class="first current error" aria-disabled="false" aria-selected="true"><a id="form-t-0" href="#form-h-0" aria-controls="form-p-0"><span class="current-info audible">当前步骤： </span><span class="number">1.</span> 账户</a></li><li role="tab" class="disabled" aria-disabled="true"><a id="form-t-1" href="#form-h-1" aria-controls="form-p-1"><span class="number">2.</span> 个人资料</a></li><li role="tab" class="disabled" aria-disabled="true"><a id="form-t-2" href="#form-h-2" aria-controls="form-p-2"><span class="number">3.</span> 警告</a></li><li role="tab" class="disabled last" aria-disabled="true"><a id="form-t-3" href="#form-h-3" aria-controls="form-p-3"><span class="number">4.</span> 完成</a></li></ul></div>
	</div>
	<div style=" margin-top: 20px;"></div>
	<div class="row">
                            <div class="col-sm-6">
                            <label class="col-sm-3 control-label">开始时间</label>
                                <div class="input-group col-sm-9">
                                 
                                    <input type="text" class="form-control " name="order_start_time" readonly="readonly" id="start_time" required="">
                                	<span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                            </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="col-sm-3 control-label">结束时间</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control " name="order_end_time" id="end_time" readonly="readonly" required="required">
                                    <span class="input-group-addon">
                                    <span class="fa fa-calendar"></span>
                            </span>
                                </div>
                            </div>
                            
   </div>
   <div style="margin-top: 20px;"></div>
   <div class="row">
   
		   <div class="col-sm-6">
		                            <label class="col-sm-3 control-label">快捷选择</label>
		                                <div class="input-group col-sm-8 ">
		                                 
		                                    <div class="btn-group">
				                                <button class="btn btn-primary" type="button" onclick="change_time(0);" id="d0">日</button>
				                                <button class="btn btn-white" type="button" onclick="change_time(1);" id="d1">周</button>
				                                <button class="btn btn-white" type="button" onclick="change_time(2);" id="d2">月</button>
				                                <button class="btn btn-white" type="button" onclick="change_time(3);" id="d3">季</button>
				                                <button class="btn btn-white" type="button" onclick="change_time(4);" id="d4">半年</button>
				                                <button class="btn btn-white" type="button" onclick="change_time(5);" id="d5">年</button>

		                            	   </div>
		                            	   
		                                
		                                </div>
		   </div>
		   
   
   </div>
   <div style="margin-top: 20px;"></div>
   <div class="row">
   		<div class="col-sm-6">
   			<label class="col-sm-3 control-label">输入天数</label>
		                                <div class="">
		                                 
		                                    <div class="input-group  col-sm-2 ">
				                                <input type="text" class="form-control " id="d_6" name="order_days" style="width: 50px;" onblur="change_time(6);" value="3" /><span class="input-group-addon">天</span>
				                                

		                            	   </div>
		                            	   <div class="input-group col-sm-1 ">	</div>
		                                
		                                </div>

   		</div>

   </div>
   <div style="margin-top: 20px;"></div>
   <div class="row">
   		<div class="col-sm-1"></div>
   			
   		<div class="col-sm-12">
   			<a class="btn btn-warning  btn-rounded btn-block" href="#" id="button_1" onclick="step_two();"><i class="fa fa-info-circle"></i> 去选车</a>
   		</div>
   		<div class="col-sm-1"></div>
   			
   	</div>
   	<div style="margin-top: 20px;"></div>
   	<div class="row">
   	<div class="alert alert-warning">
   	<ul>
   		<li>1.使用快捷选择可以快速确定租车周期</li>
   		<li>2.输入天数后，输入框失去焦点，还车日期即可确定</li>
   		<li>3.开始时间更换后快捷选择需要重新点选</li>
   		
   		
   		
   	</ul>
   	</div>
   	</div>
   </div>

</div>
<div id="step_2" style="display: none;">
	<div class="wrapper wrapper-content" style="padding-top: 0px;">
		<div class="row">
			<div class="input-group">
                            <input type="text" placeholder="查找车辆" class="input form-control" id="searchbar">
                            <input type="hidden" value="" name="order_car_id" id="car_id" class="input form-control">
                            <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary" onclick="search_action();"> <i class="fa fa-search"></i> 搜索</button>
                                </span>
                        </div>
		</div>
		<div style="margin-top: 20px;"></div>
		<div class="row">
							<p>
                        <button type="button" class="btn btn-outline btn-default" onclick="set_search('速腾');">速腾</button>
                        <button type="button" class="btn btn-outline btn-primary" onclick="set_search('君威');">君威</button>
                        <button type="button" class="btn btn-outline btn-success" onclick="set_search('朗逸');">朗逸</button>
                        <button type="button" class="btn btn-outline btn-info"    onclick="set_search('捷达');">捷达</button>
                        <button type="button" class="btn btn-outline btn-warning" onclick="set_search('帕萨特');">帕萨特</button>
                        <button type="button" class="btn btn-outline btn-danger"  onclick="set_search('嘉年华');">嘉年华</button>
                        <button type="button" class="btn btn-outline btn-link"    onclick="set_search('');">清空</button>
                    </p>
		</div>
		<div style="margin-top: 20px;"></div>
		<div class="row">
			<div class="search-result" style="overflow:; height: 170px;">
                            <table class="table table-striped table-hover">
                                                <tbody id="car_list">
                                                    <div id="no_search" style="text-align: center;"> 暂无查询数据!</div>
                                                    
                                                    
                                                </tbody>
                                            </table>

                        	

             
                        </div>
		</div>
		<div style="margin-top: 20px;"></div>
		<div class="row">
			<table class="table table-bordered">
                            <thead>
                           
                                <tr>
                                    <td>车辆名称：</td>
                                    <th id="d_name"></th>
                                    <td>车牌：</td>
                                    <th id="d_chepai"></th>
                                    <td>车辆级别：</td>
                                    <th id="d_jibie"></th>
                                    <td>燃油编号：</td>
                                    <th id="d_ranyou"></th>
                                </tr>
                                <tr>
                                    <td>发动机：</td>
                                    <th id="d_fadongji"></th>
                                    <td>驱动：</td>
                                    <th id="d_qudong"></th>
                                    <td>车辆结构：</td>
                                    <th id="d_jiegou"></th>
                                    <td>座位：</td>
                                    <th id="d_zuowei"></th>
                                </tr>
                                <tr>
                                    <td>车辆状态：</td>
                                    <th id="d_status"></th>
                                    <td>当前公里：</td>
                                    <th id="d_gongli"></th>
                                    <td>当前油量：</td>
                                    <th id="d_youliang"></th>
                                    <td>油箱容积：</td>
                                    <th id="d_youxiang"></th>
                                </tr>
                                <tr>
                                    <td>购买日期：</td>
                                    <th id="d_buy_date"></th>
                                    <td>续保日期：</td>
                                    <th id="d_xuyao_date"></th>
                                    <td>保养日期：</td>
                                    <th id="d_baoyang_date"></th>
                                    <td>停靠门店：</td>
                                    <th id="d_md"></th>
                                </tr>
                                <tr>
                                    <td>车辆押金：</td>
                                    <th id="d_yajin"></th>
                                    <td>日租金：</td>
                                    <th id="d_price"></th>
                                    <td>周祖金：</td>
                                    <th id="d_week_price"></th>
                                    <td>月租金：</td>
                                    <th id="d_month_price"></th>
                                </tr>
                                <tr>
                                    <td>季租金：</td>
                                    <th id="d_reason_price"></th>
                                    <td>半年租金：</td>
                                    <th id="d_half_price"></th>
                                    <td>年租金：</td>
                                    <th id="d_year_price"></th>
                                    <td>超时扣款：</td>
                                    <th id="d_chaoshi"></th>
                                </tr>
                            </thead>
                        </table>
		</div>

		<div style="margin-top: 20px;"></div>
		<div class="row">
   		<div class="col-sm-1"></div>
   			
   		<div class="col-sm-5">
   			<a class="btn btn-white  btn-rounded btn-block " id="button_2_l" href="#" onclick="step_one();"><i class="fa fa-info-circle"></i> 上一步</a>

   		</div>
   		<div class="col-sm-5">
   			<a class="btn btn-warning  btn-rounded btn-block disabled" id="button_2" href="#" onclick="step_three();"><i class="fa fa-info-circle"></i> 选好了，下一步</a>

   		</div>
   		<div class="col-sm-1"></div>
   			
   	</div>
	</div>

</div>

<div id="step_3" style="display: none;">
	<div class="wrapper wrapper-content" style="padding-top: 0px;">
		<div class="row">
			<div class="input-group">
                            <input type="text" placeholder="查找用户" class="input form-control" id="searchbar_user" oninput="search_user_action()">
                            <input type="hidden" value="" name="order_user_id" id="user_id">
                            <span class="input-group-btn">
                                        <button type="button" class="btn btn btn-primary" onclick="search_user_action();"> <i class="fa fa-search"></i> 搜索</button>
                                </span>
                        </div>
		</div>
		
		<div class="row">
            <div class="col-sm-12">
                <div class=" float-e-margins">
                    
                    <div class="">
                        
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>

                                        <th></th>
                                        <th>姓名</th>
                                        <th>性别</th>
                                        <th>身份证</th>
                                        <th>电话</th>
                                        <th>用户级别</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody id="html_user">

                                    
                                    
                                    
                                    <tr>
                                        <td colspan='4'>
                                            <i class="fa fa-warning"></i> 没有找到用户？请尝试键入手机号码或者身份证号进行检索,或者您也可以进行新增用户！
                                        </td>
                                        <td></td>
                                        <td></td>
                                        
                                      
                                        
                                        <td>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <div class="row">
        	 <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    
                    <div class="ibox-content">
        	<div class="table-responsive">
        	<div class="row">

        			
            </div>
                            <table class="table table-striped">
                            <tr></tr>
                            <tr><td ></td>
                    <td colspan="11"><i class="fa fa-info-circle" style="color:#f0ad4e"></i> 通过查询选择用户后，将不能进行新增操作，若要进行新增，请首先取消选择！</td>

                    </tr>
                    
                            <tr class="u_i">
                            	<td>姓名：</td>
                            	<td><input type="text" class="form-control " name="order_realname" onblur="check_form();" id="order_realname" required="" placeholder="姓名" ></td>
                            	<td><select class="form-control" name="order_sex" id="order_sex" onblur="check_form();">
                                        <option>性别</option>
                                        <option value="男">男</option>
                                        <option value="女">女</option>
                                       
                                    </select></td>
                            	<td><select class="form-control" name="order_user_level" onblur="check_form();" id="order_user_level">
                                        <option>会员级别</option>
                                        <option>普通会员</option>
                                        <option>黄金会员</option>
                                        <option>铂金会员</option>
                                    </select></td>
                            	<td colspan="8"></td>
                            	
                            </tr>
                            <tr  class="u_i"></tr>
                            <tr  class="u_i">
                            	<td>身份证：</td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_pincode" name="order_pincode" required="" placeholder="身份证号码" ></td>
                            	<td><input type="text" class="form-control "  onblur="check_form();"id="order_pin_address" name="order_pin_address" required="" placeholder="身份证地址" ></td>
                            	<td colspan="8"><input type="text" class="form-control " onblur="check_form();" id="order_org" name="order_org" required="" placeholder="身份证颁发机关" ></td>
                            	<td></td>
                            </tr>
                            <tr  class="u_i"></tr>
                            <tr  class="u_i">
                            	<td>电话：</td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_tel" name="order_tel" required="" placeholder="手机号码"></td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_address" name="order_address" placeholder="家庭住址" required="" ></td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_email" name="order_email" placeholder="电子邮件" required="" ></td>
                            	<td colspan="8"></td>
                            	
                            </tr> 
                            <tr  class="u_i"></tr>
                            <tr  class="u_i">
                            	<td>驾照信息：</td>
                            	<td><input type="text" class="form-control " id="order_jzhm" name="order_jzhm" required="" placeholder="驾照号码" ></td>
                            	<td><select class="form-control" name="order_jiazhao" id="order_jiazhao" onblur="check_form();">
                                        <option>驾照类型</option>
                                        <option>C1</option>
                                        <option>C2</option>
                                        <option>B1</option>
                                    </select></td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_jzorg" name="order_jzorg" placeholder="驾照颁发机关" required="" ></td>
                            	<td colspan="8">
                            		
                            	</td>
                            	
                            </tr>
                             <tr  class="u_i"></tr>
                          
                            <tr>
                            	<td>紧急联系人：</td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_contact" name="order_contact" placeholder="紧急联系人姓名" required="" ></td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_contact_tel" name="order_contact_tel" placeholder="紧急联系人电话" required="" ></td>
                            	<td><input type="text" class="form-control " onblur="check_form();" id="order_contact_address" name="order_contact_address" placeholder="紧急联系人地址" required="" ></td>
                            	<td colspan="8"></td>
                            	
                            </tr>
                            </table>
                            <div class="row">
   
   	</div>
            </div>
            </div>
            </div>
            </div>

        </div>
        
		<div class="row">
   		<div class="col-sm-1"></div>
   			
   		<div class="col-sm-5">
   			<a class="btn btn-white  btn-rounded btn-block " id="button_3_l" href="#" onclick="step_two();"><i class="fa fa-info-circle"></i> 上一步</a>

   		</div>
   		<div class="col-sm-5">
   			<a class="btn btn-warning  btn-rounded btn-block disabled" id="button_3" href="#" onclick="step_four(1);"><i class="fa fa-info-circle"></i> 选择保险/填写优惠</a>
   		</div>
   		<div class="col-sm-1"></div>
   			
   	</div>
	


</div>
</div>

<div id="step_4" style="display: none;">
	<div class="wrapper wrapper-content" style="padding-top: 0px;">
	<div class="row">
		<div class="alert alert-info">请选择保险项目。</div>
	</div>
	<div class="row">
		<label for="name">必选保险</label>
<div  class="input-group col-sm-9">
  <label class="checkbox-inline">
    <input type="checkbox" name="baoxian" id="inlineCheckbox1-" value="jiaoqiang">基本险
  </label>
  <label class="checkbox-inline">
    <input type="checkbox" name="baoxian" id="inlineCheckbox2-" value="chesun">车损险
  </label>
  <label class="checkbox-inline">
    <input type="checkbox" name="baoxian" id="inlineCheckbox3-" value="disanzhe">第三者责任险
  </label>
   <label class="checkbox-inline">
    <input type="checkbox" name="baoxian" id="inlineCheckbox4-" value="bujimianpei">不计免赔
  </label>
  <label class="checkbox-inline">
    优惠：
  </label>
  <input type="text" id="order_youhui" value="0">元
  
</div>


	</div>
	<div style="margin-top: 20px;"></div>
	<div class="row">
   		<div class="col-sm-1"></div>
   			
   		<div class="col-sm-5">
   			<a class="btn btn-white  btn-rounded btn-block " id="button_4_l" href="#" onclick="step_three();"><i class="fa fa-info-circle"></i> 上一步</a>

   		</div>
   		<div class="col-sm-5">
   			<a class="btn btn-warning  btn-rounded btn-block" id="button_4" href="#" onclick="step_five();"><i class="fa fa-info-circle"></i> 下一步</a>
            
           

   		</div>
   		<div class="col-sm-1"></div>
   			
   	</div>
	</div>
</div>

<div id="step_5" style="display: none;" style="width: 60%;">
	<div class="wrapper wrapper-content" style="padding-top: 0px;">
		
		<div id="carRentalList" class="container-fluid" style="width: 60%;">
    <div class="col-md-12">
<!--startprint-->

        <h5 class="table1Center1" align="top">租车单</h5><h6 class="table1Center2" align="top">单号：<span id="sn"></span></h6>

        <table class="table table1 table-bordered">
            <thead>
            
            
            </thead>
            <tbody>
            <tr>
                <td class="rentalListTitle" colspan="4">租车人信息</td>
            </tr>
            <tr>
                <input type="hidden" value="" id="h_o_u_id">
                <input type="hidden" value="" id="h_o_c_id">
                <td>姓名</td>
                <td id="o_name"></td>
                <td>电话：</td>
                <td id="o_tel"></td>
            </tr>
            <tr>
                <td colspan="1" >身份证颁发机关：</td>
                <td colspan="3" id="o_pin_org"></td>
            </tr>
            <tr>
                <td colspan="1">身份证号：</td>
                <td colspan="3" id="o_pin"></td>
            </tr>
            <tr>
                <td>家庭住址</td>
                <td colspan="3" id="o_address"></td>
            </tr>
            <tr>
                <td>现住址</td>
                <td colspan="3" id="o_now_address"></td>
            </tr>
            <tr>
                <td>紧急联系人姓名：</td>
                <td id="o_contact"></td>
                <td>紧急联系人电话：</td>
                <td id="o_contact_tel"></td>
            </tr>
            <tr>
                <td class="rentalListTitle" colspan="4">租车详情(<span id="o_carname"></span>)</td>
            </tr>
            <tr>
                <td>车牌号：</td>
                <td id="o_chepai"></td>
                <td>租金：</td>
                <td id="o_price"></td>
            </tr>
            <tr>
                <td>取车时间：</td>
                <td id="o_start_time"></td>
                <td>还车时间：</td>
                <td id="o_end_time"></td>
            </tr>
            <tr>
                <td>交强险：</td>
                <td id="o_jq"></td>
                <td>车损险：</td>
                <td id="o_cs"></td>
            </tr>
            <tr>
                <td>第三者责任险：</td>
                 <td id="o_dsz"></td>
                <td >不计免赔：</td>
                <td id="o_bjmp"></td>
            </tr>
            <tr>
                <td>预授权押金:</td>
                <td id="o_yajin"></td>
                <td>超时租金:</td>
                <td id="o_chaoshi"></td>
            </tr>
             <tr>
                <td>租金合计：</td>
                <td id="o_price3"></td>
                <td>实收租金合计：</td>
                <td id="o_price2">元 (已优惠： <span id="o_yh"></span>元)</td>
            </tr>
            </tbody>
        </table>
        <table class="table2">
            <tbody>
            <tr>
                <td><p>出租人盖章：</p></td>
                <td></td>
                <td><p>租赁人签字：</p></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="4"><p>经办人签字：</p></td>
            </tr>
            <tr>
                <td colspan="2" class="tableDateCenter">年月日</td>
                <td colspan="2" class="tableDateCenter">年月日</td>
            </tr>
            </tbody>
        </table>
 <!--endprint-->
        <div class="row">
   		<div class="col-sm-1"></div>
   			
   		<div class="col-sm-5">
   			<a class="btn btn-white  btn-rounded btn-block " id="button_2_5_l" href="#" onclick="step_four(0);"><i class="fa fa-info-circle"></i> 上一步</a>

   		</div>
   		<div class="col-sm-5">
   			<a class="btn btn-warning  btn-rounded btn-block " id="button_5" href="#" onclick="doPrint();"><i class="fa fa-info-circle"></i> 确认订单</a>

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
    <script src="/public/js/layer/layer.js"></script>
     <script src="/public/js/plugins/staps/jquery.steps.min.js"></script>

    <script>
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
        minView: 2,
        forceParse: 0
    }).on('changeDate', function(e){
        change_datetimepicker();
    });
    $('#start_time').datetimepicker('setDate' , new Date());
    
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
        }).on('changeDate', function(e){
        change_datetimepicker();
    });
    $('#end_time').datetimepicker( 'setDate' , new Date((myDate/1000+86400*3)*1000));

    function change_datetimepicker(){
    	$("#button_2").addClass('disabled');
        $("#car_list").html("");
    	$.ajax({
                    url:'/index.php/home/order/check_days',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        start_time:$("#start_time").val(),end_time:$("#end_time").val()
                    },
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    success:function(data,textStatus,jqXHR){
                    	if(data['info']==1){
                    	$("#d_6").val(data['days']);
                    	$('#button_1').removeClass('disabled');
                    }else{
                    	alert('时间错误，请重新选择');
                    	$("#d_6").val(data['days']);
                    	$('#button_1').addClass('disabled');
                    }
                    },
                    error:function(xhr,textStatus){
                    	 
                    },
                    complete:function(){
                    }
            })
    }

    </script>
    
</form>
<iframe id="printf" src="" width="0" height="0" frameborder="0"></iframe>
</body>
</html>