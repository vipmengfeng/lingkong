<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>泊头民政局</title>
    <link rel="stylesheet" href="/public/web/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/web/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/public/web/css/style.css">
    <link rel="stylesheet" href="/public/web/css/index.css">
</head>
<body>
<!-- 页头 -->
<div class="header">
    <div class="header1">
        <div class="header1Body">
            <a class="header1Left" href="http://www.mca.gov.cn/" target="_blank">民政部</a>
            <a class="header1Right" href="http://www.hebmz.gov.cn/" target="_blank">河北省民政厅</a>
        </div>
    </div>
        <div class="header2"></div>
        <div class="header3">
            <ul class="header3Body">
                <li><a href="/index.php/home/index">首页</a></li>
            <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/lists?id=<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
               
            </ul>
        </div>
        <div class="header4">
            <div class="header4Body">
                <div class="weather">
                    <iframe width="450" scrolling="no" height="" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=1&icon=2&py=botou&wind=1&num=1"></iframe></iframe>
                </div>
                <div class="seachInput">
                    <form action="" method="">
                    <span><input type="text" placeholder="请输入关键字"></span>
                    <span><button type="submit"></button></span>
                    </form>
                </div>
            </div>
        </div>
</div>
   <link rel="stylesheet" href="/public/web/css/newsPage.css">
<div class="middle">
    <div class="middleLeft">
        <h5><?php echo ($name_3); ?></h5>
        <ul>
        <?php if(is_array($tj_3)): $i = 0; $__LIST__ = $tj_3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/show?id=<?php echo ($vo["id"]); ?>"><?php echo (mb_substr($vo["titles"],0,12,'utf-8')); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            
        </ul>
    </div>
    <div class="middleRight">
        <h5>
            <ul>
                <li>当前位置：</li>
                <li><a href="##">首页 &gt;</a></li>
                <li><a href="##">{} &gt;</a></li>
                <li><a class="navActive"><?php echo ($titles); ?></a></li>
            </ul>
        </h5>
        <?php echo (htmlspecialchars_decode($content)); ?>
    </div>
</div>
<!-- 页脚 -->
<div class="footer">
    <ul>
    <li><a href="/index.php">首页</a></li>
     <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php/home/index/lists"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <p><span>主办单位：泊头县民政局</span><span>技术支持:石家庄迈讯网络科技有限公司</span></p>
    <p></p>
</div>
<script type="text/javascript" src="/public/web/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="/public/web/js/bootstrap.min.js"></script>
</body>
</html>