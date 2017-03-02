<?php if (!defined('THINK_PATH')) exit();?><!--操作失败提示div-->
<div id="loading_err" style=" display:none; padding:10px;width:95%; border:1px solid #900; background-color:#FFACAC;-webkit-border-radius: 5px;border-radius: 5px;
"></div>
<table border="0" cellspacing="0" cellpadding="0" style="margin-left:10px; margin-top:10px;" id="load_data">
 <tbody>
            <thead>
  <tr>
   <th>操作区域</th>
    <th>排序</th>
    <th>ID</th>
    <th>标题</th>
    <th></th>
    
  </tr>
  <?php if(is_array($r_a)): $i = 0; $__LIST__ = $r_a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "0"): ?></tr><tr style="background-color:#DFDFDF;"><?php endif; ?>  
    <td>
    <input name="" type="checkbox" value="">
    <a href="javascript:data_edit('<?php echo ($vo["id"]); ?>');">
    	<img src='/public/images/dot.gif' title='' alt='' class='icon ic_b_edit'>编辑
    </a>
    <a href="javascript:data_remove('<?php echo ($vo["id"]); ?>')">
    	<img src='/public/images/dot.gif' title='' alt='' class='icon ic_b_drop'>删除
    </a> 
    
    </td>
    <td><?php echo ($vo["id"]); ?></td>
    <td><?php echo ($vo["id"]); ?></td>
    <td><?php echo ($vo["titles"]); ?></td>
    <td><span id="ld"></span></td>

  </tr><?php endforeach; endif; else: echo "" ;endif; ?>

  </thead>
  </tbody>
</table>
<script type="text/javascript">
//ajax删除数据
function data_remove(id){
  bootbox.setLocale("zh_CN");
  bootbox.confirm("确定要删除这条数据吗?",function(result){
    if(result){
      $("#loading_tip").css("display","block");
      $.get("/index.php/admin/about/ic_b_drop2?id="+id,function(data,status){
        if(data['status']==1){
       success();
      
        }else{
         err('删除失败，请检查!');
        }
       });
     }
  });
  }
//edit data
function data_edit(id){
     $('#right_content').load("/index.php/admin/<?php echo ($module); ?>/ic_b_edit?id="+id);
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