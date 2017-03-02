<?php if (!defined('THINK_PATH')) exit();?><div style="padding-right:1em; position:fixed;height:30px; top:22px; width:100%;background: -webkit-linear-gradient(top, #ffffff, #dcdcdc);border-top: 1px solid #aaa;">
    	<!--右侧菜单开始-->
    	<ul id="topmenu" class="resizable-menu">
        <!--循环此处，判断权限-->
        <?php if(is_array($right_menu)): $i = 0; $__LIST__ = $right_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            	<a class="tab s_t3" href="javascript:mx_load2('<?php echo ($menu_en); ?>/<?php echo ($key); ?>');" title="<?php echo ($vo); ?>"  ><img src="/public/images/dot.gif" class="icon <?php echo ($key); ?>" /><?php echo ($vo); ?></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--循环结束-->
        </ul>
        <!--右侧菜单结束-->
    </div>

	<div id="right_content" style="margin-left:10px; width:99%; margin-top:60px;">
  
    </div>
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
function mx_load(str){
    $("#loading_tip").css("display","block")
    $("#right_content").load("/index.php/admin/index/"+str,function(){
        
        $("#loading_tip").css("display","none");
        });
    }
function mx_load2(str){
    $("#loading_tip").css("display","block")
    $("#right_content").load("/index.php/admin/"+str,function(){
        
        $("#loading_tip").css("display","none");
        });
    }
</script>