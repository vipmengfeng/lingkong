<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>订单详情</title>
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
            <div class="col-md-12">
<!--startprint-->

        <h6 class="table1Center2" align="top">单号：<span id="sn"><?php echo ($result['order_sn']); ?></span></h6>

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
                <td id="o_name"><?php echo ($result['customer_name']); ?></td>
                <td>电话：</td>
                <td id="o_tel"><?php echo ($result['customer_tel']); ?></td>
            </tr>
            <tr>
                <td colspan="1" >身份证颁发机关：</td>
                <td colspan="3" id="o_pin_org"><?php echo ($result['pincode_org']); ?></td>
            </tr>
            <tr>
                <td colspan="1">身份证号：</td>
                <td colspan="3" id="o_pin"><?php echo ($result['pincode']); ?></td>
            </tr>
            <tr>
                <td>家庭住址</td>
                <td colspan="3" id="o_address"><?php echo ($result['address']); ?></td>
            </tr>
            <tr>
                <td>现住址</td>
                <td colspan="3" id="o_now_address"><?php echo ($result['now_address']); ?></td>
            </tr>
            <tr>
                <td>紧急联系人姓名：</td>
                <td id="o_contact"><?php echo ($result['contract']); ?></td>
                <td>紧急联系人电话：</td>
                <td id="o_contact_tel"><?php echo ($result['contract_tel']); ?></td>
            </tr>
            <tr>
                <td class="rentalListTitle" colspan="4">租车详情(<span id="o_carname"><?php echo ($result['carname']); ?></span>)</td>
            </tr>
            <tr>
                <td>车牌号：</td>
                <td id="o_chepai"><?php echo ($result['car_chepai']); ?></td>
                <td>租金：</td>
                <td id="o_price"><?php echo ($result['order_price']); ?></td>
            </tr>
            <tr>
                <td>取车时间：</td>
                <td id="o_start_time"><?php echo (date("Y-m-d",$result['order_start'])); ?></td>
                <td>还车时间：</td>
                <td id="o_end_time"><?php echo (date("Y-m-d",$result['order_end'])); ?></td>
            </tr>
            <tr>
                <td>交强险：</td>
                <td id="o_jq"><?php echo ($result['jiaoqiang']); ?></td>
                <td>车损险：</td>
                <td id="o_cs"><?php echo ($result['chesun']); ?></td>
            </tr>
            <tr>
                <td>第三者责任险：</td>
                 <td id="o_dsz"><?php echo ($result['disanzhe']); ?></td>
                <td >不计免赔：</td>
                <td id="o_bjmp"><?php echo ($result['bujimianpei']); ?></td>
            </tr>
            <tr>
                <td>预授权押金:</td>
                <td id="o_yajin"><?php echo ($result['order_yajin']); ?></td>
                <td>超时租金:</td>
                <td id="o_chaoshi"><?php echo ($result['chaoshi']); ?></td>
            </tr>
             <tr>
                <td>租金合计：</td>
                <td id="o_price3"><?php echo ($result['heji_price']); ?></td>
                <td>实收租金合计：</td>
                <td id="o_price2"><?php echo ($result['shishou_price']); ?>元 (已优惠： <span id="o_yh"><?php echo ($result['order_youhui']); ?></span>元)</td>
            </tr>
            <tr>
                <td>当前油量：</td>
                <td id="o_youliang"><?php echo ($result["youliang"]); ?></td>
                <td>当前公里数：</td>
                <td id="o_gongli"><?php echo ($result["gongli"]); ?></td>
            </tr>
            </tbody>
        </table>
 <!--endprint-->
        
    </div>
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/plugins/jeditable/jquery.jeditable.js"></script>
    <script src="/public/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="/public/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    
    </body>
</html>