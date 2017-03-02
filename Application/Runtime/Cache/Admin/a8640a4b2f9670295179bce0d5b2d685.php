<?php if (!defined('THINK_PATH')) exit();?><!--操作失败提示div-->
<div id="loading_err" style=" display:none; padding:10px;width:95%; border:1px solid #900; background-color:#FFACAC;-webkit-border-radius: 5px;border-radius: 5px;
"></div>
<script type="text/javascript" src="/public/js/jquery.form.js"></script>
<div id="result" class="mx_success_tips mx_tips"></div>
<div id="result_err" class="mx_err_tips mx_tips"></div>
<form name="form1" id="form1" action="/index.php/admin/index/setting_d" method="post" accept-charset="utf-8">
	<input type="hidden" name="parent_id" id="parent_id" value="<?php echo ($id); ?>">
	<input type="text" name="name" id="name">  <span id="name_tips" class="bg-danger text-danger mx_tips"></span>
	<input type="submit" id="submits" value="新增">
</form>

<table border="0" cellspacing="0" cellpadding="0" style="margin-left:10px; margin-top:10px;" id="load_data">
 <tbody>
            <thead>
  <tr>
   <th>操作区域</th>
    <th>ID</th>
    <th>排序</th>
    <th>名称</th>
    
    
  </tr>
  <?php if(is_array($r_a)): $i = 0; $__LIST__ = $r_a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?></tr><tr style="background-color:#DFDFDF;"><?php endif; ?>  
    <td>
    <input name="" type="checkbox" value="">
    <a href="javascript:data_edit('<?php echo ($vo["id"]); ?>')">
    	<img src='/public/images/dot.gif' title='' alt='' class='icon ic_b_edit'>编辑
    </a>
    <a href="javascript:data_remove('<?php echo ($vo["id"]); ?>')">
    	<img src='/public/images/dot.gif' title='' alt='' class='icon ic_b_drop'>删除
    </a> 
    	
    </td>
    <td><?php echo ($vo["id"]); ?></td>
    <td><?php echo ($vo["id"]); ?></td>
    <td><a href=javascript:test_load2("<?php echo ($module_name); ?>/ic_b_browse?id=<?php echo ($vo["id"]); ?>")><?php echo ($vo["name"]); ?></a></td>
   
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

  </thead>
  </tbody>
</table>

<script type="text/javascript">
//data_edit
function data_edit(){
	alert('尚未完善编辑功能.');
	
}
//ajax删除数据
function data_remove(id){
	bootbox.setLocale("zh_CN");
	bootbox.confirm("确定要删除这条数据吗?",function(result){
		if(result){
			$("#loading_tip").css("display","block");
			$.get("/index.php/admin/<?php echo ($module_name); ?>/ic_b_drop?id="+id,function(data,status){
	  		if(data['status']==1){
		 	 success();
			 mx_load2('<?php echo ($module_name); ?>/menu_setting');
		  	}else{
				 err('删除失败，请检查');
				 mx_load2('<?php echo ($module_name); ?>/menu_setting');
			  }
 			 });
		 }
	});
	}
//操作成功提示div
function success(){
			$("#loading_tip").css("display","none");
		    $("#loading").css("display","block");
		    $("#loading_err").css("display","none");
			$("#loading_success").css("display","block");
			$("#loading_success").fadeOut(7000);
	}
//操作失败提示div
function err(err_message){
	 		 $("#loading").css("display","none");
			 $("#loading_err").css("display","block");
			 $("#loading_tip").css("display","none");
			 $("#loading_err").html(err_message);
			 
	}
</script>
<script type="text/javascript">
$(function(){
    $('#form1').ajaxForm({
        beforeSubmit:  checkForm,  // 表单提交执行前检测
        success:       complete,  // 表单提交后执行函数
        dataType: 'json'
    });
    function checkForm(){
        if( '' == $.trim($('#name').val())){
            $('#name_tips').html('此处不能为空！').show();
			$("#name_tips").html();
            $('#username').focus();
            return false;
        }else{
			$("#name_tips").fadeOut('fast');
			}
		$("#loading_tip").css("display","block");
		 $('#result').css("display","none");
		 $('#submits').val("......");
        // 可以在此添加其它判断
    }
	function complete(data){
        if(data.status==1){
			$("#loading_tip").css("display","none");
            $('#result').html("<img src='/public/images/dot.gif' title='' alt='' class='icon ic_s_success'>"+data.res_tip).show();
			 $('#result_err').css("display","none");

        }else{
			$("#loading_tip").css("display","none");
            $('#result_err').html(data.res_tip).show();
			//$("#result").fadeOut(4000);
        }
         $('#submits').val("新增");
         mx_load2('<?php echo ($module_name); ?>/menu_setting');
    }
})
</script>