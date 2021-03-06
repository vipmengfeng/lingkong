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
<form action="/index.php/home/setting/set_config" method="post">
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="ibox-content">
                车辆租金配置：
            </div>
            <div class="ibox-content">
                <div class="row">
                 <div class="col-md-1">租金含保险</div>
                 <div class="col-sm-2">
                     
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" checked="" value="c" id="optionsRadios1" name="baoxian">含</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="nc" id="optionsRadios2" name="baoxian">不含</label>
                                    </div>
                                </div>
                 
                 <div class="col-sm-6">若勾选不含保险，请选择所需要配置的保险项目，不勾选则该项保险费用为0元/天</div>
                 <div class="col-sm-3"></div>
                </div>
            
             </div>
             <div class="ibox-content">
                <div class="row">
                    <div class="col-md-1">项目：</div>
                    <div class="col-md-11">

                                <div class="col-sm-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="jiaoqiang" name="price" id="inlineCheckbox1">交强险</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="disanzhe" name="price" id="inlineCheckbox2">第三者责任险</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="bujimianpei" name="price" id="inlineCheckbox3">不计免赔</label>
                                        <label class="checkbox-inline">
                                        <input type="checkbox" value="chesun" name="price" id="inlineCheckbox1">车损险</label>
                                </div>
                    </div>

                </div>
             </div>

             <div class="ibox-content">
                <div class="row">
                    <div class="col-md-1">租金：</div>
                    <div class="col-md-11">

                                <div class="col-sm-12">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="week_p" name="price" id="inlineCheckbox1">周租</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="month_p" name="price" id="inlineCheckbox2">月租</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="reason_p" name="price" id="inlineCheckbox3">季租</label>
                                        <label class="checkbox-inline">
                                        <input type="checkbox" value="half_p" name="price" id="inlineCheckbox3">半年租</label>
                                        <label class="checkbox-inline">
                                        <input type="checkbox" value="year_p" name="price" id="inlineCheckbox3">年租</label>
                                </div>
                    </div>

                </div>
             </div>

             <div class="ibox-content">
                <div class="row">
                    <div class="col-md-1">油差：</div>
                     <div class="col-sm-2">
                     
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" checked="" value="c_yc" id="optionsRadios1_1" name="yc">含</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="nc_yc" id="optionsRadios2_2" name="yc">不含</label>
                                    </div>
                     </div>

                     <div class="col-sm-2">
                     
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" checked="" value="dtsb" id="optionsRadios1_1" name="yb">多退少补</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="dtsbb" id="optionsRadios2_2" name="yb">多不退少补</label>
                                    </div>
                     </div>

                </div>
                </div>
                <div class="ibox-content">
                <div class="row">
                    <div class="col-md-1">公里差：</div>
                     <div class="col-sm-2">
                     
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" checked="" value="c_gc" id="optionsRadios1_1" name="gc">含</label>
                                    </div>
                                    <div class="radio-inline">
                                        <label>
                                            <input type="radio" value="nc_gc" id="optionsRadios2_2" name="gc">不含</label>
                                    </div>
                                </div>

                </div>
             </div>
             <div class="ibox-content">
                 <button class="btn btn-primary" type="button" onclick="save(<?php echo ($userid); ?>)">保存</button>
             </div>
        </div>

    </div>
    <script src="/public/js/jquery.min.js?v=2.1.4"></script>
    <script src="/public/js/bootstrap.min.js?v=3.3.5"></script>
    <script src="/public/js/content.min.js?v=1.0.0"></script>
    </form>

    <script type="text/javascript">
        function save(id){
            var checkprice= '';
            var checkbaoxian='';
             $('input[name="price"]:checked').each(function(){checkprice += $(this).val()+","})
            checkprice = checkprice.substring(0,checkprice.length-1);
           
           var baoxian=$('input[name="baoxian"]:checked').val();
           var yc=$('input[name="yc"]:checked').val();
           var yb=$('input[name="yb"]:checked').val();
           var gc=$('input[name="gc"]:checked').val();
          
            $.ajax({
                url: '/index.php/home/setting/set_config',
                type: 'POST',
                dataType: 'json',
                data: {
                    userid: id,
                    baoxian:baoxian,
                    yc:yc,
                    yb:yb,
                    gc:gc,
                    checkprice:checkprice


                },
            })
            .success(function(data) {
                alert(data.info);
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