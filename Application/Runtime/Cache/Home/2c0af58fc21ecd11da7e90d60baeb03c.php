<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title></title>

    <link rel="shortcut icon" href="favicon.ico"> 
    <link href="/public/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/public/css/animate.min.css" rel="stylesheet">
    <link href="/public/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
    <div class="row">
        <div class="col-sm-12">
            <div class="wrapper wrapper-content animated fadeInUp">
            <!--车辆基本信息开始-->
            <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="m-b-md">
                                    
                                    <h2>车辆名称：<?php echo ($name); ?></h2>
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>级别：</dt>
                                    <dd><span class="label label-primary"><?php echo ($jibie); ?></span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <dl class="dl-horizontal">

                                    <dt>气囊：</dt>
                                    <dd><?php echo ($qinang); ?> 个</dd>
                                    <dt>座椅：</dt>
                                    <dd><?php echo ($zuoyi); ?></dd>
                                    <dt>油箱容量：</dt>
                                    <dd><?php echo ($youxiang); ?> 升</dd>
                                    <dt>燃油标号：</dt>
                                    <dd><?php echo ($ranyou); ?> #</dd>
                                    <dt>座位：</dt>
                                    <dd><?php echo ($zuowei); ?> 座</dd>
                                    
                                </dl>
                            </div>
                            <div class="col-sm-4" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>天窗：</dt>
                                    <dd><?php echo ($tianchuang); ?></dd>
                                    <dt>发动机：</dt>
                                    <dd><?php echo ($fadongji); ?></dd>
                                    <dt>驱动：</dt>
                                    <dd>
                                        <?php echo ($qudong); ?>
                                    </dd>
                                    <dt>车门数量：</dt>
                                    <dd><?php echo ($chemen); ?> 个</dd>
                                    <dt>车身结构：</dt>
                                    <dd><?php echo ($jiegou); ?></dd>
                                </dl>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            <!--基本信息结束-->
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="m-b-md">
                                    <a href="#" onclick="javascript:return false;" class="btn btn-white btn-xs pull-right">编辑项目</a>
                                    <h2>别名：<?php echo ($nickname); ?> 车牌：<span class=""><?php echo ($chepai); ?></span></h2>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <dl class="dl-horizontal">

                                    <dt>车辆状态：</dt>
                                    <dd><span class="btn btn-warning"><?php echo ($status); ?></span></dd>
                                    <dt>当前公里：</dt>
                                    <dd><?php echo ($gongli); ?></dd>
                                    <dt>当前油量：</dt>
                                    <dd><?php echo ($youliang); ?>
                                    </dd>
                                    
                                </dl>
                            </div>
                            <div class="col-sm-4" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>停靠公司：</dt>
                                    <dd><?php echo ($tingkao_company); ?></dd>
                                    <dt>停靠门店：</dt>
                                    <dd><?php echo ($tingkao_store); ?></dd>
                                    <dt>添加时间：</dt>
                                    <dd>
                                        <?php echo (date("Y-m-d",$addtime)); ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <dl class="dl-horizontal">
                                    <dt>距离续保截至日期</dt>
                                    <dd>
                                        <div class="progress progress-striped active m-b-sm">剩余<?php echo ($shengyu); ?>天
                                            <div style="width: <?php echo ($percent_xubao); ?>%;" class="progress-bar">已过<?php echo ($yiguo); ?>天</div>
                                        </div>
                                        <small>购买日期 <strong><?php echo (date("Y-m-d",$buy_date)); ?></strong></small>
                                        <small>保养日期 <strong><?php echo (date("Y-m-d",$baoyang_date)); ?></strong></small>
                                        <small>续保日期 <strong><?php echo (date("Y-m-d",$xubao_date)); ?></strong></small>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!--租金相关开始-->
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="m-b-md">
                                    
                                    <h2>租金相关：</h2>
                                </div>
                                <dl class="dl-horizontal">
                                    
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <dl class="dl-horizontal">
                                    <dt>日租金：</dt>
                                    <dd><?php echo ($price); ?> 元</dd>
                                    <dt>周租金：</dt>
                                    <dd><?php echo ($week_price); ?> 元</dd>
                                    <dt>月租金：</dt>
                                    <dd><?php echo ($month_price); ?> 元</dd>
                                    <dt>季租金：</dt>
                                    <dd><?php echo ($reason_price); ?> 元</dd>
                                    <dt>半年租金：</dt>
                                    <dd><?php echo ($half_price); ?> 元</dd>
                                    <dt>年租金：</dt>
                                    <dd><?php echo ($year_price); ?> 元</dd>
                                    
                                    
                                </dl>
                            </div>
                            <div class="col-sm-4" id="cluster_info">
                                <dl class="dl-horizontal">

                                    <dt>押金：</dt>
                                    <dd><?php echo ($yajin); ?> 元</dd>
                                    <dt>第三者责任险：</dt>
                                    <dd><?php echo ($disanzhe); ?> 元</dd>
                                    <dt>交强险：</dt>
                                    <dd><?php echo ($jiaoqiang); ?> 元</dd>
                                    <dt>不计免赔：</dt>
                                    <dd><?php echo ($bujimianpei); ?> 元</dd>
                                    <dt>车损险：</dt>
                                    <dd><?php echo ($chesun); ?> 元</dd>
                                    <dt>超时扣款：</dt>
                                    <dd><?php echo ($chaoshi); ?> 元</dd>
                                </dl>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
                <!--租金相关结束-->
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-4">
                               
                            </div>
                            <div class="col-md-4">
                               
                            </div>
                            <div class="col-md-4">
                               
                               <button type="button" class="btn btn-w-m btn-warning" onclick="order_start(&quot;<?php echo ($id); ?>&quot;)">维保</button>
                               
                              
                              
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="tabs-container">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a data-toggle="tab" href="#tab-1" aria-expanded="true"> 保养记录</a>
                                            </li>
                                            <li class=""><a data-toggle="tab" href="#tab-2" aria-expanded="false">维修记录</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="tab-1" class="tab-pane active">
                                                <div class="panel-body">
                                                    
                                                </div>
                                            </div>
                                            <div id="tab-2" class="tab-pane">
                                                <div class="panel-body">
                                                    
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    <script>
        $(document).ready(function(){$("#loading-example-btn").click(function(){btn=$(this);simpleLoad(btn,true);simpleLoad(btn,false)})});function simpleLoad(btn,state){if(state){btn.children().addClass("fa-spin");btn.contents().last().replaceWith(" Loading")}else{setTimeout(function(){btn.children().removeClass("fa-spin");btn.contents().last().replaceWith(" Refresh")},2000)}};
    

    function order_start(id){
       /* $('.page-tabs-content a', window.parent.document).removeClass('active');
        var t="<a href='javascript:;'' class='active J_menuTab' data-id='/index.php/home/admin/order_add/car_id/"+id+"'>--订单<i class='fa fa-times-circle'></i></a>";
        var c="<iframe class='J_iframe' name='iframe0' width='100%' height='100%' src='/index.php/home/admin/order_add/car_id/"+id+"' frameborder='0' data-id='/index.php/home/order/order_add/car_id/"+id+"' seamless='' style='inline'></iframe>";
        $('#content-main iframe', window.parent.document).css("display","none");
        $('.page-tabs-content', window.parent.document).append(t);
        $('#content-main', window.parent.document).append(c);*/

    }
    </script>
    

</body>

</html>