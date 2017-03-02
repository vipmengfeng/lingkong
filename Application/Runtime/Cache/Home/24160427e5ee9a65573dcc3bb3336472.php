<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="/public/css/bootstrap-datetimepicker.min.css">
</head>
<body>
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
<input type="text" class="form-control " name="datetimepicker" id="datetimepicker" required="">

<script>
    $(document).ready(function(){
    var myDate=new Date();
    $('#datetimepicker').datetimepicker({
    format: 'yyyy-mm-dd hh:ii'
})
    })
</script>
</body>
</html>