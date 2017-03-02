// JavaScript Document
//根据class 设置宽高 最大2500px，超过该值则设置失效
function set_wh(){
	for(i=1;i<2500;i++){
		//宽
		if($(".mx_w"+i)!=="undefined"){
			$(".mx_w"+i).css("width",i+"px");
		}
		//高
		if($(".mx_h"+i)!=="undefined"){
			$(".mx_h"+i).css("height",i+"px");
			$(".mx_h"+i).css("line-height",i+"px");
		}
		
		}
	}
