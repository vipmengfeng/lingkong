<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="/public/js/jquery.form.js"></script>
<script src="/public/js/uploadify/jquery.uploadify.js"></script>
<link href="/public/js/uploadify/uploadify.css" type="text/css" rel="stylesheet" />

<div id="form_div" class="form_div">
<form id="form1" name="form1" method="post" action="/index.php/admin/<?php echo ($module); ?>/ic_b_insrow">
<div style="height: 10px;width: 10px;">
	
</div>
<select name="cate" id="cate">
	<option value="">请选择类别</option>
	<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	option
</select><span id="user_perm_tips" class="bg-danger text-danger mx_tips"></span>
<div style="height: 20px;width: 10px;">
	
</div>
 <div id="imgs" style="margin-bottom: 20px;"></div>
 <input id="img_url" name="img_url" type="hidden">
		<input id="file_upload" name="file_upload" type="file" multiple="true" style="width: 30px; height: 14px;"> （该处为封面图片，为可选内容，如果不涉及封面图，可以不进行添加，内容中涉及的图片请在下面内容编辑器中上传，并且进行图文混排）
<div style="height: 20px;width: 10px;">
	
</div>
<input type="text" id="titles" name="titles" value="" placeholder="在这里写入标题" width="80%" style="width: 700px;"><span id="name_tips" class="bg-danger text-danger mx_tips"></span>
<div style="height: 20px;width: 10px;">
	
</div>
<style type="text/css" media="screen">
	#container{width: 790px;}
</style>
<script id="container" name="content" type="text/plain">
       在这里写入内容，可以使用模版混排图文哦
    </script>
<script type="text/javascript">
        var editor = new UE.ui.Editor();
    editor.render("container");
</script>
<div style="height: 20px;width: 400px;">
	 
</div>

<input type="submit" name="button" id="button" class="btn btn-default" value="提交内容"> 
</form>
</div>
<div id="result" class="mx_success_tips mx_tips"></div>
<div id="result_err" class="mx_err_tips mx_tips"></div>
<script type="text/javascript">
$(function(){
    $('#form1').ajaxForm({
        beforeSubmit:  checkForm,  // 表单提交执行前检测
        success:       complete,  // 表单提交后执行函数
        dataType: 'json'
    });
    function checkForm(){
    	if( '' == $.trim($('#cate').val())){
            $('#user_perm_tips').html('请选择类别！').show();
			$("#user_perm_tips").html();
            $('#cate').focus();
            return false;
        }else{
			$("#user_perm_tips").fadeOut('fast');
			}
        if( '' == $.trim($('#titles').val())){	
        	$('#name_tips').html('标题不能为空！').show();
			$("#name_tips").html();
            $('#username').focus();
            return false;
        }else{
			$("#name_tips").fadeOut('fast');
			}
		 
		$("#loading_tip").css("display","block");

        // 可以在此添加其它判断
    }
	function complete(data){
		
        if(data.status==1){
			$("#loading_tip").css("display","none");
			$("#form_div").css("display","none");
            $('#result').html("<img src='/public/images/dot.gif' title='' alt='' class='icon ic_s_success'>"+data.res_tip).show();
			 $('#result_err').css("display","none");
        }else{
			$("#loading_tip").css("display","none");
            $('#result_err').html(data.res_tip).show();
			//$("#result").fadeOut(4000);
        }
    }
});

</script>
<script type="text/javascript">
		
		$(function() {
			$('#file_upload').uploadify({
				'swf'      : '/public/js/uploadify/uploadify.swf',
				'uploader' : '/index.php/admin/index/upload',
				 'onUploadSuccess' : function(file, data, response) {
	        	 //把所有上传的图片都放入DIV中
	        	 img = "<img width='200px' src='/public/Uploads/"+data+"'>";
	            $('#imgs').html(img);
	            $('#img_url').val('/public/Uploads/'+data);
        	}
			});
		});
	</script>