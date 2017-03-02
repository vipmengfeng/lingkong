<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>泊头民政局网站后台－mxwebv1.0</title>
<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/public/css/jquery.treeview.css">
<link rel="stylesheet" type="text/css" href="/public/css/background_web.css">
<script type="text/javascript" src="/public/js/jquery-1.9.1.min.js"></script>
<script src="/public/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/public/js/jquery.treeview.js" type="text/javascript"></script>
<script src="/public/js/bootstrap.js" type="text/javascript"></script>
<script src="/public/js/bootbox.min.js" type="text/javascript"></script>
 <!-- 配置文件 -->
    <script type="text/javascript" src="/public/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/public/ueditor/ueditor.all.js"></script>
<script type="text/javascript">
/*已注释 bootstrap.css 1068行*/
/*
 treeview 装载
*/
$(document).ready(function(){
 $('[data-toggle=tooltip]').tooltip();
 $("#browser").treeview({
  persist: "location",
  collapsed: true,
  unique: true
 });
});
/* treeview 结束 */
</script>
</head>
<body style="margin-left:142px; margin-top:0;">
<!--操作提示div-->
<div id="loading_tip" style="border:1px solid #B1AD18;display:none; text-align:center; background-color:#FC3;width:300px;height:20px;position:fixed;left:40%;top:50%;-moz-border-radius: .3em;-webkit-border-radius: .3em;box-shadow: 1px 1px 1px 1px #ccc; color:#666;">正在加载......</div>
<!--操作成功div-->
<div id="loading_success" style="border:1px solid #B1AD18;display:none; text-align:center; background-color:#ebf8a4;width:300px;height:40px;position:fixed;left:40%;top:50%;-moz-border-radius: .3em;-webkit-border-radius: .3em;box-shadow: 1px 1px 1px 1px #ccc; color:#666; line-height:40px;">删除成功</div>
<!--左侧菜单开始-->
<div id="pma_navigation" style="width:142px;">
	<ul id="browser" class="filetree treeview" style="margin-top:50px; margin-left:10px;">
	<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="collapsable"><div class="hitarea collapsable-hitarea"></div><span class="folder s_t" onclick="javascript:test_load('<?php echo ($vo["menu_en"]); ?>/index');"><?php echo ($vo["name"]); ?></span>
			<ul style="display: block;">
			<?php if(is_array($vo["ids"])): $k = 0; $__LIST__ = $vo["ids"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($k % 2 );++$k;?><li class="file"><span class="file s_t2" onclick=javascript:test_load2("<?php echo ($vo["menu_en"]); ?>/ic_b_browse?id=<?php echo ($voo["id"]); ?>"); ><?php echo ($voo["name"]); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
			
			</ul>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>
	
    
		
	</ul>
</div>
<!--左侧菜单结束-->
<div id="pma_navigation_resizer" style="left: 142px;"></div>
<div id="pma_navigation_collapser" title="隐藏导航面板" data-toggle="tooltip" data-placement="left"  style="left: 142px;">←</div>
<!--右侧区域开始-->
	<div id="mbx" style="">你的位置：<span id="n_t1">后台首页</span><span id="n_t2"></span><span id="n_t3">></span></div>

<div style="margin-top:22px;" id="main">
	
	  <!-- 加载编辑器的容器 -->
    <script id="container" name="content" type="text/plain">
        您可以在这里记录一些信息，比如我们的联系方式，如果您有需要并且忘记了我们的联系方式，在这里就可以找回，以便处理您网站的相关问题(该功能暂未开发)
    </script>
</div>
<div style="position:fixed; bottom:0px; right:0px; width:50px; height:22px; background-color:#92D65F;" title="本系统由石家庄迈迅网络科技有限公司开发 Mx-V1.0" data-toggle="tooltip" data-placement="left">退出</div>
<!--右侧区域结束-->
<script>
	
	function test_load(str){

		 $("#loading_tip").css("display","block")
    	 $("#main").load("/index.php/admin/"+str,function(){
         $("#loading_tip").css("display","none");
        });
	}
	function test_load2(str){

		 $("#loading_tip").css("display","block")
    	 $("#right_content").load("/index.php/admin/"+str,function(){
         $("#loading_tip").css("display","none");
        });
	}
</script>

    <!-- 实例化编辑器 -->
     <script type="text/javascript">
        var ue = UE.getEditor('container');


    </script>
    <script type="text/javascript">
 $('#myButton').on('click', function () {
    var $btn = $(this).button('loading')
   // $btn.button('reset')
  })
$('#pma_navigation_collapser').click(function(){
    if($('body').css("margin-left")=='142px'){
        $('#pma_navigation').css("width",'0');
        $('#pma_navigation_resizer').css("left",'0');
        $('#pma_navigation_collapser').css("left",'0');
        $('body').css("margin-left",'0');
        $('#pma_navigation_collapser').html("→");
        }else{
            $('body').css("margin-left",'142px');
            $('#pma_navigation').css("width",'142px');
            $('#pma_navigation_resizer').css("left",'142px');
            $('#pma_navigation_collapser').css("left",'142px');
            $('#pma_navigation_collapser').html("←");
            }
    });
$('#topmenu a').click(function(){
    //$(this).css("background","#fff");
    $(this).parent().css("background","#fff");
    $(this).parent().siblings().css("background","");
    })
$('.s_t').click(function(){
    $('#n_t1').html($(this).html());
    $('#n_t2').html("");
    $('#n_t3').html("");
    })
$('.s_t2').click(function(){
    $('#n_t2').html(">"+$(this).html());
    $('#n_t3').html("");
    })
$('.s_t3').click(function(){
    $('#n_t3').html(">"+$(this).text());
    });
</script>
</body>
</html>