<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class CarController extends CommonController {
	public function car_search_ajax(){
    	$Model=$this->get_cars_model();
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        //$where['userid']=array('in',"$uid");
        //$where['is_delete']=0;
        

        $result=$Model->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            //$result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $res['message']='';
        $res['value']=$result;
        $res['code']=200;
        $res['redirect']='';
        $this->ajaxReturn($res);
    }
    //车辆维保
    public function wb(){
        echo "车辆维保";
    }
    public function get_car_detail(){
    	$id=I("id");
        $Model=$this->get_cars_model();
        $where=array();
        $data['is_delete']=1;
        $result=$Model->where("id='$id'")->find();
        if(!empty($result)){
            echo "<div class='footable-row-detail-row'><div class='footable-row-detail-name'>品牌:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["brand"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>车系：</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["name"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>气囊:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["qinang"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>座椅:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["zuoyi"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>油箱:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["youxiang"]."</span></div><div class='footable-row-detail-name'>油格:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["youxiang_2"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>天窗:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["tianchuan"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>驱动:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["qudong"]."</span></div><div class='footable-row-detail-name'></div></div><div class='footable-row-detail-row'><div class='footable-row-detail-name'>发动机:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["fadongji"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>燃油编号：</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["ranyou"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>车门:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["chemen"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>座位:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["zuowei"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>结构:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["jiegou"]."</span></div><div class='footable-row-detail-name'></div><div class='footable-row-detail-name'>级别:</div><div class='footable-row-detail-value'><span style='color: blue'>".$result["jibie"]."</span></div><div class'footable-row-detail-name'></div></div>";
        }else{
            echo 0;
        }
    }

    /*
        *描述：车辆新增
        *
    */
    public function add_car(){
    	if(IS_POST){
    	if($this->get_cars_num()>=$this->get_cars_level()){
    		$res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
    	}else{
    		$Model=$this->get_cars_c_model();
            $data = $Model->create($_POST);
            $uid=$this->get_user_id();
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $data['xubao_date']=strtotime(I('xubao_date'));
            $data['buy_date']=strtotime(I('buy_date'));
            $data['baoyang_date']=strtotime(I('baoyang_date'));
            //$data['blacklist']=0;
            $Model->add($data);
    		$res_arr=array("","res_tip"=>"新增完成","status"=>1);
    	}
    	$this->ajaxReturn($res_arr);
    	}else{
    	$this->assignMod();
    	$this->assignMod();
    	$this->display("/add_car");
    	}
	}
    /*
        *描述：车辆列表
        *
    */
    public function list_car(){
    	$this->assignMod();
    	$this->display("/cars_manager");
    }
    public function cars_list(){
    	$status=I("status");

    	$Model_CUSTOMER_O=M("cars_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        if($status==1){
        	$where['status']='待租';
        }else if($status==2){
        	$where['status']='在租';
        }else if($status==3){
        	$where['status']='维修/保养';
        }
        $where['is_delete']=0;
        //$where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $this->ajaxReturn($result);
    }
    public function edit_car(){
    	
    }
    /*
        *描述：车辆删除
        *
    */
    public function del_car(){
    	$id=I("id");
        $Model_CUSTOMER_C=M("cars_c");
        $where=array();
        $data['is_delete']=1;
        $result=$Model_CUSTOMER_C->where("id='$id'")->save($data);
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
    public function testA(){
        echo "this is car controller testA menthod";
    }
    /*
        *描述：车辆价格设定
        *
    */
    public function add_car_price(){
    	
    }
    public function view_car(){
    	$id=I("id");
        $Model=M('cars_c');
        $where=array();
        //$result=$Model->where("id=$id")->find();
        $result = M('cars_c as a')->join('cars as b on b.id = a.cars_id')->where("a.id ='$id'")->find();
        $this->assign('nickname',$result['nickname']);
        $this->assign('chepai',$result['chepai']);
        $this->assign('status',$result['status']);
        $this->assign('addtime',$result['addtime']);
        $this->assign('gongli',$result['gongli']);
        $this->assign('youliang',$result['youliang']);
        $this->assign('chepai',$result['chepai']);
        $this->assign('id',$id);
        //基本信息
        $this->assign('name',$result['name']);
        $this->assign('brand',$result['brand']);
        $this->assign('qinang',$result['qinang']);
        $this->assign('zuoyi',$result['zuoyi']);
        $this->assign('youxiang',$result['youxiang']);
        $this->assign('tianchuang',$result['tianchuan']);
        $this->assign('fadongji',$result['fadongji']);
        $this->assign('ranyou',$result['ranyou']);
        $this->assign('chemen',$result['chemen']);
        $this->assign('zuowei',$result['zuowei']);
        $this->assign('jiegou',$result['jiegou']);
        $this->assign('qudong',$result['qudong']);
        $this->assign('jibie',$result['jibie']);
        $this->assign('xubao_date',$result['xubao_date']);
        $this->assign('baoyang_date',$result['baoyang_date']);
        $this->assign('buy_date',$result['buy_date']);
        $yiguo_st=time()-$result['xubao_date'];
        $yiguo=ceil(($yiguo_st/3600)/24);
        $shengyu=365-$yiguo;
        $this->assign('yiguo',$yiguo);
        $this->assign('shengyu',$shengyu);
        //$percent_xubao=(ceil(($yiguo/365)*10))*1000;

        $percent_xubao=90;
        $this->assign('percent_xubao',$percent_xubao);
        
        //租金相关
        $this->assign('yajin',$this->num_format($result['yajin']));
        $this->assign('price',$this->num_format($result['price']));
        $this->assign('week_price',$this->num_format($result['week_price']));
        $this->assign('month_price',$this->num_format($result['month_price']));
        $this->assign('half_price',$this->num_format($result['half_price']));
        $this->assign('reason_price',$this->num_format($result['reason_price']));
        $this->assign('year_price',$this->num_format($result['year_price']));
        $this->assign('bujimianpei',$result['bujimianpei']);
        $this->assign('disanzhe',$result['disanzhe']);
        $this->assign('jiaoqiang',$result['jiaoqiang']);
        $this->assign('chesun',$result['chesun']);
        $this->assign('chaoshi',$result['chaoshi']);
    	$this->assignMod();
    	$this->display("/car_detail");
    }
}