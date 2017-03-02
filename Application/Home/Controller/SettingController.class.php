<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class SettingController extends CommonController {
	//
	public $Err_tip="用户错误，请登录后尝试!";
	public $Success_tip="操作成功!";
	public function set(){
		$this->assign('userid',session('uid')); 
		$this->display("/setting");
	}
	public function set_config(){
		 $userid=I("userid");
         $baoxian=I("baoxian");
         $yc=I("yc");
         $yb=I("yb");
         $gc=I("gc");
         $checkprice=I("checkprice");
         if($userid==""){
         	$this->Err_message();
         }else{
         	
         	$user_model=M("user_c");
         	$where['id']=$userid;
         	$userResult=$user_model->where($where)->find();
         	if(empty($userResult)){
         		$this->Err_message();
         	}else{
         		if(strpos($checkprice,'week_p')!==false){
         			$data_c['week_price']="1";
         		}else{
         			$data_c['week_price']="0";
         		}
         		if(strpos($checkprice,'month_p')!==false){
         			$data_c['month_price']="1";
         		}else{
         			$data_c['month_price']="0";
         		}

         		if(strpos($checkprice,'reason_p')!==false){
         			$data_c['reasen_price']="1";
         		}else{
         			$data_c['reasen_price']="0";
         		}
         		if(strpos($checkprice,'half_p')!==false){
         			$data_c['half_year_price']="1";
         		}else{
         			$data_c['half_year_price']="0";
         		}
         		if(strpos($checkprice,'year_p')!==false){
         			$data_c['year_price']="1";
         		}else{
         			$data_c['year_price']="0";
         		}
         		$setting_model=M("setting");
         		$where_c['userid']=$userid;
         		//$setting_model->where($where_c)->find();
         		
         		$setting_model->where($where_c)->save($data_c);
         		$this->Success_message();
         	}
         	
         }

	}
	private function Err_message(){
		$data['info']=$this->Err_tip;
		$this->ajaxReturn($data);
	}
	private function Success_message(){
		$data['info']=$this->Success_tip;
        $this->ajaxReturn($data);
	}
	
}
?>