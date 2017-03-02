<?php
namespace Home\Controller;
use Think\Controller;
use Common\Controller\CommonController;
class StoreController extends CommonController {
	//分店列表数据返回
    public function fresh_store_company(){
         $Model_STORE_C=M("store_c");
         $uid=$this->get_user_id();
         $result_store_c=$Model_STORE_C->where("userid=$uid")->select();

         $this->ajaxReturn($result_store_c);
    }
    //
    public function fresh_store_company_si(){
         $Model_STORE_C=M("store_c");
         $uid=$this->get_user_id();
         $pid=I("id");
         $result_store_c=$Model_STORE_C->where("userid=$uid and parent_id=$pid")->select();

         $this->ajaxReturn($result_store_c);
    }
    //分公司列表数据返回
    public function fresh_store(){
         $Model_CHILD_COMPANY=M("child_company");
         $Model_STORE_C=M("store_c");
         $uid=$this->get_user_id();
         $result_child_company=$Model_CHILD_COMPANY->where("userid=$uid")->select();

         $this->ajaxReturn($result_child_company);

    }

    /*
        *描述：分公司新增
        *
    */
    public function add_child_company(){
         if(IS_POST){
            $uid=$this->get_user_id();
            $Model_CHILD_COMPANY=M("child_company");
            $data = $Model_CHILD_COMPANY->create($_POST);
            $this->repet_colums($Model_CHILD_COMPANY,'company_name',$data['company_name'],"分公司名",$uid);
                $data['userid']=$this->get_user_id();
                $data['id']=md5(time()+$uid);
                $Model_CHILD_COMPANY->add($data);
                $res_arr=array("","res_tip"=>"添加完成","status"=>1);
            $this->ajaxReturn($res_arr);
        }
    }

    /*
        *描述：门店新增
        *
    */
    public function add_store(){
        if(IS_POST){
            $uid=$this->get_user_id();
            $Model_STORE_C=M("store_c");
            $data = $Model_STORE_C->create($_POST);
            $this->repet_colums($Model_STORE_C,'store_name',$data['store_name'],"门店名重复",$uid);
                $data['userid']=$this->get_user_id();
                $data['id']=md5(time()+$uid);
                $Model_STORE_C->add($data);
                $res_arr=array("","res_tip"=>"添加完成","status"=>1);
            $this->ajaxReturn($res_arr);
        }
    }
    /*
        *描述：门店列表
        *
    */
    public function list_store(){
        $this->assignMod();
        $this->display("/store");
    }
    
    /*
        *描述：分公司删除
        *
    */
    public function del_child_company(){
        $id=I("id");
        $Model_CHILD_COMPANY=M("child_company");
        $where=array();
        $result=$Model_CHILD_COMPANY->where("id='$id' and company_type!=1")->delete();
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
    /*
        *描述：门店删除
        *
    */
    public function del_store(){
        $id=I("id");
        $Model_STORE_C=M("store_c");
        $where=array();
        $result=$Model_STORE_C->where("id='$id' and store_type!=1")->delete();
        if(!empty($result)){
            echo 1;
        }else{
            echo 0;
        }
    }
}
?>