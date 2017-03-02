<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class CustomerController extends CommonController {
	/*

    *客户列表模板
    */
    public function customer_list(){

        $this->assignMod();
        $this->display("/clients");
    }
    /*
    *个人客户列表json数据
    */
    public function customer_list_ajax(){
        $Model_CUSTOMER_C=M("customer_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        $result=$Model_CUSTOMER_C->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $this->ajaxReturn($result,$info,$status,$type);
    }
    /*
    *企业客户列表json数据
    */
    public function customer_list_ajax_org(){
        $Model_CUSTOMER_O=M("customer_o");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $this->ajaxReturn($result);
    }
    public function customer_search_ajax(){
        $Model_CUSTOMER_O=M("customer_c");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $res['message']='';
        $res['value']=$result;
        $res['code']=200;
        $res['redirect']='';
        $this->ajaxReturn($res);
    }
    public function test(){
        $this->display("/test");
    }
    public function customer_search_ajax_org(){
        $Model_CUSTOMER_O=M("customer_o");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        

        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();
        for ($i=0; $i < count($result); $i++) {
            //$result[$i]['user_perm']=$this->get_user_roles($result[$i]['user_perm']);//角色转换为中文显示
            $result[$i]['addtime']=date('Y-m-d H:i',$result[$i]['addtime']);
            $result[$i]['count_c']=count($result);
        }
        $res['message']='';
        $res['value']=$result;
        $res['code']=200;
        $res['redirect']='';
        $this->ajaxReturn($res);
    }

    public function test_ajax(){
        $Model_CUSTOMER_O=M("customer_o");
        $uid=$this->get_user_id();
        //$where=array('parent'=>'0','parent'=>$uid,'_logic'=>'OR');
        $where['userid']=array('in',"$uid");
        $where['is_delete']=0;
        $result=$Model_CUSTOMER_O->where($where)->order("id desc")->select();

        $res['message']="";
        $res['value']=$result;
         $this->ajaxReturn($res);
    }
    /*
        *描述：个人客户新增
        *
        *
    */
    public function add_customer(){
        if(IS_POST){
        if($this->get_customers_num()>=$this->get_customer_level()){
            $res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
        }else{
            $Model_CUSTOMER_C=M("customer_c");
            $data = $Model_CUSTOMER_C->create($_POST);
            $uid=$this->get_user_id();
            $data['id']=MD5(time()+rand(0,10000));
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $data['blacklist']=0;
            $res=$Model_CUSTOMER_C->add($data);
           
            if($res){
                $res_arr=array("","res_tip"=>"新增完成","status"=>1);
            }else{
                $res_arr=array("","res_tip"=>"新增失败","status"=>0);
            }
        }
        $this->ajaxReturn($res_arr);
        }else{
            $this->assignMod();
            $this->display("/add_customer");
        }
    }
    /*
    *个人客户详细ajax
    */
    public function customer_detail_ajax(){
        $id=I("id");
        $Model_CUSTOMER_C=M("customer_c");
        $where['userid']=$this->get_user_id();
        $where['id']=$id;
        $result=$Model_CUSTOMER_C->where($where)->find();
        $result['addtime']=date('Y-m-d H:i',$result['addtime']);
        if(!empty($result)){
            $this->ajaxReturn($result);
        }else{
            echo 0;
        }

    }
    /*
    *企业客户详细ajax
    */
    public function customer_detail_ajax_org(){
        $id=I("id");
        $Model_CUSTOMER_O=M("customer_o");
        $where['userid']=$this->get_user_id();
        $where['id']=$id;
        $result=$Model_CUSTOMER_O->where($where)->find();
        $result['addtime']=date('Y-m-d H:i',$result['addtime']);
        if(!empty($result)){
            $this->ajaxReturn($result);
        }else{
            echo 0;
        }

    }
    /*
        *描述：客户编辑
        *
        *
    */
    public function save_detail(){
        $id=I("id");

        $customer_model=M("customer_c");

        //$data['realname']=I("name");
        $data['tel']=I("tel");
        $data['email']=I('email');
        $data['now_address']=I("nowaddress");
        $data['beizhu']=I("beizhu");

        $res=$customer_model->where("id='$id'")->save($data);
        //$t=$customer_model->getLastSql();

       // print_r($t);

    }
    /*
        *描述：客户删除
        *
        *
    */
    public function del_customer_c(){
        $id=I("id");
        $Model_CUSTOMER_C=M("customer_c");
        $where=array();
        $data['is_delete']=1;
        $result=$Model_CUSTOMER_C->where("id='$id'")->save($data);

        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*
        *描述：客户列表
        *
    */
    public function list_customer(){

    }
    /*
        *描述：客户拉黑名单
        *
    */
    public function lock_customer(){

    }

    /*
        *描述：企业客户新增
        *
        *
    */
    public function add_customer_o(){
        if(IS_POST){
        if($this->get_customers_num()>=$this->get_customer_level()){
            $res_arr=array("","res_tip"=>"已达上限不能新增,请升级会员级别后再尝试","status"=>0);
        }else{
            $Model_CUSTOMER_O=M("customer_o");
            $data = $Model_CUSTOMER_O->create($_POST);
            $uid=$this->get_user_id();
            $data['userid']=$this->get_user_id();
            $data['addtime']=time();
            $Model_CUSTOMER_O->add($data);
            $res_arr=array("","res_tip"=>"新增完成","status"=>1);
        }
        $this->ajaxReturn($res_arr);
        }else{
            $this->assignMod();
            $this->display("/add_customer_org");
        }
    }

}