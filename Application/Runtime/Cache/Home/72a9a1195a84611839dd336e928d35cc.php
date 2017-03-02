<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>订单列表</title>
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
                        <h5>订单列表</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="table_data_tables.html#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="table_data_tables.html#">选项1</a>
                                </li>
                                <li><a href="table_data_tables.html#">选项2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>状态</th>
                                    <th>编号</th>
                                    <th>客户</th>
                                    <th>车辆</th>
                                    <th>车牌号</th>
                                    <th>租车时间</th>
                                    <th>还车时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($order_list)): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="gradeX" id="d<?php echo ($vo["id"]); ?>">
                                    <td id="order_status<?php echo ($vo["id"]); ?>"><?php echo ($vo["order_status"]); ?></td>
                                    <td><?php echo ($vo["order_sn"]); ?></td>
                                    <td><?php echo ($vo["customer_name"]); ?></td>
                                    <td><?php echo ($vo["car_name"]); ?></td>
                                    <td><?php echo ($vo["car_chepai"]); ?></td>
                                    <td><?php echo (date("y-m-d",$vo["order_start"])); ?></td>
                                    <td class="center"><?php echo (date("y-m-d",$vo["order_end"])); ?></td>
                                    <td class="center">
                                    
                                    <button type="button" class="btn btn-white btn-xs" onclick='delete_o("<?php echo ($vo["id"]); ?>")'>删除</button>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>状态</th>
                                    <th>编号</th>
                                    <th>客户</th>
                                    <th>车辆</th>
                                    <th>车牌号</th>
                                    <th>租车时间</th>
                                    <th>还车时间</th>
                                    <th>操作</th>
                                </tr>
                            </tfoot>
                        </table>

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
      function open_detail(id){
            layer.open({
              type: 2,
              offset: '10px',
              title:"订单详情",
              area: ['1260px', '700px'],
              //skin: 'layui-layer-rim', //加上边框
              content: ['/index.php/home/order/order_detail?id='+id, 'no']
            });

            $(".layui-layer-title").css(
                'background-color', '#1c84c6'
                
            );
            $(".layui-layer-title").css(
                'color', '#fff'
                
            );
        }


        function pay(id){
            $.ajax({
                url: '/index.php/home/order/pay?id='+id,
                type: 'POST',
                dataType: 'text',
                data: {id: id},
            })
            .done(function() {
                $("#order_status"+id).html("已支付");
                $("#order_pay_button"+id).attr({
                    disabled: 'disabled'
                });
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            

        }

         function delete_o(id){
          
            $.ajax({
                url: '/index.php/home/order/delete?id='+id,
                type: 'POST',
                dataType: 'text',
                data: {id: id},
            })
            .success(function() {
                $('#d'+id).remove();
                console.log("success");
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            

        }

        function jiesuan(id){
            layer.open({
              type: 2,
              offset: '10px',
              title:"订单结算",
              area: ['1260px', '700px'],
              //skin: 'layui-layer-rim', //加上边框
              content: ['/index.php/home/order/order_jiesuan?id='+id, 'no']
            });

            $(".layui-layer-title").css(
                'background-color', '#1c84c6'
                
            );
            $(".layui-layer-title").css(
                'color', '#fff'
                
            );

        }
    </script>
    
    </body>
</html>