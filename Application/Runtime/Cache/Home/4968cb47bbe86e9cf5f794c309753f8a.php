<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>灵控汽车租赁管理系统</title>

<link href="/public/images/all.css" type="text/css" rel="stylesheet" media="all" />
<!--[if ie]><link rel="stylesheet" type="text/css" href="/public/images/index_ie.css"  media="all" /><![endif]-->
<script type="text/javascript" src="/public/js/jquery-1.8.2.min.js" ></script>
</head>

<body>

<header>
<div class="head">
	<div class="wrapper">
        <div class="logo"><!--这里插入Img标签大小188*60px--></div>
        <div class="menu">
            <a href="" id="menu1">产品中心</a>
            <span>|</span>
            <a href="" id="menu2">在线客服</a>
            <span>|</span>
            <a href="/index.php/home/display/register" id="menu3">注册试用</a>
            <span>|</span>
            
        </div>
    </div>
</div>
</header>


<div class="banner_area" id="banner_list">
  	<div class="main_box">
    	<div class="main_cont">
        	<div class="wrapper">
             <form class="m-t" role="form" action="/index.php/home/index/login" method="post">
            <dl class="xl_info clearfix">
                <dt class="hide">登录</dt>
                <dd><input type="text" name="username" class="srh"></dd>
                <dd><input type="password" name="password" class="srh"></dd>
                <dd><input class="button white radius4 dl" type="submit" value="登录" /></dd>
                <dd><input class="button blue radius4 shenqing" type="button" value="立即申请" /><input class="button blue radius4 lj" type="button" value="咨询了解" /></dd>
            </dl>
            
            </form>
    		</div>
            <div class="bg"></div>
		</div>

    </div>
  	<div class="banner_box banner_ui on on_delay">
    	<div class="banner_cont">
        	<div class="area">
                <p class="ban1_anim_txt">精心打造，简而未减</p>
                <div class="ban1_anim_bg"></div>
            </div>
        </div>
    </div>
    <div class="banner_box banner_logo">
    	<div class="banner_cont">
        	<div class="area">
                <p class="ban2_anim_txt">动态皮肤，随心随身</p>
                <div class="ban2_anim_bg_logo"></div>
                <div class="ban2_anim_bg_line"></div>
                <div class="ban2_icon_1"><span></span></div>
                <div class="ban2_icon_2"><span class="s1"></span><span class="s2"></span></div>
                <div class="ban2_icon_3"><span></span></div>
            </div>
        </div>
    </div>
    <div class="banner_box banner_lighting">
    	<div class="banner_cont">
        	<div class="area">
            	<div class="ban3_act_bg"></div>
                <div class="ban3_mask"></div>
                <p class="ban3_anim_txt png">极速体验，快如闪电</p>
                <div class="ban3_anim_bg_lightning"></div>
                <div class="ban3_anim_bg_boom"></div>
                <div class="ban3_anim_bg_boom_icon_l"></div>
                <div class="ban3_anim_bg_boom_icon_r"></div>
            </div>
        </div>
    </div>
  </div>
 <div class="status" id="status">
  	<span class="on"></span>
    <span></span>
    <span></span>
  </div> 
  
  
  <div class="index-bottom">
  
  	<div class="fg-line"><b></b><span>特色功能介绍</span><b></b></div>
    
    <div class="clearfix part">
        <div class="text fl">
            <div class="title">
            	<span class="fl">01</span>
                <p>管理灵活</p>
                <p class="small">Manange Easily</p>
            </div>
            <p class="nr">汽车管理，用户管理，订单管理</p>
        </div>
        <div class="pic fr">
        	<img src="/public/images/info.jpg" >
        </div>
    </div>
    
	<!--------------------------------------分割线-------------------------------------->    
   
    
	
    

  </div>
  
<footer>
<div class="foot">
	<p>合作客户</p>
    <p class="font14"><a href="">开一开汽车租赁</a></p>
</div>
</footer>
<script src="/public/js/all.js"  type="text/javascript"></script>
</body>
</html>